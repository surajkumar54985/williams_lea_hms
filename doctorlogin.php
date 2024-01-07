<?php
session_start();
?>
<?php
	include 'connection.php';
	if (isset($_POST['login'])) 
	{
		$uname=$_POST['uname'];
		$password=$_POST['pass'];
		$errror=array();
		$q="SELECT * FROM doctors WHERE username='$uname' AND password='$password'";
		$k=mysqli_query($connect,$q);
		$rows=mysqli_fetch_array($k);


		if (empty($uname)) 
		{
			$errror['login']="Enter Username";
		}
		elseif(empty($password))
		{
			$errror['login']="Enter Password";
		}
		elseif($rows['status']=="Pendding")
		{
			$errror['login']="Please Wait For the Admin to Confirm";
		}
		elseif($rows['status']=="Rejected")
		{
			$errror['login']="Try again Later";
		}
		if (count($errror)==0) 
		{
			$query="SELECT * FROM doctors WHERE username='$uname' AND password='$password'";
			$res=mysqli_query($connect,$query);
			if (mysqli_num_rows($res)) 
			{
				echo "<script>alert('done')</script>";
				$_SESSION['doc']=$uname;
				header("Location:doctor/index.php");
			}
			else
			{
				echo "<script>alert('Inavlid account')</script>";
			}
		}
	}
	if(isset($errror['login']))
	{
		$l=$errror['login'];
		$show="<h5 class='text-center alert alert-danger'>$l</h5>";
	}
	else
	{
		$show="";
	} 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Login Page</title>
</head>

<body style="background-image: url(img/host.jpg); background-size: cover; background-repeat: no-repeat;">
    <?php include 'header.php'; ?>
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 my-5">
                    <div class="card shadow">
                        <div class="card-body">
                            <h5 class="text-center mb-4">Patients Login👨‍⚕️!!!</h5>
                            <div><?php echo $show; ?></div>
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
                                    <input type="submit" name="login" value="Login" class="btn btn-danger">
                                    <p class="mt-3 my-3">Dont have an account🤷‍♂️<a href="account.php">!!Apply Now!!</a></p>
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
