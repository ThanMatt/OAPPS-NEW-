<?php
if (!$this->session->userdata('logged_in')) {
  redirect("home");
}
if ($org_type != 'N/A' && $this->session->userdata('account_id') != $record->Account_ID) {
  redirect("home");
}

$org_info = $this->accounts_model->getMyInfo($records_ap->Account_ID);
$date = date("F j, Y", strtotime($records_ap->DateActivity));
$proposal_id = $records_ap->Proposal_ID;

// Instanciation of inherited class
$pdf = new FPDF();
$pdf->AliasNbPages();
$pdf->AddPage();

//Cell(float w [, float h [, string txt [, mixed border [, int ln [, string align [, boolean fill [, mixed link]]]]]]])

// Page header
//Custom Fonts
$pdf->AddFont('century', '', 'Century Gothic.php');

// Logo
// Arial bold 15
$pdf->SetFont('Arial', '', 11);
//SBU Image
$pdf->Image(base_url() . 'assets/img/print/sbu.png', 20, 15);
//OPSA Image
$pdf->Image(base_url() . 'assets/img/print/opsa.png', 45, 15);
//ORG Image
$pdf->Image(base_url() . 'assets/img/logo/' . $records_ap->Account_ID . '_logo.png', 70, 15, 21);

// Line break
$pdf->Ln(0);

//San Beda University - Header - SetFont
$pdf->SetFont('Times', '', 10);
$pdf->SetTextColor('255', '63', '63');
// San Beda University - Cell Text
$pdf->Cell(23, 0, ''); //Positioning Cell
$pdf->Cell(0, 65, 'SAN BEDA UNIVERSITY');

// Line break
$pdf->Ln(0);

// College Of Arts and Sciences - Header - SetFont
$pdf->SetFont('Arial', '', 8);
$pdf->SetTextColor('0', '0', '0');
// College Of Arts and Sciences - Cell Text
$pdf->Cell(19, 0, ''); //Positioning Cell
$pdf->Cell(0, 73, 'COLLEGE OF ARTS AND SCIENCES');

// Line break
$pdf->Ln(0);

// Office Of The Prefect Of Student Activities - Header - SetFont
$pdf->SetFont('Arial', 'B', 8);
$pdf->SetTextColor('0', '0', '0');
// Office Of The Prefect Of Student Activities - Cell Text
$pdf->Cell(8, 0, ''); //Positioning Cell
$pdf->Cell(0, 80, 'OFFICE OF THE PREFECT OF STUDENT ACTIVITIES');

// Line break
$pdf->Ln(0);

// OPSA Email - Header - SetFont
$pdf->SetFont('Times', 'U', 9);
$pdf->SetTextColor('48', '93', '255');
// OPSA Email - Cell Text
$pdf->Cell(30, 0, ''); //Positioning Cell
$pdf->Cell(0, 87, 'opsa@sanbeda.edu.ph');

// Line break
$pdf->Ln(0);

// Divider Line
$pdf->Cell(90, 0, '', 0); //Positioning Cell
$pdf->Cell(.0001, 50, '', 1); //Divider Line

// Line break
$pdf->Ln(4);

// Activity Number - Header - SetFont
$pdf->SetFont('century', '', 12);
$pdf->SetTextColor('0', '0', '0');
// Activity Number - Cell Text
$pdf->Cell(95, 0, ''); //Positioning Cell
$pdf->Cell(0, 10, 'CAS-BP-1819-(INSERT VALUES)', 1);

// Line break
$pdf->Ln(13);

// Org Name - Header - SetFont
$pdf->SetFont('times', '', 15);
$pdf->SetTextColor('0', '0', '0');
// Org Name - Cell Text
$pdf->Cell(95, 0, ''); //Positioning Cell
$pdf->MultiCell(0, 9, strtoupper($org_info->Organization), 1, 'C');

// Line break
$pdf->Ln(0);

// Activity Title - Header - SetFont
$pdf->SetFont('Arial', 'B', 8);
$pdf->SetTextColor('0', '0', '0');
// Activity Title - Cell Text
$pdf->Cell(100, 0, ''); //Positioning Cell
$pdf->Cell(0, 10, 'Title: ' . $records_ap->ActivityName, 0, 0, 'C');

// Line break
$pdf->Ln(0);

