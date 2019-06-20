<?php
	require_once('fpdf.php');
	require_once('models/PretManager.php');
	require_once('models/Info_pretManager.php');

	class MyPDF extends FPDF{

		function header(){
			$this->Image('fpdf/logo.png', 10, 6);
			$this->SetFont('Arial', 'B', 14, true);
			$this->Cell(276, 5, utf8_decode('Fiche de prêt'), 0, 0, 'C');
			$this->Ln();
			$this->SetFont('Times', '', 12, true);
			$this->Cell(276, 10, '2 Avenue Adolphe Chauvin, 95300 Pontoise', 0, 0, 'C');
			$this->Ln(20);
		}

		function footer(){
			$this->SetY(-15);
			$this->SetFont('Arial', '', 8, true);
			$this->Cell(0, 10, 'Page'.$this->PageNo().'/{nb}', 0, 0, 'C');
		}

		function headerTable1(){
			$this->Ln();
			$this->SetFont('Times', 'B', 12, true);
			$this->Cell(40, 10, utf8_decode('Numéro du prêt'), 1, 0, 'C');
			$this->Cell(50, 10, 'Nom emprunteur', 1, 0, 'C');
			$this->Cell(50, 10, utf8_decode('Date début'), 1, 0, 'C');
			$this->Cell(50, 10, utf8_decode('Date prevue'), 1, 0, 'C');
			$this->Cell(50, 10, utf8_decode('Date fin'), 1, 0, 'C');
			$this->Cell(40, 10, 'Statut', 1, 0, 'C');
			$this->Ln();
		}

		function headerTable2($nom){
			$this->SetFont('Arial', 'B', 14, true);
			$this->Cell(276, 5, utf8_decode('Prêt efféctué par :'.$nom), 0, 0, 'C');
			$this->Ln(10);
			$this->SetFont('Times', 'B', 12, true);
			$this->Cell(10, 10, utf8_decode('N°'), 1, 0, 'C');
			$this->Cell(30, 10, utf8_decode('Catégorie'), 1, 0, 'C');
			$this->Cell(25, 10, utf8_decode('Code barre'), 1, 0, 'C');
			$this->Cell(25, 10, utf8_decode('N° série'), 1, 0, 'C');
			$this->Cell(20, 10, utf8_decode('Quantité'), 1, 0, 'C');
			$this->Cell(165, 10, 'Nom', 1, 0, 'C');
			$this->Ln();
		}

		function viewTable1(){
			$db = new PretManager();
			$prets = $db->getPret();

			$this->SetFont('Times', 'B', 12, true);

			foreach ($prets as $pret):
				$this->Cell(40, 10, $pret->no_pret(), 1, 0, 'C');
				$this->Cell(50, 10, utf8_decode($pret->nom()), 1, 0, 'C');
				$this->Cell(50, 10, $pret->date_debut(), 1, 0, 'C');
				$this->Cell(50, 10, $pret->date_prevu(), 1, 0, 'C');
				$this->Cell(50, 10, $pret->date_fin(), 1, 0, 'C');
				$this->Cell(40, 10, utf8_decode($pret->statut()), 1, 0, 'C');
				$this->Ln();
			endforeach;
		}

		function viewTable2($_pret){
			$db = new Info_pretManager();
			$information_pret = $db->getInformation($_pret);

			$this->SetFont('Times', 'B', 12, true);

			foreach ($information_pret as $info):
				$this->Cell(10, 10, $info->no_mat(), 1, 0, 'C');
				$this->Cell(30, 10, utf8_decode($info->categorie()), 1, 0, 'C');
				$this->Cell(25, 10, $info->code_barre(), 1, 0, 'C');
				$this->Cell(25, 10, $info->num_serie(), 1, 0, 'C');
				$this->Cell(20, 10, $info->quantite(), 1, 0, 'C');
				$this->MultiCell(165, 10, utf8_decode($info->nom()), 1,'L');
			endforeach;
		}
	}
?>