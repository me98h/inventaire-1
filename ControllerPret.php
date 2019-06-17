<?php
	class ControllerPret
	{
		private $_pretManager;
		private $_view;

		public function __construct($url){
			if(isset($url) && count($url) > 1)
				throw new Exception("Page introuvable");
			else
				$this->prets();	
		}

		public function prets(){
			$this->_pretManager = new PretManager();
			$prets = $this->_pretManager->getPret();

			require_once('views/viewPret.php');
		}
	}
?>