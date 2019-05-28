<?php
	class ControllerEmprunteur
	{
		private $_emprunteurManager;
		private $_no_emp;

		public function __construct($url, $arr_arg = null){
			if(isset($url) && count($url) > 1)
				throw new Exception("Page introuvable");
			else{
				$this->_no_emp = $arr_arg[0];
				$this->_nom = $arr_arg[1];

				$this->emprunteur();	
			}
		}

		public function emprunteur(){
			$this->_emprunteurManager = new EmprunteurManager();
			$emprunteur = $this->_emprunteurManager->getEmprunteur($this->_no_emp);
			$nom = $this->_nom;

			require_once('views/viewEmprunteur.php');
		}
	}
?>