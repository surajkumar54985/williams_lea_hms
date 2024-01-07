
<?php
include '../connection.php';
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
<th>Gender</th>
<th>Phone</th>
<th>country</th> 
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
	<td>".$row['gender']."</td>
	<td>".$row['phone']."</td>
	<td>".$row['country']."</td>
	<td>".$row['data_reg']."</td>
	<td>
	<button id='".$row['id']."' class='btn btn-success approve'>Approve</button>
	<button id='".$row['id']."' class='btn btn-danger approve'>Reject</button></td>
	</div>
	</div>
	</td>";
}
$output.="
</tr>
</table>";
echo $output;
$output.="
</tr>
</table>";?>









