
<!DOCTYPE html>
<html>
<head>
	<title>View Patient Profile</title>
</head>
<body>
	<?php
	include '../../controller/admin/adminIsLoggedIn.php';
	include '../../model/connection.php'; 
	?>
	<div class="container-fluid">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-2" style="margin-left:-20px;">
					<?php
						include 'sidenav.php';
					?>
				</div>
				<div class="col-md-10">
					<div class="text-center"><h3>Patient Details</h3></div>
					<?php
						if (isset($_GET['id'])) 
						{
							$id=$_GET['id'];
							$query = "SELECT * FROM patients WHERE id='$id'";

							$res = mysqli_query($connect, $query);

							$row = mysqli_fetch_array($res);
						}

					?>

					<div class="row">

					<div class="col-md-8">

					<h5 class="text-center"><?php echo $row['surname']; ?> Profile</h5>

					<h5 class="my-3">ID: <?php echo $row['id']; ?></h5>
					<h5 class="my-3">Firstname: <?php echo $row['firstname'];?></h5>

					<h5 class="my-3">Surname: <?php echo $row['surname']; ?></h5>
					<h5 class="my-3">Username: <?php echo $row['username']; ?></h5>
					<h5 class="my-3">Email: <?php echo $row['email']; ?></h5> 
					<h5 class="my-3">Gender : <?php echo $row['gender']; ?></h5>
					<h5 class="my-3">Country : <?php echo $row['country']; ?></h5>
					<h5 class="my-3">Date Registered : <?php echo $row['date_reg']; ?></h5>


					</div>
				</div>
			</div>
		</div>
	</div>
</div>
					
</body>
</html>