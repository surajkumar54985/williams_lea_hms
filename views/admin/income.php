<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Income</title>
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
					$query="SELECT * FROM income WHERE date_discharge!='' ORDER BY date_discharge ASC";
					$res=mysqli_query($connect,$query);
					$output ="";

					$output="
					<table class='table table-bordered'>
					<tr>
					<th>ID</th>
					<th>Doctor</th> 
					<th>Patient</th>
					<th>Date Discharge</th>
					<th>Amount Paid</th>
					</tr>";
					if (mysqli_num_rows($res)<1) {
						$output.="
						<tr>
						<td colspan='8'>No Patient Discharge Yet</td>
						</tr>
						";
					}
					while ($row=mysqli_fetch_array($res)) {
						$output.="
						<tr>
						<td>".$row['id']."</td>
						<td>".$row['doctor']."</td>
						<td>".$row['patient']."</td>
						<td>".$row['date_discharge']."</td>
						<td>".$row['amount_paid']."</td>";
					}
					$output.="
					</tr>
					</table>";
					echo $output;
					$output.="
					</tr>
					</table>"
					;?>
					
				</div>
			</div>
		</div>
	</div>
</body>
</html>
