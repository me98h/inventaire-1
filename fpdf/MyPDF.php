<?php
	require_once('fpdf.php');
	require_once('models/PretManager.php');

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

		function headerTable(){
			$this->Ln();
			$this->SetFont('Times', 'B', 12, true);
			$this -> Cell(50);
			$this->Cell(40, 10, utf8_decode('Numéro du prêt'), 1, 0, 'C');
			$this->Cell(50, 10, 'Nom emprunteur', 1, 0, 'C');
			$this->Cell(50, 10, utf8_decode('Date début'), 1, 0, 'C');
			$this->Cell(40, 10, 'Statut', 1, 0, 'C');
			$this->Ln();
		}

		function viewTable(){
			$db = new PretManager();
			$prets = $db->getPret();

			$this->SetFont('Times', 'B', 12, true);

			foreach ($prets as $pret):
				$this -> Cell(50);
				$this->Cell(40, 10, $pret->no_pret(), 1, 0, 'C');
				$this->Cell(50, 10, utf8_decode($pret->nom()), 1, 0, 'C');
				$this->Cell(50, 10, $pret->date_debut(), 1, 0, 'C');
				$this->Cell(40, 10, utf8_decode($pret->statut()), 1, 0, 'C');
				$this->Ln();
			endforeach;
		}
	}
?>