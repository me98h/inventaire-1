<?php
class Materiel
{
	private $no_mat;
	private $nom;
	private $categorie;
	private $code_barre;
	private $num_serie;
	private $quantite;
	private $is_obj;
	private $dispo;

	public function __construct($no_mat, $nom, $categorie, $code_barre, $num_serie, $is_obj, $dispo){
		$this->no_mat = $no_mat;
		$this->nom = $nom;
		$this->categorie = $categorie;
		$this->code_barre = $code_barre;
		$this->is_obj = $is_obj;
		$this->dispo = $dispo;
		if ($is_obj) {
			$this->quantite = $num_serie;
			$this->num_serie = "(null)";
		}
		else {
			$this->quantite = 1;
			$this->num_serie = $num_serie;
		}
		
	}

	public function setNo_mat($no_mat){
		$no_mat = (int) $no_mat;

		if($no_mat > 0)
			$this->no_mat = $no_mat;
	}

	public function setQuantite($quantite){
		$quantite = (int) $quantite;

		if($quantite > 0)
			$this->quantite = $quantite;
	}

	public function setNom($_nom){
		if(is_string($_nom))
			$this->nom = $_nom;
	}

	public function setCategorie($categorie){
			if(is_string($categorie))
				$this->categorie = $categorie;
	}

	public function setCode_barre($code_barre){
		if(is_string($code_barre))
			$this->code_barre = $code_barre;
	}

	public function setNum_serie($num_serie){
		if(is_string($num_serie))
			$this->num_serie = $num_serie;
	}	

	public function no_mat(){
		return $this->no_mat;
	}

	public function nom(){
		return $this->nom;
	}

	public function categorie(){
		return $this->categorie;
	}

	public function code_barre(){
		return $this->code_barre;
	}

	public function num_serie(){
		return $this->num_serie;
	}

	public function quantite(){
		return $this->quantite;
	}

	public function dispo(){
		return $this->dispo;
	}

	public function getCouleur(){
		$RGB = "";
		if($this->dispo == "disponible")
			$RGB = "'table-secondary'";
		else
			$RGB = "'table-danger'";
		return $RGB;
	}
	
}
?>