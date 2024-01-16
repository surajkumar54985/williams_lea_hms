
<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
</head>
<body>
<?php 
	include '../header.php'; 
?>

<div class="container-fluid" style="padding-left: unset; margin-top: 0px;">
	<div class="row">
		<div class="col-md-2">
			<?php include 'sidenav.php'; ?>
		</div>
		<div class="col-md-10">
			<h4 class="my-2">All Admins</h4>
			<div class="row">
				<div class="col-md-12">
					<div class="box">
						<table class='table table-bordered'>
							<tr>
								<th>ID</th>
								<th>Username</th>
								<th style="width:10%">Action </th>
							</tr>
							<?php 
								include 'connection.php'; 
								if (isset($_GET['id'])) 
								{
									$id=$_GET['id'];
									$delete=mysqli_query($con,"DELETE FROM `admin` WHERE `id`='$id'");
								}
								$query="select * from admin"; 
								$result=mysqli_query($con,$query); 
							?> 
							<?php 
								while($rows=mysqli_fetch_assoc($result)) 
								{ 
									echo"
									<tr> <td>".$rows['id']."</td> 
									<td>".$rows['username']." </td> 
									<td><a href='admin.php?id=".$rows['id']."' class='btn btn-danger'>Remove</a></td>
									</tr>";
			
								} 
							?>
						</table> 
					</div>
				</div>
				
				<div class="col-md-2"></div>
				<div class="col-md-8">
					<div class="box">
						<h5 class="text-center">Add Admins</h5>
						<div class="card shadow box card-body " style="height:77%; margin-top: 50px;">   
							<form method="post" enctype="multi/form-data">
								<div class="form-group">
									<label>Username</label>
									<input type="text" name="uname" class="form-control" autocomplete="off">
								</div>
								<div class="form-group">
									<label>Password</label>
									<input type="password" name="pass" class="form-control">
								</div>
								<div class="my-2" style="text-align:center;">
									<input type="submit" name="add" value="Add New Admin" class="btn btn-success">
								</div>
							</form>
							<?php 
								$error= array();
								if (isset($_POST['add'])) 
								{
									$uname=$_POST['uname'];
									$pass=$_POST['pass'];
									if (empty($uname)) 
									{
										$error['u']="Admin Username";
									}
									elseif (empty($pass)) 
									{
										$error['p']="Admin Password";
									}
									if(count($error) == 0)
									{
										$hashedPassword = password_hash($pass, PASSWORD_BCRYPT);
										
										$q="INSERT INTO admin(username,password) VALUES('$uname','$hashedPassword')";
										$result=mysqli_query($con,$q);
										if ($result)
										{
											echo "<script>alert('you have registered')";
											header("Location: adminlogin.php");
										}
										else
										{
											echo "<script>alert('failed')";
										}
									}
								}
							?>
						</div>
					</div>
				</div>
				<div class="col-md-2"></div>
			</div>
		</div>
	</div>
</div>


</body>
</html>