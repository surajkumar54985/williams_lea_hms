<!DOCTYPE html>
<html>
<head>
	<title>  </title>
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-info bg-dark">
		<h4 class="text-white"><span style="font-family:'Aclonica' font-size:22px"><img src="img/logo.png" width="30" height="30">
  Hospital Management System&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</h4>
		<div class="mr-auto"></div>
		<ul class="navbar-nav">
			<?php
			if (isset($_SESSION['admin'])) {
				$user=$_SESSION['admin'];
				echo '&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<li class="nav-item"><a href="#" class="nav-link text-white">@User</li></a>&emsp;&emsp;
			<li class="nav-item"><a href="logout.php" class="nav-link text-white">logout</a></li>';
			}elseif (isset($_SESSION['doc'])) {
				$user=$_SESSION['doc'];
				echo '&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<li class="nav-item"><a href="#" class="nav-link text-white">@User</li></a>&emsp;&emsp;
			<li class="nav-item"><a href="logout.php" class="nav-link text-white">logout</a></li>';
			}elseif (isset($_SESSION['patient'])) {
				$user=$_SESSION['patient'];
				echo '&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<li class="nav-item"><a href="#" class="nav-link text-white">@User</li></a>&emsp;&emsp;
			<li class="nav-item"><a href="logout.php" class="nav-link text-white">logout</a></li>';
			}
			else{
				echo'<li class="nav-item"><a href="index.php" class="nav-link text-white"><img src="img/home.png" width="20" height="20" alt="">HOME</a></li>
				<li class="nav-item"><a href="adminlogin.php" class="nav-link text-white"><img src="img/admin.png" width="20" height="20" alt="">ADMIN</a></li>
			<li class="nav-item"><a href="doctorlogin.php" class="nav-link text-white"><img src="img/doctor.png" width="20" height="20" alt="">DOCTOR</a></li>
			<li class="nav-item"><a href="patientlogin.php" class="nav-link text-white"><img src="img/patient.jpg" width="20" height="20" alt="">PATIENT</a></li>';
			}?>
		</ul>
	</nav>
</body>
</html>
