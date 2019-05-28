<?php
abstract class Type {

	abstract protected function is_etu();
	abstract protected function is_ens();
	abstract protected function is_grou();

	abstract protected function nom();
	abstract protected function prenom();
	abstract protected function mail();
	abstract protected function num_etu();
	abstract protected function niveau();
	abstract protected function is_chef();
	abstract protected function _function();
	abstract protected function nb_max_etu();
	abstract protected function SetEncadrant($encadrant);
	abstract protected function SetGroup_etu($etu);
	abstract protected function goupe_etu();
	abstract protected function encadrant();

}
?>