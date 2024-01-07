
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
		include '../header.php';
		include '../connection.php'; 
	?>
	<div class="container-fluid" style="padding-left: unset; margin-top: 0px;">
        <div class="row">
            <div class="col-md-2">
                <?php include 'sidenav.php'; ?>
            </div>
            <div class="col-md-10">
                <h4 class="my-2">Patient Dashboard</h4>
                <div class="row">
                    <div class="col-md-4">
                        <div class="box bg-info">
                            <h3>My Profile&emsp;<a href="prifile.php"><img src="img/profile.jpg"></a></h3>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="box box-info">
                            <h3>Book Appointment&emsp;&emsp;<a href="appointment.php"><img src="img/appoint.png"></a></h3>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="box box-warning">
                            <h3>My Invoice&emsp;&emsp;<a href="invoice.php"><img src="img/inv.jpg"></a></h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
						<div class="card shadow box card-body " style="height:77%;width: 80%; margin-top: 50px;">   
							<form method="post">
								<div class="form-group">
									<label>Subject</label>
									<input type="text" name="sub" class="form-control my-2" autocomplete="off" placeholder="My Doctor">
								</div>
								<div class="form-group">
									<label>Issue</label>
									<input type="text" name="meg" class="form-control my-2">
								</div>
								<input type="submit" name="send" value="Send" class="btn btn-success my-2">
							</form>
						</div>
                    </div>
                    <div class="col-md-2"></div>
                </div>
            </div>
        </div>
    </div>
	<?php 
		if (isset($_POST['send'])) 
		{
			$sub=$_POST['sub'];
			$issue=$_POST['meg'];
			if (empty($sub)) 
			{
				echo"<script>alert('no subjext')</script>";
			}
			elseif(empty($issue))
			{
				echo"<script>alert('no issue')</script>";
			}
			else
			{
				$user=$_SESSION['patient'];
				$query="INSERT INTO report(subject,issue,username,date_send) VALUES('$sub','$issue','$user',NOW())";
				$res=mysqli_query($connect,$query);
				if ($res) 
				{
					echo"<script>alert('Report has been sent')</script>";
				}
			}
		}
	?>
</body>
</html>