<?php
    include '../../model/connection.php';
    include '../../controller/patient/patientsignup.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register now!</title>
</head>

<body style="background-image: url(img/pp.jpg); background-size: cover; background-repeat: no-repeat;">

    <?php include '../header.php'; ?>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 my-5">
                    <div class="card shadow">
                        <div class="card-body">
                            <h5 class="text-center mb-4">Register Now👨‍⚕️!!!</h5>
                            <div><?php echo $show; ?></div>
                            <form method="post">
                                <div class="row my-2">
                                    <div class="form-group col-md-6">
                                        <label>Firstname</label>
                                        <input type="text" name="fname" class="form-control" autocomplete="off" placeholder="Enter Firstname" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Surname</label>
                                        <input type="text" name="sname" class="form-control" autocomplete="off" placeholder="Enter Surname" required>
                                    </div>
                                </div>
                                <div class="row my-2">
                                    <div class="form-group col-md-6">
                                        <label>Username</label>
                                        <input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Email</label>
                                        <input type="text" name="email" class="form-control" autocomplete="off" placeholder="Enter Email address" required>
                                    </div>
                                </div>
                                <div class="row my-2">
                                    <div class="form-group col-md-6">
                                        <label>Select gender</label>
                                        <select name="gender" class="form-control" required>
                                            <option value="">Select Gender</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Select Country</label>
                                        <select name="country" class="form-control" required>
                                            <option value="">Select Country</option>
                                            <option value="India">India</option>
                                            <option value="Nepal">Nepal</option>
                                            <option value="Srilanka">Srilanka</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row my-2">
                                    <div class="form-group col-md-6">
                                        <label>Password</label>
                                        <input type="password" name="pass" class="form-control" autocomplete="off" placeholder="Enter Password" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Confirm Password</label>
                                        <input type="password" name="con_pass" class="form-control" autocomplete="off" placeholder="Enter Confirm Password" required>
                                    </div>
                                </div>
                                <div class="text-center my-3">
                                    <input type="submit" name="apply" value="Apply Now" class="btn btn-danger">
                                    <p class="mt-3 my-3">Already have an account🤦‍♂️<a href="patientlogin.php">Click here</a></p>
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
