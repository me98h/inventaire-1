<?php
class Info_pretManager extends Model
{
	public function getInformation($_pret){
		$this->getBdd();
		return $this->getAllInformation($_pret);
	}

	public function getPrenom($no_emp_pr){
		$this->getBdd();
		return $this->getPrenom_emp($no_emp_pr);
	}
}
?>