<?php
class Pret
{
	private $no_pret;
	private $nom;
	private $date_debut;
	private $statut;
	private $couleur;
	private $no_emp_pr;

	public function __construct($no_pret, $nom, $date_debut, $statut, $couleur, $no_emp_pr){
		$this->no_pret = $no_pret;
		$this->nom = $nom;
		$this->date_debut = $date_debut;
		$this->statut = $statut;
		$this->couleur = $couleur;
		$this->no_emp_pr = $no_emp_pr;
	}

	public function setNo_pret($_no_pret){
		$_no_pret = (int) $_no_pret;

		if($_no_pret > 0)
			$this->no_pret = $_no_pret;
	}

	public function setNo_emp_pr($_no_emp_pr){
		$_no_emp_pr = (int) $_no_emp_pr;

		if($_no_emp_pr > 0)
			$this->no_emp_pr = $_no_emp_pr;
	}

	public function setNom($_nom){
		if(is_string($_nom))
			$this->nom = $_nom;
	}

	public function setDate_debut($_date_debut){
			$this->date_debut = $_date_debut;
	}

	public function setStatut($_statut){
		if(is_string($_statut))
			$this->statut = $_statut;
	}

	public function setCouleurt($_couleur){
		if(is_string($_couleur))
			$this->couleur = $_couleur;
	}	

	public function no_pret(){
		return $this->no_pret;
	}

	public function nom(){
		return $this->nom;
	}

	public function date_debut(){
		return $this->date_debut;
	}

	public function statut(){
		return $this->statut;
	}

	public function couleur(){
		return $this->couleur;
	}

	public function getURL(){
		$URL = "'./index.php?url=info_pret&pret=".$this->no_pret."&no_emp_pr=".$this->no_emp_pr."&nom_emp=".$this->nom."'";
		return $URL;
	}
}
?>