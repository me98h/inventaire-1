<?php
class AjoutPretManager extends Model
{
	public function AjoutPret($emp, $list, $email, $date_debut, $date_fin){
		$this->getBdd();
		return $this->ajoutPrets($emp, $list, $email, $date_debut, $date_fin);
	}
	
}
?>