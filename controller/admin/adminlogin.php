<?php
    include '../../model/connection.php';
    if(isset($_POST['login']))
    {
        $username=$_POST['uname'];
        $password=$_POST['pass'];
        $error=array();
        if (empty($username)) 
        {
            $error['uname']="Enter Username";
        }
        else if (empty($password)) 
        {
            $error['pass']="Enter Password";
        }
        if (count($error)==0) 
        {
            require_once '../../auth/generateToken.php';
            $passwordQuery = "SELECT password FROM admin WHERE username = '$username'";
            $passwordResult = mysqli_query($connect, $passwordQuery);

            if ($passwordResult && mysqli_num_rows($passwordResult) > 0) {
                $row = mysqli_fetch_assoc($passwordResult);
                $storedHashedPassword = $row['password'];

                // Verify the entered password against the stored hash
                if (password_verify($password, $storedHashedPassword)) {
                    $token = generateToken($username);
                    echo "<script>alert('you are logged in🤷‍♂️')</script>";	
                    $_SESSION['admin']=$token;	
                    header("Location:../../views/admin/index.php");
                    exit();
                } else {
                    // Password is incorrect
                    $error['login'] = "Invalid email or password";
                }
            }
        }
    }
?>