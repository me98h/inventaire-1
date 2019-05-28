<?php
	class EmprunteurManager extends Model
	{
		public function getEmprunteur($no_emp){
			$this->getBdd();
			return $this->getEmp($no_emp);
		}
	}
?>