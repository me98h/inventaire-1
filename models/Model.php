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
			
			$var[] = new Materiel($row->no_mat, $row->nom_materiel, $row->categorie, $row->code_barre_mat, $row->num_serie, $mat_type,null);
		}
		return $var;
	}
	public function checkCredentials($num_objet, $nom_objet)
    {

        $result = self::$_bdd->prepare("SELECT * FROM materiel WHERE no_mat = ? AND nom_materiel = ?");
		self::$_bdd->bindValue(1, $num_objet);
        self::$_bdd->bindValue(2, $nom_objet);

		$result->execute();
		 if(count($result->fetchAll()>0)) 
			 return true;
        return false;
    }
    public function addCredentials($num_objet, $nom_objet,$categorie,$num_serie,$quantite)
    {
		self::$_bdd->beginTransaction();
		$result =self::$_bdd->prepare("insert into materiel(nom_materiel,image,categorie) values(?,null,informatique)");
		self::$_bdd->bindValue(1, $nom_objet);
         $result->execute();
         if($categorie == 'ordinateur')
        {
            $result2 =self::$_bdd->prepare("insert into ordinateur(LAST_INSERT_ID(),num_serie) values(?,?)");
			self::$_bdd->bindValue(1, $num_objet);
			self::$_bdd->bindValue(2, $num_serie);
        }
        elseif($categorie == 'autres')
        {
			$result2 =self::$_bdd->prepare("insert into objet(LAST_INSERT_ID(),quantite) values(?,?)");
            self::$_bdd->bindValue(1, $num_objet);
            self::$_bdd->bindValue(2, $quantite);
        }
         
         $result2->execute();
         self::$_bdd->commit();    
	}
	
	public function getAllMateriels(){
		$var = [];

		self::$_bdd->query("DROP VIEW IF EXISTS mat_emp;");
		self::$_bdd->query("CREATE VIEW mat_emp AS select date_debut, date_prevu, date_fin, materiel.no_mat from pret inner join contenir on pret.no_pret=contenir.no_pret inner join materiel on materiel.no_mat=contenir.no_mat;");

		$result = self::$_bdd->query("SELECT * FROM materiel INNER JOIN ordinateur ON materiel.no_mat=ordinateur.no_mat_ord UNION SELECT * FROM materiel INNER JOIN objet ON materiel.no_mat=objet.no_mat_obj");

		while ($row = $result->fetch(PDO::FETCH_OBJ)) {
			$mat_type = $this->is_object($row->no_mat);
			$dispo = "";

			$result1 = self::$_bdd->query("SELECT EXISTS (SELECT * FROM mat_emp WHERE no_mat='" . $row->no_mat . "' ) AS mat_exist;");
			$row2= $result1->fetch();
		
			if ($row2['mat_exist'] == true) {
				$result_tmp = self::$_bdd->query("SELECT * FROM mat_emp WHERE no_mat='" . $row->no_mat . "';");
				$row_tmp= $result_tmp->fetch(PDO::FETCH_OBJ);
					
				$statut = $this->statut_date($row_tmp->date_debut, $row_tmp->date_prevu, $row_tmp->date_fin);
				if ($statut == "en cours" || $statut == "non rendu") {
					$dispo ="non disponible";
				}else {
					$dispo = "disponible";
				}
			}
			else{
				$dispo ="disponible";
			}
			
			$var[] = new Materiel($row->no_mat, $row->nom_materiel, $row->categorie, $row->code_barre_mat, $row->num_serie, $mat_type,$dispo);
		}
		return $var;
	}
}
?>