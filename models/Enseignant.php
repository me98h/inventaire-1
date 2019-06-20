<?php
class Enseignant extends Type{
	private $prenom;
	private $mail;
	private $_function;
	private $nom;

	public function __construct($nom, $prenom, $mail, $_function){
		$this->prenom = $prenom;
		$this->mail = $mail;
		$this->_function = $_function;
		$this->nom=$nom;
	}

	public function is_etu(){
		return false;
	}
	public function is_ens(){
		return true;
	}
	public function is_grou(){
		return false;
	}

	public function nom(){
		return $this->nom;
	}

	public function prenom(){
		return $this->prenom;
	}
	public function mail(){
		return $this->mail;
	}
	public function no_emp(){}
	
	public function num_etu(){}
	public function niveau(){}
	public function is_chef(){}

	public function _function(){
		return $this->_function;
	}

	public function nb_max_etu(){}
	public function SetEncadrant($encadrant){}
	public function SetGroup_etu($etu){}
	public function goupe_etu(){}
	public function encadrant(){}
	public function groupes(){}
	public function SetGroupes($g){}
}
?>