// Date and Venue - Header - SetFont
$pdf->SetFont('Arial', 'B', 8);
$pdf->SetTextColor('0', '0', '0');
// Date and Venue - Cell Text
$pdf->Cell(100, 0, ''); //Positioning Cell
$pdf->Cell(0, 17, 'Date and Venue: ' . $date, 0, 0, 'C'); //Insert Date Here
$pdf->Ln(0);
$pdf->Cell(100, 0, ''); //Positioning Cell
$pdf->Cell(0, 24, $records_ap->ActivityVenue, 0, 0, 'C'); //Insert Venue Here

// Line break
$pdf->Ln(0);

// Contact Person and Number - Header - SetFont
$pdf->SetFont('Arial', 'B', 8);
$pdf->SetTextColor('0', '0', '0');
// Contact Person and Number - Cell Text
$pdf->Cell(100, 0, ''); //Positioning Cell
$pdf->Cell(0, 32, 'Contact Person and Number: ' . $records_ap->ActivityChair . ' - ' . $records_ap->ChairContactNumber, 0, 0, 'C'); //Insert Contact Person and Number Here

//FAR TABLE START

// Line break
$pdf->Ln(0);

//ACTIVITY TYPE BOX1!!!!!!!!!

$pdf->Cell(80, 0, ''); //Positioning Cell
$pdf->SetY('70');
$pdf->SetX('22');
$pdf->Cell(85, 45, '', 1, 0, 'C');

//INDEPENDENT

$pdf->Cell(80, 0, ''); //Positioning Cell
$pdf->SetY('75');
$pdf->SetX('30');
$pdf->Cell(6, 6, '', 1, 0, 'C', $this->proposals_model->shadeIndependent($proposal_id));

$pdf->SetFont('Arial', 'B', 10);
$pdf->SetTextColor('0', '0', '0');

$pdf->SetY('41.5');
$pdf->SetX('37');
$pdf->Cell(0, 73, 'INDEPENDENT');

//COLLABORATIVE

$pdf->Cell(80, 0, ''); //Positioning Cell
$pdf->SetY('85');
$pdf->SetX('30');
// $pdf->Cell(6, 6,'', 1, 0,'C');
$pdf->Cell(6, 6, '', 1, 0, 'C', $this->proposals_model->shadeCollaborative($proposal_id)); //USE THIS IF BOX IS SELECTED

$pdf->SetFont('Arial', 'B', 10);
$pdf->SetTextColor('0', '0', '0');

$pdf->SetY('51.5');
$pdf->SetX('37');
$pdf->Cell(0, 73, 'COLLABORATIVE');

//PARTNERS

$pdf->SetFont('Arial', '', 10);
$pdf->SetTextColor('0', '0', '0');

$pdf->SetY('55');
$pdf->SetX('37');
$pdf->Cell(0, 73, 'PARTNER/S:');

//PARTNERS LIST

$pdf->SetFont('Arial', 'U', 10);
$pdf->SetTextColor('0', '0', '0');

$pdf->SetY('55');
$pdf->SetX('60');
$pdf->Cell(0, 73, 'ORGANIZATION 1');

$pdf->SetY('60');
$pdf->SetX('60');
$pdf->Cell(0, 73, 'ORGANIZATION 2');

$pdf->SetY('65');
$pdf->SetX('60');
$pdf->Cell(0, 73, 'ORGANIZATION 3');

//ACTIVITY TYPE BOX2!!!!!!!

$pdf->Cell(80, 0, ''); //Positioning Cell
$pdf->SetY('70');
$pdf->SetX('107');
$pdf->Cell(85, 45, '', 1, 0, 'C');

//ACADEMIC

$pdf->Cell(80, 0, ''); //Positioning Cell
$pdf->SetY('75');
$pdf->SetX('115');
$pdf->Cell(6, 6, '', 1, 0, 'C', $this->proposals_model->shadeAcademic($proposal_id));

$pdf->SetFont('Arial', 'B', 10);
$pdf->SetTextColor('0', '0', '0');

$pdf->SetY('41.5');
$pdf->SetX('122');
$pdf->Cell(0, 73, 'ACADEMIC');

//NON-ACADEMIC

