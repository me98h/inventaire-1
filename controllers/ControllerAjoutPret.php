<?php
class ControllerAjoutPret
{
    private $_ajoutPretManager;

    public function __construct($url, $arr_arg = null){
        if(isset($url) && count($url) > 1)
            throw new Exception("Page introuvable");
        else
            $this->ajoutprets();	

    }

    public function ajoutprets(){
        $ajout = false;
        $done = false;
        require_once('views/viewAjoutPret.php');

        

            $this->_ajoutPretManager = new AjoutPret();
            $ajout = $this->_ajoutPretManager->ajoutPret();
            $done = true;
        }
    }


?>
