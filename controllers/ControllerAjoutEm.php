<?php
class ControllerAjoutEm
{
    private $_ajoutEmManager;

    public function __construct($url, $arr_arg = null){
        if(isset($url) && count($url) > 1)
            throw new Exception("Page introuvable");
        else
            $this->ajoutemprunteurs();	

    }

    public function ajoutemprunteurs(){
        $ajout = false;
        $done = false;
        require_once('views/viewAjoutEm.php');

        if (isset($_POST['submit'])){
            $nom_personne = $_POST['nom_personne'];
            $prenom_personne = $_POST['prenom_personne'];
            $email_personne = $_POST['email_personne'];
            $nom_groupe=$_POST['nom_groupe'];
            $nbr_membre=$_POST['nbr_membre'];
            $nom_emprunteur=$_POST['nom_emprunteur1'];
            $prenom_emprunteur = $_POST['prenom_emprunteur1'];
            $nom_emprunteur2=$_POST['nom_emprunteur2'];
            $prenom_emprunteur2 = $_POST['prenom_emprunteur2'];
            $nom_emprunteur3=$_POST['nom_emprunteur3'];
            $prenom_emprunteur3 = $_POST['prenom_emprunteur3'];
            $type=$_POST['tfrom'];
            $nom_encadrant = $_POST['nom_encadrant'];
            $prenom_encadrant = $_POST['prenom_encadrant'];
            $code_barre = $_POST['code_barre'];
            if(isset($_POST['est_chef1'])){
                    $chef= 1;
            }else if(isset($_POST['est_chef2'])){
                $chef= 2;
            }else if(isset($_POST['est_chef3'])){
                $chef= 3;
            }
           
            $est = $_POST['est'];
            if($est =='etudiant'){
                $etudiant = 1;
            }else{
                $etudiant = 0;
            }

            $this->_ajoutEmManager = new AjoutEmManager();
            $ajout = $this->_ajoutEmManager->ajoutEmprunteur($etudiant,$type,$nom_personne,$prenom_personne,$nom_encadrant,$prenom_encadrant, $email_personne, $code_barre,$nom_groupe,$nbr_membre,$nom_emprunteur,$prenom_emprunteur,$nom_emprunteur2,$prenom_emprunteur2,$nom_emprunteur3,$prenom_emprunteur3,$chef);
            $done = true;
        }
    }

}
?>
