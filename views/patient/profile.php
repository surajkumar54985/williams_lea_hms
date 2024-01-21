
<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
	<style>
        .profile-card {
            max-width: 500px;
            margin: auto;
            margin-top: 20px;
        }

        .profile-image {
            width: auto;
            height: auto;
            max-height: 300px;
            object-fit: cover;
        }

        .form-container {
            margin-top: 20px;
        }
		.card-body {
			flex: 1 1 auto;
			margin: 1rem 1rem;
		}
	</style>
</head>
<body>
	<?php 
		include '../../controller/patient/patientIsLoggedIn.php';
		include '../../model/connection.php';
		use Firebase\JWT\JWT;
		use Firebase\JWT\Key;
		$key = new Key('suraj12345678kumar', 'HS256');
		$token = $_SESSION['patient'];
		$decoded = JWT::decode($token, $key, ['HS256']);
		$ad=$decoded->data;
		$query="SELECT * FROM patients WHERE username='$ad'";
		$res=mysqli_query($connect,$query); 
		while ($row=mysqli_fetch_array($res)) {
			$username=$row['username'];
			$profiles=$row['profile'];

		} 
	?>
	<div class="row">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-2">
					<?php
					include 'sidenav.php';
					?>
				</div>
				<div class="col-md-10">
					<div class="row">
						<div class="col-md-6">
							<div class="card"style="margin-top: 20px;">
								<h5 class="card-header text-center"><?php echo $username; ?>&emsp;Profile</h5>
								<div class="card-body">
									<?php
									if (isset($_POST['update'])) {
										$profile = $_FILES['profile']['name'];
										if (!empty($profile)) {
											$query = "UPDATE patients SET profile='$profile' WHERE username='$ad'";
											$result = mysqli_query($connect, $query);
											if ($result) {
												move_uploaded_file($_FILES['profile']['tmp_name'], "img/$profile");
											}
										}
									}
									?>
									<form method="post" enctype="multipart/form-data">
										<div class="text-center">
											<img src="img/<?php echo $profiles; ?>" class="profile-image img-fluid" alt="Profile Image">
										</div>
										<div class="form-group form-container" style="text-align: center;">
											<h5>UPDATE PROFILE</h5>
											<input type="file" name="profile" class="form-control">
										</div>
										<div class="mt-4 d-flex align-items-center justify-content-center">
											<input type="submit" name="update" value="UPDATE" class="btn btn-success btn-block">
										</div>
									</form>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="card" style="margin-top:20px;">
								<?php
								if (isset($_POST['change'])) {
									$uname = $_POST['uname'];
									if (!empty($uname)) {
										$query = "UPDATE patients SET username='$uname' WHERE username='$ad'";
										$res = mysqli_query($connect, $query);
										if ($res) {
											$_SESSION['patient'] = $uname;
										}
									}
								}
								?>
								<h5 class="card-header text-center">Update Profile</h5>
								<div class="card-body">
									<form method="post" class="ml-3"  style="text-align: center;">
										<h5 class="text-center">Update Username</h5>
										<div class="form-group">
											<input type="text" name="uname" class="form-control" autocomplete="off">
										</div>
										<div class="mt-4 d-flex align-items-center justify-content-center">
											<input type="submit" name="change" class="btn btn-success btn-block">
										</div>
									</form>
								</div>
								<div class="card-body">
									<?php
									if (isset($_POST['update_pass'])) {
										$old_pass = $_POST['old_pass'];
										$new_pass = $_POST['new_pass'];
										$con_pass = $_POST['con_pass'];

										$error = array();

										$old = mysqli_query($connect, "SELECT * FROM patients WHERE username='$ad'");
										$row = mysqli_fetch_array($old);
										$pass = $row['password'];

										if (empty($old_pass)) {
											$error['p'] = "Enter old password";
										} else if (empty($new_pass)) {
											$error['p'] = "Enter New Password";
										} else if (empty($con_pass)) {
											$error['p'] = "Confirm Password";
										} else if ($old_pass != $pass) {
											$error['p'] = "Invalid Old Password";
										} else if ($new_pass != $con_pass) {
											$error['p'] = "Both password does not match";
										}

										if (count($error) == 0) {
											$query = "UPDATE patients SET password='$new_pass' WHERE username='$ad'";
											mysqli_query($connect, $query);
										}
									}

									if (isset($error['p'])) {
										$e = $error['p'];
										$show = "<h5 class='text-center alert alert-danger'>$e</h5>";
									} else {
										$show = "";
									}
									?>
									<form method="post" class="ml-3">
										<h5 class="text-center">Update Password</h5>
										<div>
											<?php echo $show; ?>
										</div>
										<div class="form-group">
											<label>Old Password</label>
											<input type="password" name="old_pass" class="form-control">
										</div>
										<div class="form-group">
											<label>New Password</label>
											<input type="password" name="new_pass" class="form-control">
										</div>
										<div class="form-group">
											<label>Confirm Password</label>
											<input type="password" name="con_pass" class="form-control">
										</div>
										<div class="mt-4 d-flex align-items-center justify-content-center">
											<input type="submit" name="update_pass" value="Update Password" class="btn btn-info btn-block">
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>