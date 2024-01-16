

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
            font-family: 'Comic Sans MS';
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
		include '../../controller/doctor/doctorIsLoggedIn.php';
    ?>
	<div class="container-fluid" style="padding-left: unset; margin-top: 0px;">
        <div class="row">
            <div class="col-md-2">
                <?php include 'sidenav.php'; ?>
            </div>
            <div class="col-md-10">
                <h4 class="my-2">Doctor's Dashboard</h4>
                <div class="row">
                    <div class="col-md-4">
                        <div class="box bg-info">
                            <h3>My Profile&emsp;<a href="profile1.php"><img src="img/profile.jpg"></a></h3>
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
                            <h3>TOTAL&emsp;<a href="appointment.php"><img src="img/job.jpg"><br><b>Appointment</b></a></h3>
							<?php
								$vr=mysqli_query($connect,"SELECT * FROM appointment WHERE status='pending'");
								$num=mysqli_num_rows($vr);
							?>
							<h2>
								<?php echo $num; ?>
							</h2>	
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>