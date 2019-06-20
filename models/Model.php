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
		
		$result = self::$_bdd->prepare( "SELECT * FROM pret_union_name ORDER BY date_debut DESC;");
		$result->execute();

		while ($row = $result->fetch(PDO::FETCH_OBJ)) {

		    $result_ = self::$_bdd->query("SELECT EXISTS (SELECT * FROM utilisateurs WHERE no_emp_util='" . $row->no_emp_pr . "' ) AS utilisateur_exist;");
		    $row_ = $result_->fetch();

		    $is_grou_etu = false;

		    if ($row_['utilisateur_exist'] == true) {
		    	$is_grou_etu = true;
		    }

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
			$date_prevu=date('d/m/Y', strtotime($row->date_prevu));
			if($row->date_fin != null)
				$date_fin=date('d/m/Y', strtotime($row->date_fin));
			else
				$date_fin = $row->date_fin;

			$var[] = new Pret($row->no_pret, $row->nom, $date_debut, $date_prevu, $date_fin, $statut, $couleur, $row->no_emp_pr, $is_grou_etu);
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
	public function checkCredentials($nom_objet)
    {

        $result1 = self::$_bdd->query("SELECT EXISTS (SELECT * FROM materiel WHERE nom_materiel='" . $nom_objet . "' ) AS mat_exist;");
        $row2= $result1->fetch();

        return $row2['mat_exist'] == true;
    }
    public function addCredentials($nom_objet,$categorie,$num_serie,$quantite, $code_barre)
    {
		self::$_bdd->beginTransaction();
		$result =self::$_bdd->prepare("insert into materiel(nom_materiel,image,categorie,code_barre_mat) values('".$nom_objet."',null,'informatique','".$code_barre."')");
		$result->execute();
         if($categorie == 'Ordi')
        {
            $result2 =self::$_bdd->prepare("insert into ordinateur(no_mat_ord,num_serie) values(LAST_INSERT_ID(),'".$num_serie."')");
        }
        else
        {
			$result2 =self::$_bdd->prepare("insert into objet(no_mat_obj,quantite) values(LAST_INSERT_ID(),'".$quantite."')");
        }
         
         $result2->execute();
         self::$_bdd->commit();    
	}
	
    public function ajoutEmprunteurs($etudiant,$type,$nom_personne,$prenom_personne,$nom_encadrant,$prenom_encadrant, $email_personne, $code_barre,$nom_groupe,$nbr_membre,$nom_emprunteur,$prenom_emprunteur,$nom_emprunteur2,$prenom_emprunteur2,$nom_emprunteur3,$prenom_emprunteur3,$chef)
    {
		if($type=='personne') {
		self::$_bdd->beginTransaction();
		$result =self::$_bdd->prepare("insert into emprunteur(num_code_barre) values('".$code_barre."')");
		$result->execute();
        $result2 =self::$_bdd->prepare("insert into utilisateurs(no_emp_util,nom,prenom,mail) values(LAST_INSERT_ID(),'".$nom_personne."','".$prenom_personne."','".$email_personne."')");
         $result2->execute();
         self::$_bdd->commit();  
		}
		else {

			self::$_bdd->beginTransaction();
			$result2 =self::$_bdd->prepare("insert into emprunteur(num_code_barre) values('".$code_barre."')");
		$result2->execute();
		$result3 =self::$_bdd->prepare("insert into utilisateurs(no_emp_util,nom,prenom) values(LAST_INSERT_ID(),'".$nom_emprunteur."','".$prenom_emprunteur."')");
		$result3->execute();
		$no_util = self::$_bdd->lastInsertId();
		$result =self::$_bdd->prepare("insert into groupe(nom_groupe,nb_max_etu) values('".$nom_groupe."','".$nbr_membre."')");
		$result->execute();
		$no_groupe =self::$_bdd->lastInsertId();
		if($chef == 1){
			$result4 =self::$_bdd->prepare("insert into appartenir(no_emp_grou_app,no_util_etu_app,est_chef) values('.$no_groupe.','.$no_util.',1)");
		$result4->execute();
		}else {
			$result4 =self::$_bdd->prepare("insert into appartenir(no_emp_grou_app,no_util_etu_app,est_chef) values('".$no_groupe."','.$no_util.',0)");
		$result4->execute();
		$result5 =self::$_bdd->prepare("select no_emp_util from utilisateurs where nom ='".$nom_encadrant."' and prenom = '".$prenom_encadrant."'");
		$result5->execute();
		$row= $result5->fetch();
		if($row){
			$result5 =self::$_bdd->prepare("insert into encadrer(no_emp_grou,no_util_ens) values (no_groupe,$row->no_emp_util)");
		    $result5->execute();
		}
		}
		
		
		if($nom_emprunteur2 && $prenom_emprunteur2){
			$result3 =self::$_bdd->prepare("insert into utilisateurs(no_emp_util,nom,prenom) values(LAST_INSERT_ID(),'".$nom_emprunteur2."','".$prenom_emprunteur2."')");
		$result3->execute();
		if($chef == 2){
			$result4 =self::$_bdd->prepare("insert into appartenir(no_emp_grou_app,no_util_etu_app,est_chef) values('".$no_groupe."',LAST_INSERT_ID(),1)");
		$result4->execute();
		}else {
			$result4 =self::$_bdd->prepare("insert into appartenir(no_emp_grou_app,no_util_etu_app,est_chef) values('".$no_groupe."',LAST_INSERT_ID(),0)");
		$result4->execute();
		}
		}if($nom_emprunteur3 && $prenom_emprunteur3){
			$result3 =self::$_bdd->prepare("insert into utilisateurs(no_emp_util,nom,prenom) values(LAST_INSERT_ID(),'".$nom_emprunteur3."','".$prenom_emprunteur3."')");
		$result3->execute();
		if($chef == 1){
			$result4 =self::$_bdd->prepare("insert into appartenir(no_emp_grou_app,no_util_etu_app,est_chef) values('".$no_groupe."',LAST_INSERT_ID(),1)");
		$result4->execute();
		}else {
			$result4 =self::$_bdd->prepare("insert into appartenir(no_emp_grou_app,no_util_etu_app,est_chef) values('".$no_groupe."',LAST_INSERT_ID(),0)");
		$result4->execute();
		}
		}
	}
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

	public function ajoutMateriels($nom_objet, $categorie, $num_serie, $quantite,$code_barre){
        if ($this->checkCredentials($nom_objet)){
            return false;
        }else{
            $this->addCredentials($nom_objet, $categorie, $num_serie, $quantite, $code_barre);
            return true;
        }
	}

    public function getEmp($no_emp){

	    $result = self::$_bdd->query("SELECT EXISTS (SELECT * FROM utilisateurs WHERE no_emp_util='" . $no_emp . "' ) AS utilisateur_exist;");
	    $row = $result->fetch();

	    $result_pret = self::$_bdd->query("SELECT * FROM pret WHERE pret.no_emp_pr='" . $no_emp . "';");
	    $arr_prets = array();

	    while ($row_pret = $result_pret->fetch(PDO::FETCH_OBJ)) {
	    	$date_debut=date('d/m/Y', strtotime($row_pret->date_debut));
			$date_prevu=date('d/m/Y', strtotime($row_pret->date_prevu));
			if($row_pret->date_fin != null)
				$date_fin=date('d/m/Y', strtotime($row_pret->date_fin));
			else
				$date_fin = $row_pret->date_fin;

	    	$arr_prets[] = new PretEmprunteur($row_pret->no_pret, $date_debut, $date_prevu, $date_fin);
	    }

	    if ($row['utilisateur_exist'] == true) {
	    	$result = self::$_bdd->query("SELECT EXISTS (SELECT * FROM etudiant WHERE no_util_etu='" . $no_emp . "' ) AS etudiant_exist;");
	    	$row = $result->fetch();
	    	if ($row['etudiant_exist'] == true) {

	    		$result_type = self::$_bdd->query("SELECT no_emp_util, nom, prenom, mail, etudiant.niveau, etudiant.num_etu FROM utilisateurs INNER JOIN etudiant ON utilisateurs.no_emp_util=etudiant.no_util_etu WHERE etudiant.no_util_etu='" . $no_emp . "';");
	    		$row_type = $result_type->fetch(PDO::FETCH_OBJ);

	    		$result_grou = self::$_bdd->query("SELECT * FROM groupe INNER JOIN appartenir ON groupe.no_emp_grou=appartenir.no_emp_grou_app WHERE appartenir.no_util_etu_app =". $no_emp .";");

	    		$arr_grou = array();
			    while ($row_grou = $result_grou->fetch(PDO::FETCH_OBJ)) {
			    	$arr_grou[] = $row_grou->nom_groupe;
			    }

	    		$type = new Etudiant($row_type->nom, $row_type->prenom, $row_type->mail, $row_type->num_etu, $row_type->niveau, 0, $row_type->no_emp_util);
	    		$type->SetGroupes($arr_grou);
	    	}
	    	else{
	    		$result_type = self::$_bdd->query("SELECT nom, prenom, mail, enseignant.fonction FROM utilisateurs INNER JOIN enseignant ON utilisateurs.no_emp_util=enseignant.no_util_ens WHERE enseignant.no_util_ens='" . $no_emp . "';");
	         	
	         	$row_type = $result_type->fetch(PDO::FETCH_OBJ);
	         	$type = new Enseignant($row_type->nom, $row_type->prenom, $row_type->mail, $row_type->fonction);  
	    	}
	    } 
	    else {
	    	$arr_etu = array();
	    	$result_etu = self::$_bdd->query("SELECT utilisateurs.no_emp_util, nom, prenom, mail, etudiant.niveau, etudiant.num_etu, appartenir.est_chef FROM appartenir INNER JOIN utilisateurs ON appartenir.no_util_etu_app=utilisateurs.no_emp_util INNER JOIN etudiant ON utilisateurs.no_emp_util=etudiant.no_util_etu  WHERE appartenir.no_emp_grou_app='" . $no_emp . "';");
	    	while ($row_etu = $result_etu->fetch(PDO::FETCH_OBJ)) {
	    		$arr_etu[] = new Etudiant($row_etu->nom, $row_etu->prenom, $row_etu->mail, $row_etu->num_etu, $row_etu->niveau, $row_etu->est_chef, $row_etu->no_emp_util);
	    	}
	    	
	    	$result_enc = self::$_bdd->query("SELECT nom, prenom, mail, enseignant.fonction FROM encadrer INNER JOIN utilisateurs ON encadrer.no_util_ens=utilisateurs.no_emp_util INNER JOIN enseignant ON utilisateurs.no_emp_util=enseignant.no_util_ens  WHERE encadrer.no_emp_grou='" . $no_emp . "';");
	    	$row_enc = $result_enc->fetch(PDO::FETCH_OBJ);
	    	
	    	$result_grou = self::$_bdd->query("SELECT * FROM groupe WHERE no_emp_grou='" . $no_emp . "';");
	    	$row_grou = $result_grou->fetch(PDO::FETCH_OBJ);

	    	$enc = new Enseignant($row_enc->nom, $row_enc->prenom, $row_enc->mail, $row_enc->fonction);

	    	$type = new Groupe($row_grou->nom_groupe ,$row_grou->nb_max_etu);
	    	$type->SetEncadrant($enc);
	    	$type->SetGroup_etu($arr_etu);
	    }

	    $emprunteur = new Emprunteur($no_emp);
	    $emprunteur->SetType_emp($type);
	    $emprunteur->setPrets($arr_prets);

	    return $emprunteur;
    }
}
?>