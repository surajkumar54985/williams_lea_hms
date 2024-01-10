<?php
	require_once '../auth/config.php';
	require_once '../vendor/autoload.php'; // Composer autoloader
	use Firebase\JWT\JWT;
	use Firebase\JWT\Key;
	if (!isset($_SESSION['doctor'])) {
		// Redirect to the login page or another page
		header("Location: ../doctorlogin.php");
		exit(); // Stop further execution
	}
	else
	{
		$key = new Key('suraj12345678kumar', 'HS256');
		$token = $_SESSION['doctor'];
		// Verify the token
		$decoded = JWT::decode($token, $key, ['HS256']);

		if (!isset($decoded->iss, $decoded->aud, $decoded->iat, $decoded->exp, $decoded->data)) {
			header("Location: ../doctorlogin.php");
			exit(); // Stop further execution
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Appointments</title>
</head>
<?php
	include '../header.php';
	include '../connection.php';
?>
<body>
	<div class="container-fluid">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-2" style="margin-left:-20px;">
					<?php
					include 'sidenav.php';?>
				</div>
				<div class="col-md-10">
					<div class="text-center">
						<h3>Total Appointments</h3>
					</div>
					<?php
						$query="SELECT * FROM appointment WHERE status='pending'";
						$res=mysqli_query($connect,$query);
						$output ="";
						$output="
						<table class='table table-bordered'>
						<tr>
						<th>ID</th>
						<th>Firstname</th> 
						<th>Surname</th>
						<th>Appointment date</th> 
						<th>Symptoms</th>
						<th>Date Booked</th>
						<th>Action</th>
						</tr>";
						if (mysqli_num_rows($res)<1) 
						{
							$output.="
							<tr>
							<td colspan='8'>No Appointment</td>
							</tr>
							";
						}
						while ($row=mysqli_fetch_array($res)) 
						{
							$output.="
							<tr>
							<td>".$row['id']."</td>
							<td>".$row['firstname']."</td>
							<td>".$row['surname']."</td>
							<td>".$row['appointment_date']."</td>
							<td>".$row['symptoms']."</td>
							<td>".$row['date_bookec']."</td>
							<td><a href='check.php?id=".$row['id']."'><button class='btn btn-info'>Check</button></td>";
						}
						$output.="
						</tr>
						</table>";
						echo $output;
					?>
				</div>
			</div>
		</div>
	</div>
</body>
</html>