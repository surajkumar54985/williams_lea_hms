<?php
    include '../../model/connection.php';
    if (isset($_POST['login'])) {
        $uname=$_POST['uname'];
        $password=$_POST['pass'];
        $errror=array();
        $q="SELECT * FROM patients WHERE username='$uname' AND password='$password'";
        $k=mysqli_query($connect,$q);
        $rows=mysqli_fetch_array($k);

        if (empty($uname)) {
            $errror['login']="Enter Username";
        }
        elseif(empty($password)){
            $errror['login']="Enter Password";
        }
        if (count($errror)==0) {
            require_once '../../auth/generateToken.php';
    
            $passwordQuery = "SELECT password FROM patients WHERE username = '$uname'";
            $passwordResult = mysqli_query($connect, $passwordQuery);

            if ($passwordResult && mysqli_num_rows($passwordResult) > 0) {
                $row = mysqli_fetch_assoc($passwordResult);
                $storedHashedPassword = $row['password'];

                if (password_verify($password, $storedHashedPassword)) {	
                    $statusQuery = "SELECT status FROM patients WHERE username = '$uname' AND password = '$storedHashedPassword'";
                    $statusResult = mysqli_query($connect, $statusQuery);
                    if (mysqli_num_rows($statusResult)) {
                        $statusrow = mysqli_fetch_assoc($statusResult);
                        $status = $statusrow['status'];
                        if($status !=="approved")
                        {
                            echo "<script>alert('Please verify your account first!!')</script>";
                        }
                        else
                        {
                            $token = generateToken($uname);
                            echo "<script>alert('done')</script>";
                            $_SESSION['patient']=$token;
                            header("Location:../../views/patient/index.php");
                        }
                    }
                    else{
                        echo "<script>alert('Inavlid account')</script>";
                    }
                } else {
                    $error['login'] = "Invalid email or password";
                }
            }
        }
    }
    if(isset($errror['login'])){
        $l=$errror['login'];
        $show="<h5 class='text-center alert alert-danger'>$l</h5>";
    }else{
        $show="";
    } 
?>