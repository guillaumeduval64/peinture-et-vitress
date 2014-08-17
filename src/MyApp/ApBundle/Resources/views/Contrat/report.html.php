<?php

require_once('fpdf/fpdf.php');

class PDF extends FPDF {

// Page footer
    function Footer() {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }

}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times', '', 10);
$pdf->Ln(5);
$pdf->Cell(40, 40, 'case1', 1, 0, 'C');
$pdf->Cell(80, 40);
$pdf->Cell(50, 8, "Contrat numéro: $message2", 1, 0, 'L');
$pdf->Cell(20, 20, 'case4', 1, 0, 'R');
$pdf->Ln(20);
$pdf->Cell(120, 20);
$pdf->SetFont('Times', '', 10);
$pdf->MultiCell(70, 5, "Nom: Duval\nPrenom: Guillaume\nAdresse: $rueGuillaume,\n Montréal, QC,H2X-1Y7\n---------------------------------------------------------\nTéléphone: 514-991-6552\nAutre tel: 514-991-5585 257\nCourriel: guillaumeduval64hec.ca", 1);
$pdf->Ln(-15);
$pdf->MultiCell(70, 5, "Travailleur autonome: Guillaume DUVAL\n$rueGuillaume, appartement: $appartementGuillaume\n$villeCpGuillaume", 1, "L", 0);
$pdf->Ln(5);
$pdf->Cell(190, 100, 'Services', 1, 0, 'C');
$pdf->Ln(105);
$pdf->Cell(190, 15, 'Date   Depot   Total   Balance', 1, 0, 'C');
$pdf->Ln(20);
$pdf->Cell(190, 15, 'Notes', 1, 0, 'C');
$pdf->Ln(20);
$pdf->Cell(190, 15, 'Signature', 1, 0, 'C');
$pdf->Ln(20);
$pdf->Cell(190, 20, 'Clauses', 1, 0, 'C');
$pdf->Ln(22);
$pdf->Cell(190, 5, 'Copyrights', 1, 0, 'C');
$pdf->Output("report-$message2.pdf", "D");
?>
