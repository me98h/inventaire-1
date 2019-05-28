<?php
require_once('models/PretEmprunteur.php');

class Emprunteur
{
	private $no_emp;
	private $type_emp;
	private $prets = array();

	public function __construct($no_emp){
		$this->no_emp = $no_emp;
	}

	public function SetNo_emp($no_emp){
		$no_emp = (int) $no_emp;

		if($no_emp > 0)
			$this->no_emp = $no_emp;
	}

	public function SetType_emp($type_emp){
		$this->type_emp = $type_emp;
	}

	public function no_emp(){
		return $this->no_emp;
	}

	public function type_emp(){
		return $this->type_emp;
	}

	public function prets(){
		return $this->prets;
	}

	public function setPrets($prets){
		if(is_array($prets))
			$this->prets = $prets;
	}
}

?>