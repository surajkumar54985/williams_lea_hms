<?php
session_start();?>
<!DOCTYPE html>
<html>
<head>
	<title>Appointment Details</title>
</head>
<body>
	<?php 
		include '../header.php';
		include '../connection.php';
		$query="SELECT * FROM appointment";
		$res=mysqli_query($connect,$query);
		while ($row=mysqli_fetch_array($res)) 
		{
			$id=$row['id'];
			$fname=$row['firstname'];
			$sname=$row['surname'];
			$gender=$row['gender'];
			$Appd=$row['appointment_date'];
			$sym=$row['symptoms'];
			$dateb=$row['date_bookec'];
		} 
	?>
	<div class="col-md-12">
		<div class="row">
			<div class="col-md-2" style="margin-left: -5px;">
				<?php
					include 'sidenav.php';
				?>
			</div>
			<div style="width:80%;">
				<div style="width:50%;float:left ;">
					<h5 class="text-center"> Details</h5>
					<h5 class="my-3">Firstname: <?php echo $fname;?></h5>
					<h5 class="my-3">Surname: <?php echo $sname; ?></h5>
					<h5 class="my-3">Gender : <?php echo $gender; ?></h5>
					<h5 class="my-3">Appointment date : <?php echo $Appd; ?></h5>
					<h5 class="my-3">Symptoms : <?php echo $sym; ?></h5>
					<h5 class="my-3">Date Booked : <?php echo $dateb; ?></h5>
					<div style="margin-left:50% ;width:50%;">
						<?php
							if (isset($_POST['send'])) 
							{
								$fee= $_POST['fee'];
								$des = $_POST['Des'];
								if (empty($fee)) {
								}
								else if(empty($des)){

								}
								else
								{
									$doc = $_SESSION['doc'];
									$query = "INSERT INTO income( doctor, patient, date_discharge, amount_paid, description) VALUES ('$doc', '$fname', NOW(), '$fee', '$des')";

									$res = mysqli_query($connect, $query);
									if ($res) 
									{
										echo "<script>alert(' you have sent Invoice')</script>";
										mysqli_query($connect,"UPDATE appointment SET status='Dicharge' WHERE id='$id'"); 
									}
								}
							}
						?>
						<div class="box " style="height:77%;width: 151%;  margin-left: 350px;margin-top: -250px;border: solid 3px black;background-color: lightgoldenrodyellow;">
							<form method="post">
								<h4 class="text-center">Invoice</h4>
								<div class="form-group">
									<label>Fees</label>
									<input type="text" name="fee" class="form-control" autocomplete="off" placeholder="Enter amount">
								</div>
								<div class="form-group">
									<label>Description</label>
									<input type="text" name="Des" class="form-control">
								</div>
								<input type="submit" name="send" value="send" class="btn btn-success">
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>