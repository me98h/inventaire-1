<?php
class Info_pretManager extends Model
{
	public function getInformation($_pret){
		$this->getBdd();
		return $this->getAllInformation($_pret);
	}
}
?>