$pdf->Cell(80, 0, ''); //Positioning Cell
$pdf->SetY('85');
$pdf->SetX('115');
// $pdf->Cell(6, 6,'', 1, 0,'C');
$pdf->Cell(6, 6, '', 1, 0, 'C', $this->proposals_model->shadeNonAcademic($proposal_id)); //USE THIS IF BOX IS SELECTED

$pdf->SetFont('Arial', 'B', 10);
$pdf->SetTextColor('0', '0', '0');

$pdf->SetY('51.5');
$pdf->SetX('122');
$pdf->Cell(0, 73, 'NON-ACADEMIC');

//PARTNERS

$pdf->SetFont('Arial', 'U', 10);
$pdf->SetTextColor('0', '0', '0');

//ENABLE ONLY ONE OF THESE X MARKS IF NON ACADEMIC IS SELECTED

//COMMUNITY INVOLVEMENT X MARK

$pdf->SetY('57');
$pdf->SetX('125');
$pdf->Cell(0, 73, $this->proposals_model->shadeCommunity($proposal_id));

//CO CURRICULAR X MARK

$pdf->SetY('61');
$pdf->SetX('125');
$pdf->Cell(0, 73, $this->proposals_model->shadeCoCurricular($proposal_id));

//EXTRA-CURRICULAR X MARK

$pdf->SetY('69');
$pdf->SetX('125');
$pdf->Cell(0, 73, '   ');

$pdf->SetY('65');
$pdf->SetX('150');
$pdf->Cell(0, 73, '                             '); // UNDERLINE

$pdf->SetY('73');
$pdf->SetX('150');
$pdf->Cell(0, 73, '                             '); // UNDERLINE

//LABELS

$pdf->SetFont('Arial', '', 10);
$pdf->SetTextColor('0', '0', '0');

$pdf->SetY('57');
$pdf->SetX('130');
$pdf->Cell(0, 73, 'COMMUNITY INVOLVEMENT');

$pdf->SetY('61');
$pdf->SetX('130');
$pdf->Cell(0, 73, 'CO-CURRICULAR');

$pdf->SetY('69');
$pdf->SetX('130');
$pdf->Cell(0, 73, 'EXTRA-CURRICULAR');

$pdf->SetY('65');
$pdf->SetX('130');
$pdf->Cell(0, 73, 'SPECIFIED: ' . $records_ap->Specified); // INSERT CO CURRICULAR VALUES HERE

$pdf->SetY('73');
$pdf->SetX('130');
$pdf->Cell(0, 73, 'SPECIFIED: ' . $records_ap->Specified); // INSERT EXTRA CURRICULAR VALUES HERE

//MAIN BOX!!!!!!!

//MAIN BOX LABELS

$pdf->SetFont('Arial', 'B', 10);
$pdf->SetTextColor('0', '0', '0');

$pdf->Cell(80, 0, ''); //Positioning Cell
$pdf->SetY('125');
$pdf->SetX('22');
$pdf->Cell(70, 6, 'ACTIVITY DETAILS', 1, 0, 'C');

$pdf->Cell(80, 0, ''); //Positioning Cell
$pdf->SetY('125');
$pdf->SetX('92');
$pdf->Cell(100, 6, 'NATURE OF THE ACTIVITY', 1, 0, 'C');

$pdf->Cell(80, 0, ''); //Positioning Cell
$pdf->SetY('175');
$pdf->SetX('92');
$pdf->Cell(100, 6, 'OBJECTIVES OF THE ACTIVITY', 1, 0, 'C');

$pdf->Cell(80, 0, ''); //Positioning Cell
$pdf->SetY('215');
$pdf->SetX('92');
$pdf->Cell(100, 6, 'RATIONALE', 1, 0, 'C');

//MAIN BOX DETAILS

$pdf->SetFont('Arial', '', 10);
$pdf->SetTextColor('0', '0', '0');

$pdf->SetY('131');
$pdf->SetX('22');
$pdf->Cell(70, 145, '', 1, 0, 'C');

$pdf->SetY('67');
$pdf->SetX('22');
$pdf->Cell(70, 145, 'Activity Chair', 0, 0, 'C');

$pdf->SetY('78');
$pdf->SetX('22');
$pdf->Cell(70, 145, 'Participants', 0, 0, 'C');

$pdf->SetY('91');
$pdf->SetX('22');
$pdf->Cell(70, 145, 'Venue', 0, 0, 'C');

