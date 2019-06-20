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
                    $type=$_POST['tfrom'];
                    $nom_personne = $_POST['nom_personne'];
                    $prenom_personne = $_POST['prenom_personne'];
                    $email_personne = $_POST['email_personne'];
                    $code_barre = $_POST['code_barre'];
                    $nbr_membre = $_POST['nbr_membre'];
                    $nom_groupe=$_POST['nom_groupe'];
                    $est =$_POST['est'];
                    $nom_encadrant = $_POST['nom_encadrant'];
                    $prenom_encadrant = $_POST['prenom_encadrant'];
                    
            for($i=1;$i<=10;$i++){
                    $nom = $_POST['nom_emprunteur'.$i];
                    $prenom = $_POST['prenom_emprunteur'.$i];
                    $mail = $_POST['email_emprunteur'.$i];
                    if(isset( $_POST['est_chef'.$i]))
                    $chef =$_POST['est_chef'.$i];
                    
                $this->_ajoutEmManager = new AjoutEmManager();
                $ajout = $this->_ajoutEmManager->ajoutUtilisateur($nom,$prenom,$mail,$chef,$type,$nom_personne,$prenom_personne,$email_personne,$code_barre,$nom_groupe,$len,$nom_encadrant,$prenom_encadrant);
            $done = true;       }

           
           /* 
          
            
            
           
        

            /* $this->_ajoutEmManager = new AjoutEmManager();
            $ajout = $this->_ajoutEmManager->ajoutEmprunteur($etudiant,$type,$nom_personne,$prenom_personne,$nom_encadrant,$prenom_encadrant, $email_personne, $code_barre,$nom_groupe,$nbr_membre,$nom_emprunteur,$prenom_emprunteur,$nom_emprunteur2,$prenom_emprunteur2,$nom_emprunteur3,$prenom_emprunteur3,$chef);
            $done = true; */
        }
    }

}
?>
