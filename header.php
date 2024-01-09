<!DOCTYPE html>
<?php
    session_start();
?>

<html lang="en">
<head>
    <title>Hospital Management System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <style>
        /* .displayNone {
            display:none;
        } */
        @media only screen and (min-width: 991px) {
		.displayNone {
			display:none;
		}
    }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="Hospital Management System Logo">
            HMS
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="displayNone collapse navbar-collapse" id="navbarSupportedContent">
            <ul class=" navbar-nav ms-auto" style="margin-right: 20px;">
                <?php
                if (isset($_SESSION['admin'])) {
                    echo '<li class="nav-item displayNone"><a href="index.php" class="list-group-item">Dashboard</a></li>
                        <li class="nav-item displayNone"><a href="profile.php" class="list-group-item">Profile</a></li>
                        <li class="nav-item displayNone"><a href="admin.php" class="list-group-item">Administrators</a></li>
                        <li class="nav-item displayNone"><a href="doctor.php" class="list-group-item">Doctor</a></li>
                        <li class="nav-item displayNone"><a href="patient.php" class="list-group-item">Patient</a></li>
                        <li class="nav-item displayNone"><a href="logout.php" class="list-group-item">Logout</a></li>';
                } else if(isset($_SESSION['patient'])) {
                    echo '<li class="nav-item displayNone"><a href="index.php" class="list-group-item">Dashboard</a></li>
                    <li class="nav-item displayNone"><a href="profile.php" class="list-group-item">Profile</a></li>
                    <li class="nav-item displayNone"><a href="appointment.php" class="list-group-item">Book Appointment</a></li>
                    <li class="nav-item displayNone"><a href="invoice.php" class="list-group-item">Invoice</a></li>
                    <li class="nav-item displayNone"><a href="logout.php" class="list-group-item">Logout</a></li>';
                } else if(isset($_SESSION['doc'])) {
                    echo '<li class="nav-item displayNone"><a href="index.php" class="list-group-item">Dashboard</a></li>
                    <li class="nav-item displayNone"><a href="profile.php" class="list-group-item">Profile</a></li>
                    <li class="nav-item displayNone"><a href="appointment.php" class="list-group-item">Book Appointment</a></li>
                    <li class="nav-item displayNone"><a href="invoice.php" class="list-group-item">Invoice</a></li>
                    <li class="nav-item displayNone"><a href="logout.php" class="list-group-item">Logout</a></li>';
                } else {
                    echo '<li class="nav-item"><a href="index.php" class="nav-link text-white">HOME</a></li>
                          <li class="nav-item"><a href="adminlogin.php" class="nav-link text-white">ADMIN</a></li>
                          <li class="nav-item"><a href="doctorlogin.php" class="nav-link text-white">DOCTOR</a></li>
                          <li class="nav-item"><a href="patientlogin.php" class="nav-link text-white">PATIENT</a></li>';
                }
                ?>
            </ul>
        </div>
    </div>
</nav>

</body>
</html>