$pdf->SetFont('Arial', 'B', 11);
$pdf->SetTextColor('0', '0', '0');

$pdf->SetY('62');
$pdf->SetX('22');
$pdf->Cell(70, 145, $records_ap->ActivityChair, 0, 0, 'C');

$pdf->SetY('73');
$pdf->SetX('22');
$pdf->Cell(70, 145, $records_ap->Participants, 0, 0, 'C');

$pdf->SetY('86');
$pdf->SetX('22');
$pdf->Cell(70, 145, $records_ap->ActivityVenue, 0, 0, 'C');

$pdf->SetFont('Arial', 'U', 12);
$pdf->SetTextColor('0', '0', '0');

$pdf->SetY('62');
$pdf->SetX('22');
$pdf->Cell(70, 145, '                                        ', 0, 0, 'C');

$pdf->SetY('73');
$pdf->SetX('22');
$pdf->Cell(70, 145, '                                        ', 0, 0, 'C');

$pdf->SetY('86');
$pdf->SetX('22');
$pdf->Cell(70, 145, '                                        ', 0, 0, 'C');

// CHECK LIST

$pdf->SetFont('Arial', 'B', 10);
$pdf->SetTextColor('0', '0', '0');

$pdf->SetY('170');
$pdf->SetX('35');
$pdf->Cell(3, 3, 'CHECK LIST:', 0, 0, 'C');

$pdf->SetFont('Arial', 'U', 12);
$pdf->SetTextColor('0', '0', '0');

$pdf->SetY('170');
$pdf->SetX('35');
$pdf->Cell(3, 3, '                   ', 0, 0, 'C');

// CHECKLIST BOXES

$pdf->SetFont('Arial', '', 10);
$pdf->SetTextColor('0', '0', '0');

$pdf->SetY('175.3');
$pdf->SetX('28');
$pdf->Cell(3, 3, 'Cash Request', 0, 0, '');

$pdf->SetY('175');
$pdf->SetX('25');
$pdf->Cell(3, 3, '', 1, 0, 'C');

$pdf->SetY('180.3');
$pdf->SetX('28');
$pdf->Cell(3, 3, 'Program', 0, 0, '');

$pdf->SetY('180');
$pdf->SetX('25');
$pdf->Cell(3, 3, '', 1, 0, 'C');

$pdf->SetY('185.3');
$pdf->SetX('28');
$pdf->Cell(3, 3, 'MOA of Suppliers', 0, 0, '');

$pdf->SetY('185');
$pdf->SetX('25');
$pdf->Cell(3, 3, '', 1, 0, 'C');

$pdf->SetY('190.3');
$pdf->SetX('28');
$pdf->Cell(3, 3, 'List of Participants', 0, 0, '');

$pdf->SetY('190');
$pdf->SetX('25');
$pdf->Cell(3, 3, '', 1, 0, 'C');

$pdf->SetY('195.3');
$pdf->SetX('28');
$pdf->Cell(3, 3, 'Food Request', 0, 0, '');

$pdf->SetY('195');
$pdf->SetX('25');
$pdf->Cell(3, 3, '', 1, 0, 'C');

//ADDITIONAL FOR OFF CAMPUS ACTIVITY

$pdf->SetY('203');
$pdf->SetX('50');
$pdf->Cell(3, 3, 'Additonal for Off-Campus Activity', 0, 0, 'C');

$pdf->SetY('208.3');
$pdf->SetX('28');
$pdf->Cell(3, 3, 'Map and Contact Person', 0, 0, '');

$pdf->SetY('208');
$pdf->SetX('25');
$pdf->Cell(3, 3, '', 1, 0, 'C');

$pdf->SetY('213.3');
$pdf->SetX('28');
$pdf->Cell(3, 3, 'Contact of Hospital & Police Station', 0, 0, '');

$pdf->SetY('213');
$pdf->SetX('25');
$pdf->Cell(3, 3, '', 1, 0, 'C');

$pdf->SetY('218.3');
$pdf->SetX('28');
$pdf->Cell(3, 3, 'Letter of Moderator', 0, 0, '');

$pdf->SetY('218');
$pdf->SetX('25');
$pdf->Cell(3, 3, '', 1, 0, 'C');

$pdf->SetY('223.3');
$pdf->SetX('28');
$pdf->Cell(3, 3, 'Letter To The Parents', 0, 0, '');

