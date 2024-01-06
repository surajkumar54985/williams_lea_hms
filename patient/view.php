<?php
require('vendor/autoload.php');
$con=mysqli_connect("localhost","root","","hms");?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Patient Invoice</title>
</head>
<body>
<?php
	include '../header.php';
	?>
	<div class="container-fluid">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-2" style="margin-left:-20px;">
					<?php
					include 'sidenav.php';?>
				</div>
				<div class="col-md-10">
					<div class="text-center"><h3>Patient Invoice</h3></div>
					<?php
					if (isset($_GET['id'])) {
						$id=$_GET['id'];
					$query="SELECT * FROM income WHERE id='$id'";
					$res=mysqli_query($connect,$query);
					$output ="";

$output="
<table class='table table-bordered'>
<tr>
<th>ID</th> 
<th>Doctor name</th> 
<th>Patient name</th>
<th>Date Discharged</th>
<th>Amount Paid</th>
<th>Description</th>

</tr>";
if (mysqli_num_rows($res)<1) {
	$output.="
	<tr>
	<td colspan='8'>No Patient</td>
	</tr>
	";
}
while ($row=mysqli_fetch_array($res)) {
	$output.="
	<tr>
	<td>".$row['id']."</td>
	<td>".$row['doctor']."</td>
	<td>".$row['patient']."</td>
	<td>".$row['date_discharge']."</td>
	<td>".$row['amount_paid']."</td>
	<td>".$row['description']."</td>
	<td><a href='view.php?id=".$row['id']."'>";
}
$output.="
</tr>
</table>";
echo $output;
$output.="
</tr>
</table>";}
$mpdf=new \Mpdf\Mpdf();
$mpdf->WriteHTML($output);
$file='media/'.time().'.pdf';
$mpdf->output($file,'D');?>


					
				</div>
			</div>
		</div>
	</div>
</body>
</html>