
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HMS Home Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        .card-img-top {
            object-fit: cover;
            height: 350px;
        }
    </style>
</head>
<body>

    <?php 
        include './views/header.php';
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: POST");
    ?>
    <?php
        if (isset($_SESSION['admin']))
        {
            header("Location:views/admin/index.php");
        }
        else if(isset($_SESSION['patient']))
        {
            header("Location:views/patient/index.php");
        }
        else if(isset($_SESSION['doc']))
        {
            header("Location:views/doctor/index.php");
        }
        else
        {
            echo '<div class="container mt-3">
                <div class="row">
                    <div class="col-md-4 mb-4">
                        <div class="card shadow">
                            <img src="img/doc.jpg" class="card-img-top" alt="Doctor Image">
                            <div class="card-body">
                                <h5 class="card-title text-center text-dark bg-light">Register yourself as a Doctor👨‍⚕️</h5>
                                <a href="/views/doctor/apply.php" class="btn btn-success btn-block">Register!!!</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mb-4">
                        <div class="card shadow">
                            <img src="img/pat.jpg" class="card-img-top" alt="Patient Image">
                            <div class="card-body">
                                <h5 class="card-title text-center text-dark bg-light">Register yourself for consultation🤹‍♀️</h5>
                                <a href="/views/patient/account.php" class="btn btn-success btn-block">Create Account!!!</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mb-4">
                        <div class="card shadow">
                            <img src="img/cont.jpg" class="card-img-top" alt="Contact Image">
                            <div class="card-body">
                                <h5 class="card-title text-center text-dark bg-light">Click below to contact us🤝</h5>
                                <a href="contact.html" class="btn btn-success btn-block">Contact!!!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';
        }
    ?>



</body>
</html>
