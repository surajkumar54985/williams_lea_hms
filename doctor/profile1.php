<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
</head>
<body>
	<?php 
		include '../header.php';
		include '../connection.php';
		$ad=$_SESSION['doc'];
		$query="SELECT * FROM doctors WHERE username='$ad'";
		$res=mysqli_query($connect,$query); 
		while ($row=mysqli_fetch_array($res)) 
		{
			$username=$row['username'];
			$profiles=$row['profile'];
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
					<h5 class="text-center">Dr.<?php echo $username;?>&emsp;Profile</h5>
					<?php
						if (isset($_POST['update'])) 
						{
							$profile=$_FILES['profile']['name'];
							if (empty($profile)) 
							{

							}else
							{
								$query="UPDATE doctors SET profile='$profile' WHERE username='$ad'";
								$result=mysqli_query($connect,$query);
								if ($result) {
									move_uploaded_file($_FILES['profile']['tmp_name'],"img/$profile");
								}
							}
						}
					?>
					<form method="post" enctype="multipart/form-data">
						<img src="img/<?php echo $profiles  ?>"
						class="col-md-12" style="height: 300px;">
						<br><br>
						<div class="form-group">
							<label>UPDATE PROFILE</label>
							<input type="file"  name="profile" class="form-control">
						</div>
						<input type="submit" name="update" value="UPDATE" class="btn btn-success">
					</form>
				</div>
				<div style="margin-left:50% ;width:50%;">
					<?php
						if (isset($_POST['change'])) 
						{
							$uname=$_POST['uname'];
							if (empty($uname)) 
							{
								
							}
							else
							{
								$query="UPDATE doctors SET username='$uname' WHERE username='$ad'";
								$res=mysqli_query($connect,$query);
								if ($res) {
									$_SESSION['doc']=$uname;
								}
							}
						}
					?>
					<form method="post" style="margin-left:20px">
						<label><h6>Update Username</h6></label>
						<input type="text" name="uname" class="form-control" autocomplete="off">
						<input type="submit" name="change" class="btn btn-success">
					</form>
					<br><br><br>
					<?php
						if (isset($_POST['update_pass'])) 
						{
							$old_pass = $_POST['old_pass'];

							$new_pass = $_POST['new_pass']; 
							$con_pass = $_POST['con_pass'];

							$error= array();

							$old = mysqli_query($connect, "SELECT * FROM doctors WHERE username='$ad'");

							$row = mysqli_fetch_array($old); 
							$pass = $row['password'];

							if (empty($old_pass)) 
							{
								$error['p']= "Enter old password";
							}
							else if (empty($new_pass))
							{
								$error['p']="Enter New Password";

							}
							else if(empty($con_pass))
							{
								$error['p'] ="Confirm Password";
							}
							else if($old_pass != $pass)
							{
								$error['p'] = "Invaild Old Password";
							}
							else if($new_pass!= $con_pass)
							{
								$error['p']="Both password does not match";
							}
							if (count($error)==0) 
							{
								$query= "UPDATE doctors SET password='$new_pass' WHERE username='$ad'";
								mysqli_query($connect,$query);
							}
						}
						if (isset($error['p'])) 
						{
							$e = $error['p'];
							$show="<h5 class='text-center alert
							alert-danger'>$e</h5>";
						}
						else
						{
							$show ="";
						}
					?>
					<form method="post" style="margin-left:20px"> 
						<h5 class="text-center my-4">Update Password</h5>
						<div>
							<?php
								echo $show; 
							?>
						</div>
						<div class="form-group">
							<label>Old Password</label> <input type="password" name="old_pass" class="form-control">
						</div>
						<div class="form-group"> 
							<label>New Password</label> <input type="password" name="new_pass" class=" form-control">
						</div>
						<div class="form-group">
							<label>Confirm Password</label> <input type= "password" name="con_pass" class=" form-control"> 
						</div>
						<input type="submit" name="update_pass" value=" Update Password" class="btn btn-info">
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>