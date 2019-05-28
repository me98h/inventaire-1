<?php
class Groupe extends Type{
	private $nb_max_etu;
	private $encadrant;
	private $goupe_etu = array();
	private $nom;

	public function __construct($nom, $nb_max_etu){
		$this->nb_max_etu = $nb_max_etu;
		$this->nom = $nom;
	}

	public function is_etu(){
		return false;
	}
	public function is_ens(){
		return false;
	}
	public function is_grou(){
		return true;
	}

	public function nom(){
		return $this->nom;
	}
	public function prenom(){}
	public function mail(){}
	
	public function num_etu(){}
	public function niveau(){}
	public function is_chef(){}

	public function _function(){}

	public function nb_max_etu(){
		return $this->nb_max_etu;
	}
	public function SetEncadrant($encadrant){
		$this->encadrant = $encadrant;
	}
	public function SetGroup_etu($etu){
		if (is_array($etu)) {
			$this->goupe_etu = $etu;
		}
	}
	public function goupe_etu(){
		return $this->goupe_etu;
	}
	public function encadrant(){
		return $this->encadrant;
	}
}
?>