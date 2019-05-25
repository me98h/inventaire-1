<?php
	class Router
	{
		private $_ctrl;
		private $_view;

		public function routeReq()
		{
			try
			{
				spl_autoload_register(function($class){
					require_once('models/'.$class.'.php');
				});

				$url = array();

				if(isset($_GET['url']))
				{
					$url = explode('/', filter_var($_GET['url'], FILTER_SANITIZE_URL));

					$controller = ucfirst(strtolower($url[0]));
					$controllerClass = "Controller".$controller;
					$controllerFile = "controllers/".$controllerClass.".php";

					$arr_arg = [];

					if($url[0] == "info_pret"){
						$arr_arg [] = $_GET['pret'];
						$arr_arg [] = $_GET['no_emp_pr'];
						$arr_arg [] = $_GET['nom_emp'];	
					}
					elseif ($url[0] == "emprunteur") {
						$arr_arg [] = $_GET['no_emp'];
						$arr_arg [] = $_GET['nom'];		
					}

					if(file_exists($controllerFile)){
						require_once($controllerFile);
						$this->_ctrl = new $controllerClass($url, $arr_arg);
					}
					else
					{
						throw new Exception('Page introuvable');
					}
				}
				else
				{
					require_once('controllers/ControllerPret.php');
					$this->_ctrl = new ControllerPret($url);
				}
			}
			catch(Exception $e)
			{
				$errorMsg = $e->getMessage();
				require_once('views/viewError.php');
			}
		}
	}
?>