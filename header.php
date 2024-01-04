<!DOCTYPE html>
<html lang="en">
<head>
    <title>Hospital Management System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
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

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto">
                <?php
                if (isset($_SESSION['admin']) || isset($_SESSION['doc']) || isset($_SESSION['patient'])) {
                    $user = isset($_SESSION['admin']) ? $_SESSION['admin'] : (isset($_SESSION['doc']) ? $_SESSION['doc'] : $_SESSION['patient']);
                    echo '<li class="nav-item"><a href="#" class="nav-link text-white">@' . $user . '</a></li>
                          <li class="nav-item"><a href="logout.php" class="nav-link text-white">Logout</a></li>';
                } else {
                    echo '<li class="nav-item"><a href="index.php" class="nav-link text-white"><img src="img/home.png" width="20" height="20" alt=""> HOME</a></li>
                          <li class="nav-item"><a href="adminlogin.php" class="nav-link text-white"><img src="img/admin.png" width="20" height="20" alt=""> ADMIN</a></li>
                          <li class="nav-item"><a href="doctorlogin.php" class="nav-link text-white"><img src="img/doctor.png" width="20" height="20" alt=""> DOCTOR</a></li>
                          <li class="nav-item"><a href="patientlogin.php" class="nav-link text-white"><img src="img/patient.jpg" width="20" height="20" alt=""> PATIENT</a></li>';
                }
                ?>
            </ul>
        </div>
    </div>
</nav>

</body>
</html>
