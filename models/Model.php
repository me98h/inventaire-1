<?php
abstract class Model
{	
	private static $_bdd;

	private static function setBdd(){
		self::$_bdd = new PDO('mysql:host=localhost;dbname=inventaireucp;charset=utf8', 'root', '123456789');
		self::$_bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
	}

	protected function getBdd(){
		if(self::$_bdd == null)
			$this->setBdd();
		return self::$_bdd;
	}

	public function getAll($table, $obj){	
		$var = [];
		$result = self::$_bdd->prepare('SELECT * FROM '. $table);
		$result->execute();

		while ($data = $result->fetch(PDO::FETCH_ASSOC)) {
			$var[] = new $obj($data);
		}
		return $var;
	}

	public function statut_date($date_debut, $date_prevu, $date_fin){
		$result="";
		if ($date_fin == null) {
			$result="en cours";
		}
		else{
			if ($date_fin <= $date_prevu) {
				$result="terminé";
			}
			else{
				$result="non rendu";
			}
		}
		return $result;
	}

	public function is_object($no_mat){
    	
    	$result = self::$_bdd->query("SELECT EXISTS (SELECT * FROM objet WHERE no_mat_obj='" . $no_mat . "' ) AS is_object_tab;");
    	$row = $result->fetch();

    	return $row['is_object_tab'];
	}

	public function getAllPret(){
		$var = [];
		
		self::$_bdd->query("DROP VIEW IF EXISTS pret_union_name;");
		self::$_bdd->query("CREATE VIEW pret_union_name AS SELECT no_pret, no_emp_pr, nom, date_debut, date_prevu, date_fin FROM pret INNER JOIN utilisateurs ON pret.no_emp_pr=utilisateurs.no_emp_util UNION SELECT no_pret, no_emp_pr, nom_groupe, date_debut, date_prevu, date_fin FROM pret INNER JOIN groupe ON pret.no_emp_pr=groupe.no_emp_grou;");
		
		$result = self::$_bdd->prepare( "SELECT * FROM pret_union_name;");
		$result->execute();

		while ($row = $result->fetch(PDO::FETCH_OBJ)) {

			$statut = $this->statut_date($row->date_debut, $row->date_prevu, $row->date_fin);
			$couleur = "";
			if ($statut == "terminé") {
				$couleur = "'table-active'";
			}
			elseif ($statut == "en cours") {
				$couleur = "'table-primary'";
			}
			elseif ($statut == "non rendu") {
				$couleur = "'table-danger'";
			}
			$date_debut=date('d/m/Y', strtotime($row->date_debut));

			$var[] = new Pret($row->no_pret, $row->nom, $date_debut, $statut, $couleur, $row->no_emp_pr);
		}
		return $var;
	}

	public function getAllInformation($_pret){
		$var = [];

		self::$_bdd->query("DROP VIEW IF EXISTS info_mat_pret;");
		self::$_bdd->query("CREATE VIEW info_mat_pret AS SELECT materiel.no_mat, date_prevu, nom_materiel, categorie, code_barre_mat FROM pret INNER JOIN contenir ON pret.no_pret=contenir.no_pret INNER JOIN materiel ON contenir.no_mat=materiel.no_mat WHERE pret.no_pret=".$_pret.";");

		$result = self::$_bdd->prepare("SELECT * FROM info_mat_pret INNER JOIN ordinateur ON info_mat_pret.no_mat=ordinateur.no_mat_ord UNION SELECT * FROM info_mat_pret INNER JOIN objet ON info_mat_pret.no_mat=objet.no_mat_obj");
		$result->execute();

		while ($row = $result->fetch(PDO::FETCH_OBJ)) {
			$mat_type = $this->is_object($row->no_mat);
			
			$var[] = new Materiel($row->no_mat, $row->nom_materiel, $row->categorie, $row->code_barre_mat, $row->num_serie, $mat_type);
		}
		return $var;
	}
}
?>