$pdf->SetY('223');
$pdf->SetX('25');
$pdf->Cell(3, 3, '', 1, 0, 'C');

$pdf->SetY('228.3');
$pdf->SetX('28');
$pdf->Cell(3, 3, 'Waiver Forms', 0, 0, '');

$pdf->SetY('228');
$pdf->SetX('25');
$pdf->Cell(3, 3, '', 1, 0, 'C');

$pdf->SetY('233.3');
$pdf->SetX('28');
$pdf->Cell(3, 3, 'Medical Kit', 0, 0, '');

$pdf->SetY('233');
$pdf->SetX('25');
$pdf->Cell(3, 3, '', 1, 0, 'C');

// LOGISTICS

$pdf->SetFont('Arial', 'B', 10);
$pdf->SetTextColor('0', '0', '0');

$pdf->SetY('241');
$pdf->SetX('35');
$pdf->Cell(3, 3, 'LOGISTICS:', 0, 0, 'C');

$pdf->SetFont('Arial', 'U', 12);
$pdf->SetTextColor('0', '0', '0');

$pdf->SetY('241');
$pdf->SetX('35');
$pdf->Cell(3, 3, '                   ', 0, 0, 'C');

// LOGISTICS BOXES

$pdf->SetFont('Arial', '', 10);
$pdf->SetTextColor('0', '0', '0');

$pdf->SetY('246.3');
$pdf->SetX('28');
$pdf->Cell(3, 3, 'Letter of Reservation', 0, 0, '');

$pdf->SetY('246');
$pdf->SetX('25');
$pdf->Cell(3, 3, '', 1, 0, 'C');

$pdf->SetY('251.3');
$pdf->SetX('28');
$pdf->Cell(3, 3, 'Letter of Entry', 0, 0, '');

$pdf->SetY('251');
$pdf->SetX('25');
$pdf->Cell(3, 3, '', 1, 0, 'C');

$pdf->SetY('256.3');
$pdf->SetX('28');
$pdf->Cell(3, 3, 'IMC Reservation', 0, 0, '');

$pdf->SetY('256');
$pdf->SetX('25');
$pdf->Cell(3, 3, '', 1, 0, 'C');

$pdf->SetY('261.3');
$pdf->SetX('28');
$pdf->Cell(3, 3, 'Letter of Sponsorship', 0, 0, '');

$pdf->SetY('261');
$pdf->SetX('25');
$pdf->Cell(3, 3, '', 1, 0, 'C');

$pdf->SetY('266.3');
$pdf->SetX('28');
$pdf->Cell(3, 3, 'Letter of Invitation', 0, 0, '');

$pdf->SetY('266');
$pdf->SetX('25');
$pdf->Cell(3, 3, '', 1, 0, 'C');

$pdf->SetY('271.3');
$pdf->SetX('28');
$pdf->Cell(3, 3, 'Excuse Letter', 0, 0, '');

$pdf->SetY('271');
$pdf->SetX('25');
$pdf->Cell(3, 3, '', 1, 0, 'C');

$pdf->SetFont('century', '', 12);
$pdf->SetTextColor('0', '0', '0');

// NATURE OF THE ACTIVITY BOX

$pdf->SetY('131');
$pdf->SetX('92');
$pdf->Cell(100, 44, '', 1, 0, 'J');

$pdf->SetY('131');
$pdf->SetX('94');
$pdf->MultiCell(96, 5, $records_ap->Nature, 0, 'J'); //:: 230 characters maximum

// OBJECTIVES OF THE ACTIVITY BOX
$pdf->SetY('181');
$pdf->SetX('92');
$pdf->Cell(100, 34, '', 1, 0, 'J');

$pdf->SetY('181');
$pdf->SetX('94');
$pdf->MultiCell(96, 5, $records_ap->Objectives, 0, 'J'); //:: 230 characters maximum
// RATIONALE BOX

$pdf->SetY('221');
$pdf->SetX('92');
$pdf->Cell(100, 55, '', 1, 0, 'C');

$pdf->SetY('221');
$pdf->SetX('94');
$pdf->MultiCell(96, 5, $records_ap->Rationale, 0, 'J'); //:: 350 characters maximum

$pdf->AddPage();
$pdf->Output();
?>