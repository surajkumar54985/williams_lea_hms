
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>My Invoice</title>
</head>
<body>
	<?php 
	include '../../controller/patient/patientIsLoggedIn.php';
	include '../../model/connection.php';?>
	<div class="container-fluid">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-2" style="margin-left:-30px;">
					<?php include 'sidenav.php';?>
				</div>
				<div class="col-md-10">
					<h5 class="text-center my-2">My Invoice</h5>
					<?php
					
					use Firebase\JWT\JWT;
					use Firebase\JWT\Key;
					$key = new Key('suraj12345678kumar', 'HS256');
					$token = $_SESSION['patient'];
					$decoded = JWT::decode($token, $key, ['HS256']);

					$pat = $decoded->data;
					$query = "SELECT * FROM patients WHERE username='$pat'"; 
					$res = mysqli_query($connect, $query);

$row = mysqli_fetch_array($res);

$fname = $row['firstname'];


$querys = mysqli_query($connect, "SELECT * FROM income WHERE patient='$fname'");

$output="";

$output.="

<table class='table table-bordered'>

<tr>

<td>ID</td>

<td>Doctor</td>

<td>Patient</td>
</tr>";
if (mysqli_num_rows($querys) < 1) {

$output .= "

<tr>

<td colspan='7' class='text-center'>No Invoice Yet</td>

</tr> ";

}

while ($row = mysqli_fetch_array($querys)) {

$output .= "

<tr>

<td>".$row['id']."</td>

<td>".$row['doctor']."</td> 
<td>".$row['patient']."</td>
<td>

<a href='pdf/view.php?id=".$row['id']."'> <button class='btn btn-info'>View</button>

</a>

</td> "; }
$output.="</tr></table>";
echo $output; ?>

				</div>
			</div>
		</div>
	</div>

</body>
</html>