<?php
	class ControllerInfo_pret
	{
		private $_info_pretManager;
		private $_pret;
		private $_no_emp_pr;
		private $_nom;

		public function __construct($url, $arr_arg = null){
			if(isset($url) && count($url) > 1)
				throw new Exception("Page introuvable");
			else{
				$this->_pret = $arr_arg[0];
				$this->_no_emp_pr = $arr_arg[1];
				$this->_nom = $arr_arg[2];
				$this->information_pret();	
			}
		}

		public function information_pret(){
			$this->_info_pretManager = new Info_pretManager();
			$information_pret = $this->_info_pretManager->getInformation($this->_pret);
			$nom = $this->_nom;
			$link = "'./index.php?url=emprunteur&no_emp=".$this->_no_emp_pr."&nom=".$this->_nom."'";
			$pret = $this->_pret;
			require_once('views/viewInfo_pret.php');
		}
	}
?>