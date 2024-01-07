<!DOCTYPE html>
<html>
<body>
	<?php
		include '../header.php';
		include '../connection.php';
	?>
	<div class="container-fluid">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-2" style="margin-left:-20px;">
					<?php
					include 'sidenav.php';?>
				</div>
				<div class="col-md-10">
					<div class="text-center"><h3>Total Patients</h3></div>
					<?php
						$query="SELECT * FROM patients";
						$res=mysqli_query($connect,$query);
						$output ="";

						$output="
						<table class='table table-bordered'>
						<tr>
						<th>ID</th>
						<th>Firstname</th> 
						<th>Username</th>
						<th>Email</th>
						<th>Date Registered</th>
						<th>Action</th>

						</tr>";
						if (mysqli_num_rows($res)<1) 
						{
							$output.="
							<tr>
							<td colspan='8'>No Patient</td>
							</tr>
							";
						}
						while ($row=mysqli_fetch_array($res)) 
						{
							$output.="
							<tr>
							<td>".$row['id']."</td>
							<td>".$row['firstname']."</td>
							<td>".$row['username']."</td>
							<td>".$row['email']."</td>
							<td>".$row['date_reg']."</td>
							<td><a href='view.php?id=".$row['id']."'><button class='btn btn-info'>View</button></td>";
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