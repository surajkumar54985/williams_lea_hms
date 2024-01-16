<!DOCTYPE html>
<html>
<head>
	<title>Total Doctors</title>
</head>
<body>
	<?php
		include '../header.php';
		include '../../model/connection.php';
	?>
	<div class="container-fluid">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-2" style="margin-left:-20px;">
					<?php
					include 'sidenav.php';?>
				</div>
				<div class="col-md-10">
					<div class="text-center"><h3>Total Doctors</h3></div>
					<?php
						$query="SELECT * FROM doctors WHERE status='Approved' ORDER BY data_reg ASC";
						$res=mysqli_query($connect,$query);
						$output ="";
						$output="
						<table class='table table-bordered'>
						<tr>
						<th>ID</th>
						<th>Firstname</th> 
						<th>Username</th>
						<th>Email</th>
						<th>Date Registerd</th> 
						<th>Action</th>

						</tr>";
						if (mysqli_num_rows($res)<1) {
							$output.="
							<tr>
							<td colspan='8'>No doctors</td>
							</tr>
							";
						}
						while ($row=mysqli_fetch_array($res)) {
							$output.="
							<tr>
							<td>".$row['id']."</td>
							<td>".$row['firstname']."</td>
							<td>".$row['username']."</td>
							<td>".$row['email']."</td>
							<td>".$row['country']."</td>
							<td><a href='edit.php?id=".$row['id']."'><button class='btn btn-info'>Edit</button></td>";
						}
						$output.="
						</tr>
						</table>";
						echo $output;
						$output.="
						</tr>
						</table>";
					?>
					
				</div>
			</div>
		</div>
	</div>
</body>
</html>