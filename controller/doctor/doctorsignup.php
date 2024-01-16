<?php
    include '../../model/connection.php';
	if (isset($_POST['apply'])) 
	{
		$firstname = $_POST['fname'];
		$surname = $_POST['sname']; 
		$username=$_POST['uname'];
		$email = $_POST['email'];
		$gender = $_POST['gender'];
		$phone = $_POST['phone'];
		$country = $_POST['country']; 
		$password= $_POST['pass'];
		$confirm_password = $_POST['con_pass'];
		$error= array();

        $emailCheckQuery = "SELECT * FROM doctors WHERE email = '$email'";
        $emailCheckResult = mysqli_query($connect, $emailCheckQuery);

		if (empty($firstname)) 
		{
			$error['apply'] = "Enter Firstname" ;
		}
		else if (empty($surname))
		{
			$error['apply'] ="Enter surname"; 
		}
		else if(empty($username))
		{
			$error['apply'] = "Enter username"; 
		}
		else if(empty($email))
		{
			$error['apply'] = "Enter Email Address";
		}
		else if($gender="")
		{
			$error['apply'] = "Select Your Gender";
		}
		else if(empty($phone))
		{
			$error['apply'] = "Enter Phone Number";
		}
		else if($country="")
		{
			$error['apply'] = "Select Country";
		}
		else if(empty($password))
		{
			$error['apply'] = "Enter Password";
		}
		else if($confirm_password!=$password)
		{
			$error['apply'] = "Both Password do not match";
		}
        else if (mysqli_num_rows($emailCheckResult) > 0) {
            $error['apply'] = "User with this email already exists. Please log in.";
        }
		if (count($error) == 0) 
		{
			$hashedPassword = password_hash($password, PASSWORD_BCRYPT);

			$query="INSERT INTO  doctors (firstname,surname,username,email,gender,phone,country,password,salary,data_reg,status,profile) VALUES ('$firstname','$surname','$username','$email','$gender','$phone','$country','$hashedPassword','0',NOW(),'Pendding','doctor.jpg')";
			$result=mysqli_query($connect,$query);
			if ($result)
			{
				echo "<script>alert('you have registered')";
				header("Location: ../../views/doctor/doctorlogin.php");
			}
			else
			{
				echo "<script>alert('failed')";
			}
		}
	}
	if (isset($error['apply'])) 
	{
		$s=$error['apply'];
		$show="<h5 class='text-center alert alert-danger'>$s</h5>";
	}
	else
	{
		$show="";
	}
?>