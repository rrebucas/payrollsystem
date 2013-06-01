<?php


// Include tde main TCPDF library (search for installation patd).
require_once('tcpdf_include.php');
include "../../ps_connect_db.php";

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);



// set default header data
//$pdf->SetdeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDtd, PDF_HEADER_TITLE.' 048', PDF_HEADER_STRING);

// set header and footer fonts
//$pdf->setdeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
//$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetheaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
//$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);





// set font
$pdf->SetFont('helvetica', 'B', 20);

// add a page
$pdf->AddPage();

//$pdf->Write(0, 'Example of HTML tables', '', 0, 'L', true, 0, false, false, 0);

$pdf->SetFont('helvetica', '', 9);

$html = <<<EOF
<style>
h1{
  font-size:16px;
}
th{
  background-color:#262626;
  color: #FFFFFF;
  font-size: 9px;
  text-align: center;
  text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
}
tbody tr:odd td{
  background-color:blue;
}
tbody tr:even td{
  background-color-yellow;
}
</style>
<h1>Name: <span>Arnel Moso</span></h1>
<p class="cut">Cut off Dates</p>
<p class="from">From: <span>05/20/13</span></p>
<p class="to">To: <span>05/31/2013</span></p>
<p class="batch">File Name: <span>Test</span></p>

<table border="1" cellpadding="1" cellspacing="0" align="center">
<thead>
 <tr nobr="true">
  <th rowspan="2">Date</th>
  <th colspan="2">AM</th>
  <th colspan="2">PM</th>
  <th rowspan="2">Actual Hours</th>
  <th rowspan="2">Creditable Hours</th>
  <th rowspan="2">Night</th>
  <th rowspan="2">Holiday</th>
  <th rowspan="2">OT</th>
  <th rowspan="2">Remarks</th>
 </tr>
 <tr nobr="true">
  <th>In</th>
  <th>Out</th>
  <th>In</th>
  <th>Out</th>
 </tr>
 </thead>
 <tbody>
 <tr nobr="true">
  <td>May 16, 2013</td>
  <td>5:40</td>
  <td></td>
  <td></td>
  <td>3:50</td>
  <td>9</td>
  <td>8</td>
  <td>9</td>
  <td>9</td>
  <td>9</td>
  <td>Good</td>
 </tr>
 <tr nobr="true">
  <td>May 17, 2013</td>
  <td></td>
  <td>7:10</td>
  <td>9:50</td>
  <td></td>
  <td>9</td>
  <td>8</td>
  <td></td>
  <td></td>
  <td></td>
  <td>Very Good</td>
   </tr>
  </tbody>
 <tr nobr="true">
  <td colspan="11"></td> 
   </tr>
<tr nobr="true">
  <td>Total</td>
  <td colspan="4"></td>
  <td>18</td>
  <td>16</td>
  <td>9</td>
  <td>9</td>
  <td>9</td>
  <td></td>
   </tr>
</table>
EOF;

$pdf->writeHTML($html, true, false, true, false, '');



$tbl = <<<EOD
<table border="1" cellpadding="0" cellspacing="0" align="center">
 <tr nobr="true">
  <td>Creditable Hours</td>
  <td>16</td>
 </tr>
 <tr nobr="true">
  <td></td>
  <td>0</td>

 </tr>
 <tr nobr="true">
  <td>Total Holiday</td>
  <td>2</td>
 </tr>
 <tr nobr="true">
  <td>Total Overtime</td>
  <td>2</td>
 </tr>
 <tr nobr="true">
  <td>Total Hours</td>
  <td>18</td>
 </tr>
</table>
EOD;

$pdf->writeHTML($tbl, true, false, false, false, '');

// -----------------------------------------------------------------------------

//Close and output PDF document
$pdf->Output('pdf.pdf');

//============================================================+
// END OF FILE
//============================================================+
