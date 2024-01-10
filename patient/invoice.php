<?php
	require_once '../auth/config.php';
	require_once '../vendor/autoload.php'; // Composer autoloader
	use Firebase\JWT\JWT;
	use Firebase\JWT\Key;
	if (!isset($_SESSION['patient'])) {
		// Redirect to the login page or another page
		header("Location: ../patientlogin.php");
		exit(); // Stop further execution
	}
	else
	{
		$key = new Key('suraj12345678kumar', 'HS256');
		$token = $_SESSION['patient'];
		// Verify the token
		$decoded = JWT::decode($token, $key, ['HS256']);

		if (!isset($decoded->iss, $decoded->aud, $decoded->iat, $decoded->exp, $decoded->data)) {
			header("Location: ../patientlogin.php");
			exit(); // Stop further execution
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>My Invoice</title>
</head>
<body>
	<?php 
	include '../header.php';
	include '../connection.php';?>
	<div class="container-fluid">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-2" style="margin-left:-30px;">
					<?php include 'sidenav.php';?>
				</div>
				<div class="col-md-10">
					<h5 class="text-center my-2">My Invoice</h5>
					<?php

$pat = $_SESSION['patient'];

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