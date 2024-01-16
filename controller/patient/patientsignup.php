<?php
    include '../../model/connection.php';
    if (isset($_POST['apply'])) 
    {
        $firstname = $_POST['fname'];
        $surname = $_POST['sname']; 
        $username=$_POST['uname'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];
        $country = $_POST['country']; 
        $password= $_POST['pass'];
        $confirm_password = $_POST['con_pass'];
        $error= array();

        $emailCheckQuery = "SELECT * FROM patients WHERE email = '$email'";
        $emailCheckResult = mysqli_query($connect, $emailCheckQuery);

        if (empty($firstname)) {
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
            require_once '../../auth/generateToken.php';
			$token = generateToken($email);
	
			
			$qry="INSERT INTO  token (username,token) VALUES ('$username','$token')";
			$res=mysqli_query($connect,$qry);
			if($res)
			{
                $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
                $query="INSERT INTO  patients (firstname,surname, username,email,gender,country,password,date_reg,profile,status) VALUES ('$firstname','$surname','$username','$email','$gender','$country','$hashedPassword',NOW(),'patient.jpg','pending')";
                $result=mysqli_query($connect,$query);
                require_once '../../Mailer/patientVerificationMail.php';
				if ($result)
				{
					sendVerificationEmail($email, $token);
					echo "<script>alert('you have registered')";
					header("Location: ../../views/patient/patientlogin.php");
				}
				else
				{
					echo "<script>alert('failed')";
				}
            }
        }
    }
    if (isset($error['apply'])) {
        $s=$error['apply'];
        $show="<h5 class='text-center alert alert-danger'>$s</h5>";
    }else{
        $show="";
    }
?>