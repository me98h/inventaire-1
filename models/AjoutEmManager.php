<?php
class AjoutEmManager extends Model
{
	public function ajoutEmprunteur($etudiant,$type,$nom_personne,$prenom_personne,$nom_encadrant,$prenom_encadrant, $email_personne, $code_barre,$nom_groupe,$nbr_membre,$nom_emprunteur,$prenom_emprunteur,$nom_emprunteur2,$prenom_emprunteur2,$nom_emprunteur3,$prenom_emprunteur3,$chef){
		$this->getBdd();
		return $this->ajoutEmprunteurs($etudiant,$type,$nom_personne,$prenom_personne,$nom_encadrant,$prenom_encadrant, $email_personne, $code_barre,$nom_groupe,$nbr_membre,$nom_emprunteur,$prenom_emprunteur,$nom_emprunteur2,$prenom_emprunteur2,$nom_emprunteur3,$prenom_emprunteur3,$chef);
	}
}
?>