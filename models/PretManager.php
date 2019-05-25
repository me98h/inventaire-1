<?php
class PretManager extends Model
{
	public function getPret(){
		$this->getBdd();
		return $this->getAllPret();
	}
}
?>