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
            $db = mysqli_connect("localhost", "root", "", "inventaireucp");
            $image = $_FILES['image']['name'];
            // Get text
            // image file directory
            $target = "images/".basename($image);

  	$sql = "INSERT INTO materiel (image) VALUES ('$image')";
  	// execute query
  	mysqli_query($db, $sql);
            $nom_objet = $_POST['nom_objet'];
            $categorie = $_POST['categorie'];
            $num_serie = $_POST['num_serie'];
            $quantite = $_POST['quantite'];
            $code_barre = $_POST['code_barre'];

            $this->_ajoutManager = new AjoutManager();
            $ajout = $this->_ajoutManager->ajoutMateriel($nom_objet, $categorie, $num_serie, $quantite, $code_barre);
            $done = true;
        }
    }

}
?>
