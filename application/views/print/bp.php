<?php

//Cell(float w [, float h [, string txt [, mixed border [, int ln [, string align [, boolean fill [, mixed link]]]]]]])
class PDF extends FPDF {

  
  // Page header
  function Header() {
    //Custom Fonts
    $this->AddFont('century', '', 'Century Gothic.php');
    // Logo
    // Arial bold 15
    $this->SetFont('Arial', '', 11);
    //SBU Image
    $this->Image(base_url() . 'assets/img/print/sbu.png', 20, 15);
    //OPSA Image
    $this->Image(base_url() . 'assets/img/print/opsa.png', 45, 15);
    //ORG Image
    $this->Image(base_url() . 'assets/img/print/bits.png', 70, 15);

    // Line break
    $this->Ln(0);

    //San Beda University - Header - SetFont
    $this->SetFont('Times', '', 10);
    $this->SetTextColor('255', '63', '63');
    // San Beda University - Cell Text
    $this->Cell(23, 0, ''); //Positioning Cell
    $this->Cell(0, 65, 'SAN BEDA UNIVERSITY');

    // Line break
    $this->Ln(0);

    // College Of Arts and Sciences - Header - SetFont
    $this->SetFont('Arial', '', 8);
    $this->SetTextColor('0', '0', '0');
    // College Of Arts and Sciences - Cell Text
    $this->Cell(19, 0, ''); //Positioning Cell
    $this->Cell(0, 73, 'COLLEGE OF ARTS AND SCIENCES');

    // Line break
    $this->Ln(0);

    // Office Of The Prefect Of Student Activities - Header - SetFont
    $this->SetFont('Arial', 'B', 8);
    $this->SetTextColor('0', '0', '0');
    // Office Of The Prefect Of Student Activities - Cell Text
    $this->Cell(8, 0, ''); //Positioning Cell
    $this->Cell(0, 80, 'OFFICE OF THE PREFECT OF STUDENT ACTIVITIES');

    // Line break
    $this->Ln(0);

    // OPSA Email - Header - SetFont
    $this->SetFont('Times', 'U', 9);
    $this->SetTextColor('48', '93', '255');
    // OPSA Email - Cell Text
    $this->Cell(30, 0, ''); //Positioning Cell
    $this->Cell(0, 87, 'opsa@sanbeda.edu.ph');

    // Line break
    $this->Ln(0);

    // Divider Line
    $this->Cell(90, 0, '', 0); //Positioning Cell
    $this->Cell(.0001, 50, '', 1); //Divider Line

    // Line break
    $this->Ln(4);

    // Activity Number - Header - SetFont
    $this->SetFont('century', '', 12);
    $this->SetTextColor('0', '0', '0');
    // Activity Number - Cell Text
    $this->Cell(95, 0, ''); //Positioning Cell
    $this->Cell(0, 10, 'CAS-BP-1819-(INSERT VALUES)', 1);

    // Line break
    $this->Ln(13);

    // Org Name - Header - SetFont
    $this->SetFont('times', '', 15);
    $this->SetTextColor('0', '0', '0');
    // Org Name - Cell Text
    $this->Cell(95, 0, ''); //Positioning Cell
    $this->MultiCell(0, 9, $this->session->userdata('organization'), 1, 'C');

    // Line break
    $this->Ln(0);

    // Activity Title - Header - SetFont
    $this->SetFont('Arial', 'B', 8);
    $this->SetTextColor('0', '0', '0');
    // Activity Title - Cell Text
    $this->Cell(100, 0, ''); //Positioning Cell
    $this->Cell(0, 10, 'oof', 0, 0, 'C');

    // Line break
    $this->Ln(0);

    // Date and Venue - Header - SetFont
    $this->SetFont('Arial', 'B', 8);
    $this->SetTextColor('0', '0', '0');
    // Date and Venue - Cell Text
    $this->Cell(100, 0, ''); //Positioning Cell
    $this->Cell(0, 17, 'Date and Venue: October 5, 2018', 0, 0, 'C'); //Insert Date Here
    $this->Ln(0);
    $this->Cell(100, 0, ''); //Positioning Cell
    $this->Cell(0, 24, 'V. Mapa', 0, 0, 'C'); //Insert Venue Here

    // Line break
    $this->Ln(0);

    // Contact Person and Number - Header - SetFont
    $this->SetFont('Arial', 'B', 8);
    $this->SetTextColor('0', '0', '0');
    // Contact Person and Number - Cell Text
    $this->Cell(100, 0, ''); //Positioning Cell
    $this->Cell(0, 32, 'Contact Person and Number: Timothy James Buan - 09273406587', 0, 0, 'C'); //Insert Contact Person and Number Here

  }
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

//FAR TABLE START

// Line break
$pdf->Ln(0);

// FIXED ASSET REQUIREMENTS - Header - SetFont
$pdf->SetFont('arial', 'B', 12);
$pdf->SetTextColor('0', '0', '0');
// FIXED ASSET REQUIREMENTS - Header - Cell Text
$pdf->Cell(80, 0, ''); //Positioning Cell
$pdf->SetY('73');
$pdf->Cell(0, 0, 'FIXED ASSET REQUIREMENTS', 0, 0, 'C');

// FIXED ASSET REQUIREMENTS - Header - SetFont
$pdf->SetFont('century', '', 8);
$pdf->SetTextColor('0', '0', '0');

//FAR TABLE HEADERS

// Item - Table Header - Cell Text
$pdf->Cell(80, 0, ''); //Positioning Cell
$pdf->SetY('76');
$pdf->SetX('22');
$pdf->Cell(55, 5, 'ITEM', 1, 0, 'C');

// Quantity & Unit - Table Header - Cell Text
$pdf->Cell(80, 0, ''); //Positioning Cell
$pdf->SetY('76');
$pdf->SetX('77');
$pdf->Cell(27, 5, 'QUANTITY & UNIT', 1, 0, 'C');

// Unit Price - Table Header - Cell Text
$pdf->Cell(80, 0, ''); //Positioning Cell
$pdf->SetY('76');
$pdf->SetX('104');
$pdf->Cell(27, 5, 'UNIT PRICE', 1, 0, 'C');

// Total Amount - Table Header - Cell Text
$pdf->Cell(80, 0, ''); //Positioning Cell
$pdf->SetY('76');
$pdf->SetX('131');
$pdf->Cell(27, 5, 'TOTAL AMOUNT', 1, 0, 'C');

// Source of Fund - Table Header - Cell Text
$pdf->Cell(80, 0, ''); //Positioning Cell
$pdf->SetY('76');
$pdf->SetX('158');
$pdf->Cell(40, 5, 'SOURCE OF FUND', 1, 0, 'C');

//FAR TABLE ITEMS (LOOP THE CODE BLOCK BELOW), ADJUST SetY TO INCREMENT BY 5 PER NEW ITEM

$setY = 81;
$counter = -1;
$sum_far = 0;
if (is_array($records_far) || is_object($records_far)) {
  foreach ($records_far as $record) {
    $pdf->Cell(80, 0, ''); //Positioning Cell
    $pdf->SetY($setY);
    $pdf->SetX('22');
    $pdf->Cell(55, 5, $record->Item, 1, 0, 'C');

    // Item - Table Header - Cell Text
    $pdf->Cell(80, 0, ''); //Positioning Cell
    $pdf->SetY($setY);
    $pdf->SetX('77');
    $pdf->Cell(27, 5, $record->Quantity, 1, 0, 'C');

    // Item - Table Header - Cell Text
    $pdf->Cell(80, 0, ''); //Positioning Cell
    $pdf->SetY($setY);
    $pdf->SetX('104');
    $pdf->Cell(27, 5, $record->Unit_Price, 1, 0, 'C');

    // Item - Table Header - Cell Text
    $pdf->Cell(80, 0, ''); //Positioning Cell
    $pdf->SetY($setY);
    $pdf->SetX('131');
    $pdf->Cell(27, 5, $record->Total_Amount, 1, 0, 'C');

    // Item - Table Header - Cell Text
    $pdf->Cell(80, 0, ''); //Positioning Cell
    $pdf->SetY($setY);
    $pdf->SetX('158');
    $pdf->Cell(40, 5, $record->Source, 1, 0, 'C');

    $setY += 5;
    $counter++;
    $sum_far += $record->Total_Amount;

  }
}

//END LOOP

//FAR Sub Total

$pdf->Cell(80, 0, ''); //Positioning Cell
$pdf->SetY('90');
$pdf->SetX('22');
$pdf->Cell(176, 5, 'FAR SUB TOTAL: PHP ' . $sum_far, 1, 0, 'C');

//FAR TABLE END

//OE TABLE START

// Line break
$pdf->Ln(0);

// OPERATING EXPENSES - Header - SetFont
$pdf->SetFont('arial', 'B', 12);
$pdf->SetTextColor('0', '0', '0');
// OPERATING EXPENSES - Header - Cell Text
$pdf->Cell(80, 0, ''); //Positioning Cell
$pdf->SetY('112');
$pdf->Cell(0, 0, 'OPERATING EXPENSES', 0, 0, 'C');

// OPERATING EXPENSES - Header - SetFont
$pdf->SetFont('century', '', 8);
$pdf->SetTextColor('0', '0', '0');

//OE TABLE HEADERS

//ALL SetY Values MUST CHANGE Depending on the size of the FAR Table above it. In retrospect I should have used variables for this hehehe

// Item - Table Header - Cell Text
$pdf->Cell(80, 0, ''); //Positioning Cell
$pdf->SetY('120');
$pdf->SetX('22');
$pdf->Cell(55, 5, 'ITEM', 1, 0, 'C');

// Item - Table Header - Cell Text
$pdf->Cell(80, 0, ''); //Positioning Cell
$pdf->SetY('120');
$pdf->SetX('77');
$pdf->Cell(27, 5, 'QUANTITY & UNIT', 1, 0, 'C');

// Item - Table Header - Cell Text
$pdf->Cell(80, 0, ''); //Positioning Cell
$pdf->SetY('120');
$pdf->SetX('104');
$pdf->Cell(27, 5, 'UNIT PRICE', 1, 0, 'C');

// Item - Table Header - Cell Text
$pdf->Cell(80, 0, ''); //Positioning Cell
$pdf->SetY('120');
$pdf->SetX('131');
$pdf->Cell(27, 5, 'TOTAL AMOUNT', 1, 0, 'C');

// Item - Table Header - Cell Text
$pdf->Cell(80, 0, ''); //Positioning Cell
$pdf->SetY('120');
$pdf->SetX('158');
$pdf->Cell(40, 5, 'SOURCE OF FUND', 1, 0, 'C');

//OE TABLE ITEMS (LOOP THIS), ADJUST SetY TO INCREMENT BY 5 PER NEW ITEM

// Item - Table Header - Cell Text
$setY = 125;
$counter = -1;
$sum_oe = 0;
if (is_array($records_oe) || is_object($records_oe)) {
  foreach ($records_oe as $record) {
    $pdf->Cell(80, 0, ''); //Positioning Cell
    $pdf->SetY($setY);
    $pdf->SetX('22');
    $pdf->Cell(55, 5, $record->Item, 1, 0, 'C');

    // Item - Table Header - Cell Text
    $pdf->Cell(80, 0, ''); //Positioning Cell
    $pdf->SetY($setY);
    $pdf->SetX('77');
    $pdf->Cell(27, 5, $record->Quantity, 1, 0, 'C');

    // Item - Table Header - Cell Text
    $pdf->Cell(80, 0, ''); //Positioning Cell
    $pdf->SetY($setY);
    $pdf->SetX('104');
    $pdf->Cell(27, 5, $record->Unit_Price, 1, 0, 'C');

    // Item - Table Header - Cell Text
    $pdf->Cell(80, 0, ''); //Positioning Cell
    $pdf->SetY($setY);
    $pdf->SetX('131');
    $pdf->Cell(27, 5, $record->Total_Amount, 1, 0, 'C');

    // Item - Table Header - Cell Text
    $pdf->Cell(80, 0, ''); //Positioning Cell
    $pdf->SetY($setY);
    $pdf->SetX('158');
    $pdf->Cell(40, 5, $record->Source, 1, 0, 'C');

    $setY += 5;
    $counter++;
    $sum_oe += $record->Total_Amount;

  }
}

//END LOOP

//FAR Sub Total

$pdf->Cell(80, 0, ''); //Positioning Cell
$pdf->SetY(134 + ($counter * 5));
$pdf->SetX('22');
$pdf->Cell(176, 5, 'OE SUB TOTAL: PHP ' . $sum_oe, 1, 0, 'C');

//FAR TABLE END

//TOTAL

// TOTAL - Header - SetFont
$pdf->SetFont('arial', 'B', 12);
$pdf->SetTextColor('0', '0', '0');

$pdf->Cell(80, 0, ''); //Positioning Cell
$pdf->SetY(145 + ($counter * 5));
$pdf->SetX('22');
$sum = $sum_far + $sum_oe;
$pdf->Cell(176, 8, 'TOTAL: PHP ' . $sum, 1, 0, 'C');

// BUDGET PROPOSAL TREASURER FORM

// BUDGET PROPOSAL TREASURER FORM NUMBER - SetFont
$pdf->SetFont('century', '', 7);
$pdf->SetTextColor('0', '0', '0');

$pdf->Cell(80, 0, ''); //Positioning Cell
$pdf->SetY('165');
$pdf->SetX('22');
$pdf->Cell(80, 5, 'BUDGET PROPOSAL NUMBER: something something', 1, 0, 'C');

//BOX DRAW

$pdf->Cell(80, 0, ''); //Positioning Cell
$pdf->SetY('173');
$pdf->SetX('22');
$pdf->Cell(80, 50, '', 1);

//OFFICE OF THE TREASURER HEADER

$pdf->SetFont('times', '', 12);
$pdf->SetTextColor('0', '0', '0');

$pdf->Cell(80, 0, ''); //Positioning Cell
$pdf->SetY('175');
$pdf->SetX('24');
$pdf->Cell(76, 5, 'OFFICE OF THE TREASURER', 1, 0, 'C');

//NUMBER OF CHECKS

$pdf->SetFont('century', '', 6);
$pdf->SetTextColor('0', '0', '0');

$pdf->Cell(80, 0, ''); //Positioning Cell
$pdf->SetY('180');
$pdf->SetX('24');
$pdf->Cell(70, 5, 'Number of Checks');

$pdf->Cell(80, 0, ''); //Positioning Cell
$pdf->SetY('185');
$pdf->SetX('30');
$pdf->Cell(23, 3, 'Direct to Supplier', 1, 'C');

$pdf->Cell(80, 0, ''); //Positioning Cell
$pdf->SetY('188');
$pdf->SetX('30');
$pdf->Cell(23, 6, 'Data here', 1, 'C'); //Direct to supplier input here

$pdf->Cell(80, 0, ''); //Positioning Cell
$pdf->SetY('185');
$pdf->SetX('53');
$pdf->Cell(23, 3, 'Student Named', 1, 'C');

$pdf->Cell(80, 0, ''); //Positioning Cell
$pdf->SetY('188');
$pdf->SetX('53');
$pdf->Cell(23, 6, 'Data here', 1, 'C'); //Direct to supplier input here

$pdf->Cell(80, 0, ''); //Positioning Cell
$pdf->SetY('197');
$pdf->SetX('24');
$pdf->Cell(23, 6, 'AMOUNT TO DIRECT TO SUPPLIER: PHP', 'C');

$pdf->Cell(80, 0, ''); //Positioning Cell
$pdf->SetY('200');
$pdf->SetX('24');
$pdf->Cell(23, 6, 'AMOUNT TO REPRESENTATIVE: PHP', 'C');

$pdf->Cell(80, 0, ''); //Positioning Cell
$pdf->SetY('203');
$pdf->SetX('24');
$pdf->Cell(23, 6, 'TOTAL AMOUNT REQUESTED: PHP', 'C');

$pdf->Cell(80, 0, ''); //Positioning Cell
$pdf->SetY('206');
$pdf->SetX('24');
$pdf->Cell(23, 6, 'OVERALL BUDGET REQUESTED: PHP                  as per:        ', 'C');

$pdf->Cell(80, 0, ''); //Positioning Cell
$pdf->SetY('209');
$pdf->SetX('24');
$pdf->Cell(23, 6, 'DATE: ', 'C');

$pdf->Cell(80, 0, ''); //Positioning Cell
$pdf->SetY('212');
$pdf->SetX('24');
$pdf->Cell(23, 6, 'SIGNATURE: ', 'C');

// BUDGET PROPOSAL TREASURER FORM - END

// Treasurer Signature

$pdf->SetFont('century', '', 10);
$pdf->SetTextColor('0', '0', '0');

$pdf->Cell(80, 0, ''); //Positioning Cell
$pdf->SetY('240');
$pdf->SetX('20');
$pdf->Cell(70, 5, 'Jose Gerald E. Pabalate');

$pdf->SetFont('century', '', 10);
$pdf->SetTextColor('0', '0', '0');

$pdf->SetY('245');
$pdf->SetX('20');
$pdf->Cell(70, 5, 'Student Council Treasurer');

// Treasurer Seal

//SBU Image
$pdf->Image(base_url() . 'assets/img/print/sbu.png', 153, 220, 45, 45);

$pdf->AddPage();
$pdf->Output();
?>