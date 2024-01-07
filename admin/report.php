<?php
	include '../header.php';
	include '../connection.php';
?>
<html>
<body>
	<div class="container-fluid">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-2" style="margin-left:-20px;">
					<?php
					include 'sidenav.php';?>
				</div>
				<div class="col-md-10">
					<div class="text-center"><h3>Total Reports</h3></div>
					<?php
						$query="SELECT * FROM report";
						$res=mysqli_query($connect,$query);
						$output ="";

						$output="
						<table class='table table-bordered'>
						<tr>
						<th>ID</th>
						<th>Subject</th> 
						<th>Issue</th>
						<th>Username</th>
						<th>Date Send</th>
						</tr>";
						if (mysqli_num_rows($res)<1) 
						{
							$output.="
							<tr>
							<td colspan='8'>No Reports</td>
							</tr>
							";
						}
						while ($row=mysqli_fetch_array($res)) 
						{
							$output.="
							<tr>
							<td>".$row['id']."</td>
							<td>".$row['subject']."</td>
							<td>".$row['Issue']."</td>
							<td>".$row['username']."</td>
							<td>".$row['date_send']."</td>
							";
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