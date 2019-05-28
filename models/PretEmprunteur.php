<?php
class PretEmprunteur{
	private $no_pr;
	private $date_debut;
	private $date_prevue;
	private $date_fin;

	public function __construct($no_pr,$date_debut,$date_prevue,$date_fin){
		$this->no_pr = $no_pr;
		$this->date_debut = $date_debut;
		$this->date_prevue = $date_prevue;
		$this->date_fin = $date_fin;
	}

	public function no_pr(){
		return $this->no_pr;
	}

	public function date_debut(){
		return $this->date_debut;
	}

	public function date_prevue(){
		return $this->date_prevue;
	}

	public function date_fin(){
		if($this->date_fin == null)
			return "Indefinie";
		else
			return $this->date_fin;
	}
}
?>