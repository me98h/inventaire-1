<?php
class ControllerMateriel
{
    private $_materielManager;

    public function __construct($url, $arr_arg = null){
        if(isset($url) && count($url) > 1)
            throw new Exception("Page introuvable");
        else
            $this->materiels();	

    }

    public function materiels(){
        $this->_materielManager = new MaterielManager();
        $materiels = $this->_materielManager->getMateriel();

        require_once('views/viewMateriel.php');
    }

}
?>