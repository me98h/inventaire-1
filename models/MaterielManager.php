<?php
class MaterielManager extends Model
{
	public function getMateriel(){
		$this->getBdd();
		return $this->getAllMateriels();
	}
}
?>