

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login Page</title>
</head>

<body style="background-image: url(img/host.jpg); background-size: cover; background-repeat: no-repeat;">
    <?php include 'header.php'; ?>
	<?php
		include 'connection.php';
		if(isset($_POST['login']))
		{
			$username=$_POST['uname'];
			$password=$_POST['pass'];
			$error=array();
			if (empty($username)) 
			{
				$error['admin']="Enter Username";
			}
			else if (empty($password)) 
			{
				$error['admin']="Enter Password";
			}
			if (count($error)==0) 
			{
				$query="SELECT * FROM admin WHERE username='$username' AND password='$password'";
				$result=mysqli_query($connect,$query);
				if(mysqli_num_rows($result)==1) 
				{	
					echo "<script>alert('you are logged in🤷‍♂️')</script>";	
					$_SESSION['admin']=$username;	
					header("Location:admin/index.php");
					exit();
				}
				else
				{
					echo "<script>alert('Invalid Username or Password')</script>";	
				}
			}
		}
	?>
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 my-5">
                    <div class="card shadow">
                        <div class="card-body">
                            <h5 class="text-center mb-4">Admin Login👨‍⚕️!!!</h5>
                            <div class="alert alert-danger">
								<?php
									if (isset($error['admin'])) 
									{
										$sh=$error['admin'];
										$show="<h5 >$sh</h5>";
									}
									else
									{
										$show="";
									}
									echo $show;
								?>
							</div>
                            <form method="post">
                                <div class="row my-2">
                                    <div class="form-group col-md-12">
                                        <label>Username</label>
										<input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username">
                                    </div>
                                </div>
                                <div class="row my-2">
                                    <div class="form-group col-md-12">
                                        <label>Password</label>
										<input type="password" name="pass" class="form-control" autocomplete="off" placeholder="Enter Password" autocomplete="off">
                                    </div>
                                </div>
                                <div class="text-center my-3">
                                    <input type="submit" name="login" value="Login👈" class="btn btn-danger">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>

</body>

</html>
