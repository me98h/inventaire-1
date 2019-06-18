<?php
class AjoutPretManager extends Model
{
	public function AjoutPret(){
		$this->getBdd();
		return $this->ajoutPrets();
	}
}
?>