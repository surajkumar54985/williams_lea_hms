<?php
require('fpdf.php');
$con=mysqli_connect("localhost","root","","hms");
$pdf= new FPDF();
					if (isset($_GET['id'])) {
						$id=$_GET['id'];
					$query="SELECT * FROM income WHERE id='$id'";
					$res=mysqli_query($con,$query);
					
while ($row=mysqli_fetch_array($res)) {
	$iid=$row['id'];
	$doc=$row['doctor'];
	$pat=$row['patient'];
	$date=$row['date_discharge'];
	$amt=$row['amount_paid'];
	$des=$row['description'];
}

$pdf->AddPage();
$pdf->SetFont("Arial","I",19);

$pdf->Cell(50,10,"ID",2,0);
$pdf->Cell(50,10,$iid,2,1);

$pdf->Cell(50,10,"Doctor Name",2,0);
$pdf->Cell(50,10,"$doc",2,1);

$pdf->Cell(50,10,"Patient Name",2,0);
$pdf->Cell(50,10,"$pat",2,1);

$pdf->Cell(50,10,"Date Discharge",2,0);
$pdf->Cell(50,10,"$date",2,1);

$pdf->Cell(50,10,"Total Amount",2,0);
$pdf->Cell(50,10,"$amt",2,1);

$pdf->Cell(50,10,"Precautions",2,0);
$pdf->Cell(50,10,"$des",2,1);

$pdf->Output();}?>














			
