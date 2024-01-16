
<!DOCTYPE html>
<html>
<head>
	<title>Job Request</title>
</head>
<body>
	<?php
	include '../../controller/admin/adminIsLoggedIn.php';
		include '../../model/connection.php';  
	?>
	<div class="container-fluid"> 
		<div class="col-md-12" style="margin-left: -20px;"> 
			<div class="row">
				<div class="col-md-2">
			 <?php include 'sidenav.php'; ?></div> 
<div class="col-md-10">
<h5 class="text-center">Job Request</h5>
<?php
	include '../../model/connection.php';

	$query= "SELECT * FROM doctors WHERE status='Pendding' ORDER BY data_reg ASC";
	$res=mysqli_query($connect, $query);

	$output ="";

	$output="
	<table class='table table-bordered'>
	<tr>
	<th>ID</th>
	<th>Firstname</th> 
	<th>Surnamek</th>
	<th>Username</th>
	<th>Email</th>
	<th>Phone</th> 
	<th>Date Registerd</th>
	<th>Action</th
	</tr>";
	if (mysqli_num_rows($res)<1) {
		$output.="
		<tr>
		<td colspan='8'>No job Request</td>
		</tr>
		";
	}
	while ($row=mysqli_fetch_array($res)) {
		$output.="
		<tr>
		<td>".$row['id']."</td>
		<td>".$row['firstname']."</td>
		<td>".$row['surname']."</td>
		<td>".$row['username']."</td>
		<td>".$row['email']."</td>
		<td>".$row['phone']."</td>
		<td>".$row['data_reg']."</td>
		<td>
		<form Action='job_request.php' method='POST'>
		<input type='hidden' name='id' value=".$row['id'].">
		<input type='submit' name='approve' class='btn btn-success' value='Approve'>
		<input type='submit' name='reject' class='btn btn-danger'value='Reject'>
		</form></td>";
	}
	$output.="
	</tr>
	</table>";
	echo $output;
	$output.="
	</tr>
	</table>";
?>
<?php
	if(isset($_POST['approve'])){ $id = $_POST['id'];

	$select = "UPDATE doctors SET status = 'approved' WHERE id = '$id'";
	$result = mysqli_query($connect, $select);

	echo '<script type "text/javascript">';

	echo 'alert("User Approved!");';

	echo 'window.location.href="job_request.php"';

	echo'</script>';

	}

	if(isset($_POST['reject'])){
	$id = $_POST['id'];

	$select= "DELETE FROM doctors WHERE id = '$id'";
	$result = mysqli_query($connect, $select);

	echo '<script type="text/javascript">';

	echo 'alert("User Denied!");';

	echo 'window.location.href = "job_request.php"';

	echo '</script>';}
?>


</div>
</div>
</div>
</div>
</body>
</html>