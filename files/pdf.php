<?php
include "ps_connect_db.php";
include('fpdf/fpdf.php');
$pdf=new FPDF();

//Creating new pdf page
$pdf->AddPage();
//Set the base font & size

$pdf->SetFont('Arial','B',10);
$pdf->Cell(15,5,"Name:");

$pdf ->Cell(5,5,"Arnel Moso");
$pdf->Ln();
$pdf->Cell(130,10,"Cut off Dates:");
$pdf->Cell(30,10,"Batch Number:");
$pdf->Cell(30,10,"March 23, 2013");
$pdf->Ln();
$pdf->Cell(15,5,"From:");
$pdf->Cell(15,5,"3/14/2013");
$pdf->Ln();
$pdf->Cell(10,5,"To:");
$pdf->Cell(30,5,"3/22/2013");
//Creating new line
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Arial','',8);
$pdf->Cell(17,10,"Date");
$pdf->Cell(15,10,"In(AM)");
$pdf->Cell(17,10,"Out(AM)");
$pdf->Cell(15,10,"In(PM)");
$pdf->Cell(15,10,"Out(PM)");
$pdf->Cell(20,10,"Actual Hours");
$pdf->Cell(25,10,"Creditable Hours");
$pdf->Cell(17,10,"Night");
$pdf->Cell(17,10,"Holiday");
$pdf->Cell(17,10,"OT");
$pdf->Cell(30,10,"Remarks");
$pdf->Ln();
// Fetch data from table
$pdf->SetFont('Arial','',8);
$pdf->Cell(19,10,"3/14/2013");
$pdf->Cell(15,10,"5:20");
$pdf->Cell(16,10,"4:20");
$pdf->Cell(16,10,"4:20");
$pdf->Cell(17,10,"3:40");
$pdf->Cell(23,10,"9:40");
$pdf->Cell(18,10,"8");
$pdf->Cell(21,10,"4:20");
$pdf->Cell(12,10,"3");
$pdf->Cell(17,10,"4:20");
$pdf->Cell(30,10,"Good Job!");
$pdf->Ln();


// Fetch data total
$pdf->SetFont('Arial','',8);
$pdf->Cell(19,10,"Total");
$pdf->Cell(15,10,"");
$pdf->Cell(16,10,"");
$pdf->Cell(16,10,"");
$pdf->Cell(17,10,"");
$pdf->Cell(23,10,"9:40");
$pdf->Cell(18,10,"8");
$pdf->Cell(21,10,"4:20");
$pdf->Cell(12,10,"3");
$pdf->Cell(17,10,"4:20");
$pdf->Cell(30,10,"Good Job!");
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();

$pdf->Cell(25,10,"Total");
$pdf->Cell(15,10,"9:40");
$pdf->Ln();

$pdf->Cell(25,10,"Night Premium");
$pdf->Cell(15,10,"8");
$pdf->Ln();

$pdf->Cell(25,10,"Total Holidays");
$pdf->Cell(15,10,"4");
$pdf->Ln();

$pdf->Cell(25,10,"Total Overtime");
$pdf->Cell(15,10,"4");
$pdf->Ln();

$pdf->Cell(25,10,"Total Hours");
$pdf->Cell(15,10,"4");
$pdf->Ln();

$pdf->Output();
?>