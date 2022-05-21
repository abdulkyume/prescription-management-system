<?php
ob_end_clean();
$title = 'Prescription';
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetTitle($title);
$pdf->SetFont('Arial', 'B', 15);
$w = $pdf->GetStringWidth($title) + 6;
$pdf->SetX((210 - $w) / 2);
$pdf->SetDrawColor(221, 221, 221, 1);
$pdf->SetFillColor(10, 158, 0, 1);
$pdf->SetTextColor(0, 0, 0, 1);
$pdf->SetLineWidth(1);
$pdf->Cell($w, 9, $title, 1, 1, 'C', true);

$date = date("Y-m-d");

$pdf->Cell(25, 5, 'Date', 0, 0);
$pdf->Cell(34, 5, $date, 0, 1);



$pdf->Cell(189, 10, '', 0, 1); //end of line

//billing address
$pdf->Cell(100, 5, 'Patient Info', 0, 1); //end of line
$pdf->Cell(100, 5, '', 0, 1); //end of line

//add dummy cell at beginning of each line for indentation
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(90, 5, 'Name      : '.$full_name, 0, 1);

$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(90, 5, 'Age         : ' . $age, 0, 1);

$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(90, 5, 'Gender   : ' . $gender, 0, 1);

$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(90, 5, 'Address : ' . $address, 0, 1);

$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(90, 5, 'Phone    : ' . $phone, 0, 1);

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189, 10, '', 0, 1); //end of line

//invoice contents
$pdf->SetFont('Arial', 'B', 12);

$pdf->Cell(80, 5, 'Prescribed Medicine', 0, 0);
$pdf->Cell(25, 5, 'Type', 0, 0);
$pdf->Cell(134, 5, 'Usage', 0, 1); //end of line

$pdf->SetFont('Arial', '', 12);

//Numbers are right-aligned so we give 'R' after new line parameter

$pdf->Cell(80, 5, $meds_1, 0, 0);
$pdf->Cell(25, 5, $type_1, 0, 0);
$pdf->MultiCell(100, 5, $usage_1, 0, 1); //end of line

if ($_POST['medicine_2'] == null || $_POST['medicine_3'] == null) {
    goto a;
} else {
    $pdf->Cell(80, 5, $meds_2, 0, 0);
    $pdf->Cell(25, 5, $type_2, 0, 0);
    $pdf->MultiCell(100, 5, $usage_2, 0, 1); //end of line


    $pdf->Cell(80, 5, $meds_3, 0, 0);
    $pdf->Cell(25, 5, $type_3, 0, 0);
    $pdf->MultiCell(100, 5, $usage_3, 0, 1); //end of line
}
a:
$pdf->Cell(189, 10, '', 0, 1); //end of line

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(130, 5, 'Prescribed By:', 0, 1);
$pdf->Cell(05, 5, $doctor_name, 0, 0);


$pdf->Output();

ob_end_flush();


?>