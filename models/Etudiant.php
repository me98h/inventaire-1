<?php
class Etudiant extends Type{
	private $prenom;
	private $mail;
	private $num_etu;
	private $niveau;
	private $is_chef;
	private $nom;
	private $no_emp;
	private $groupe = array();


	public function __construct($nom, $prenom,$mail, $num_etu, $niveau, $is_chef, $no_emp){
		$this->prenom = $prenom;
		$this->mail = $mail;
		$this->num_etu = $num_etu;
		$this->niveau = $niveau;
		$this->is_chef = $is_chef;
		$this->nom = $nom;
		$this->no_emp = $no_emp;
	}

	public function is_etu(){
		return true;
	}
	public function is_ens(){
		return false;
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
	public function num_etu(){
		return $this->num_etu;
	}
	public function niveau(){
		return $this->niveau;
	}
	public function is_chef(){
		return $this->is_chef;
	}
	public function no_emp(){
		return $this->no_emp;
	}
	
	public function _function(){}
	public function nb_max_etu(){}
	public function SetEncadrant($encadrant){}
	public function SetGroup_etu($etu){}
	public function goupe_etu(){}
	public function encadrant(){}
	public function SetGroupes($g){
		if (is_array($g)) {
			$this->groupe = $g;
		}
	}
	public function groupes(){
		return $this->groupe;
	}
}
?>