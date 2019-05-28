<?php
class ControllerAjout
{
    private $_ajoutManager;

    public function __construct($url, $arr_arg = null){
        if(isset($url) && count($url) > 1)
            throw new Exception("Page introuvable");
        else
            $this->ajoutmateriels();	

    }

    public function ajoutmateriels(){
        $ajout = false;
        $done = false;
        require_once('views/viewAjout.php');

        if (isset($_POST['submit'])){
            $nom_objet = $_POST['nom_objet'];
            $categorie = $_POST['categorie'];
            $num_serie = $_POST['num_serie'];
            $quantite = $_POST['quantite'];

            $this->_ajoutManager = new AjoutManager();
            $ajout = $this->_ajoutManager->ajoutMateriel($nom_objet, $categorie, $num_serie, $quantite);
            $done = true;
        }
    }

}
?>
