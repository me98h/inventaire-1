<?php
class AjoutManager extends Model
{
	public function AjoutMateriel($nom_objet, $categorie, $num_serie, $quantite){
		$this->getBdd();
		return $this->ajoutMateriels($nom_objet, $categorie, $num_serie, $quantite);
	}
}
?>