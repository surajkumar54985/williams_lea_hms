<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navigation</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <style>
        body {
            margin: 0;
            padding: 0;
        }

        .list-group {
          display:flex;
		  flex-direction:column;
		  justify-content:space-between;
		  gap:320px;
		  /* margin-top:-20px; */
		  background-color: #343a40;
        }

        .list-group-item {
            border: none;
            text-align: left;
			background: #343a40;
            padding-left: 25px;
            padding-right: 15px;
            padding-top: 15px;
            padding-bottom: 15px;
            font-size: 18px;
            font-weight: 16px;
			height:60px;
            color: #adb5bd; 
            transition: color 0.3s ease-in-out, #fff 0.3s ease-in-out;
        }

        .list-group-item:hover {
            background-color: #495057;
            color: #fff; 
			border-bottom:1px solid white;
			border-left:4px solid white;
        }
		@media only screen and (max-width: 991px) {
		.list-group {
			display:none;
		}
	}
    </style>
	
</head>


<body>
    <div class="list-group bg-dark" >
		<div>
        <a href="index.php" class="list-group-item bg-dark">Dashboard</a>
        <a href="profile.php" class="list-group-item bg-dark">Profile</a>
        <a href="admin.php" class="list-group-item bg-dark">Administrators</a>
        <a href="doctor.php" class="list-group-item bg-dark">Doctor</a>
        <a href="patient.php" class="list-group-item bg-dark">Patient</a>
		</div>
		<div style="margin-bottom: 20px;">
		
		<a href="logout.php" class="list-group-item bg-dark" style="display:flex; gap:10px; align-items:center; justify-content:center;"><i class="fas fa-sign-out"></i>logout</a>
		</div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-pzjw8t+7HRqNRz9z9tY1fofuDy0k6L+ZywcTBV6SA5AqDh/KDPUWOpGFMNlPNSoD" crossorigin="anonymous"></script>
</body>

</html>


