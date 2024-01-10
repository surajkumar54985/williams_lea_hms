
<!DOCTYPE html>
<html>
	<head>
		<title>Patient Dashboard</title>
		<style>
			body {
				background-color: #f8f9fa;
			}

			.col-md-2 {
				margin-left: auto;
				margin-right: auto;
				float: none !important;
			}

			.box {
				height: 300px;
				width: 90%;
				margin-left: auto;
				margin-right: auto;
				margin-top: 10px;
				padding: 10px;
				text-align: center;
				border-radius: 10px;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
				transition: transform 0.3s ease-in-out;
			}

			.box:hover {
				transform: scale(1.05);
			}

			.bg-info h3,
			.box h3 {
				/* font-family: 'Comic Sans MS'; */
				color: #fff;
			}

			.bg-info img,
			.box img {
				width: 50px;
				height: 50px;
			}

			.bg-info {
				background-color: #17a2b8;
			}

			.box-info {
				background-color: hotpink;
			}

			.box-warning {
				background-color: yellowgreen;
			}

			.box  a {
				color: #0d6efd;
				text-decoration: blink;
			}

			.container-fluid {
				margin-top: 20px;
			}

			.row {
				margin: 0;
				text-align: center;
			}

			.col-md-10 {
				padding-right: 0;
				margin-left: auto;
				margin-right: auto;
				float: none !important;
			}

			h4 {
				color: #007bff;
			}
		</style>
	</head>
	<body>
		<?php
			include '../header.php';
			include '../connection.php'; 
			require_once '../auth/config.php';
			require_once '../vendor/autoload.php'; // Composer autoloader
			use Firebase\JWT\JWT;
			use Firebase\JWT\Key;
			if (!isset($_SESSION['admin'])) {
				// Redirect to the login page or another page
				header("Location: ../adminlogin.php");
				exit(); // Stop further execution
			}
			else
			{
				$key = new Key('suraj12345678kumar', 'HS256');
				$token = $_SESSION['admin'];
				// Verify the token
				$decoded = JWT::decode($token, $key, ['HS256']);

				if (!isset($decoded->iss, $decoded->aud, $decoded->iat, $decoded->exp, $decoded->data)) {
					header("Location: ../adminlogin.php");
					exit(); // Stop further execution
				}
			}
		?>
		<div class="container-fluid" style="padding-left: unset; margin-top: 0px;">
			<div class="row">
				<div class="col-md-2">
					<?php include 'sidenav.php'; ?>
				</div>
				<div class="col-md-10">
					<h4 class="my-2">Admin Dashboard</h4>
					<div class="row">
						<div class="col-md-4">
							<div class="box bg-info">
								<h3>ADMIN&emsp;<a href="admin.php"><img src="img/adl.jpg"></a></h3>
							</div>
						</div>
						<div class="col-md-4">
							<div class="box box-warning">
								<h3>TOTAL&emsp;<a href="job_request.php"><img src="img/job.jpg"><br><b>Job Request</b></a></h3>
								<?php
									$job=mysqli_query($connect,"SELECT * FROM doctors WHERE status='Pendding'");
									$nm1=mysqli_num_rows($job);
								?>
								<h2>
									<?php echo $nm1; ?>
								</h2>	
							</div>
						</div>
						<div class="col-md-4">
							<div class="box box-warning">
								<h3>TOTAL&emsp;<a href="income.php"><img src="img/in.jpg"><br><b>INCOME</b></a></h3>
								<?php
									$query = "SELECT * FROM income";
									$query_run = mysqli_query($connect,$query);
									$sum1=0;
									while($sum=mysqli_fetch_assoc($query_run)){
										$sum1+=$sum['amount_paid'];
									}

								?>
								<h2>
									<?php echo $sum1; ?>
								</h2>	
							</div>
						</div>
						<div class="col-md-4">
							<div class="box box-info">
								<h3>TOTAL&emsp;<a href="doctor.php"><img src="img/dc.jpg"><br><b>DOCTORS</b></a></h3>
								<?php
									$vr=mysqli_query($connect,"SELECT * FROM doctors");
									$num=mysqli_num_rows($vr);
								?>
								<h2>
									<?php echo $num; ?>
								</h2>
							</div>
						</div>
						<div class="col-md-4">
							<div class="box box-info">
								<h3>TOTAL&emsp;<a href="patient.php"><img src="img/pt.jpg"><br><b>PATIENT</b></a></h3>
								<?php
									$vr=mysqli_query($connect,"SELECT * FROM patients");
									$num=mysqli_num_rows($vr);
								?>
								<h2>
									<?php echo $num; ?>
								</h2>
							</div>
						</div>
						<div class="col-md-4">
							<div class="box box-warning">
								<h3>TOTAL&emsp;<a href="report.php"><img src="img/job.jpg"><br><b>Reports</b></a></h3>
								<?php
									$report=mysqli_query($connect,"SELECT * FROM report");
									$nm1=mysqli_num_rows($report);
								?>
								<h2>
									<?php echo $nm1; ?>
								</h2>	
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>