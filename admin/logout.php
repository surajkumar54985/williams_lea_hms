 <?php
 session_start();
 ?>
 <?php
 if (isset($_SESSION['admin'])) {
 	unset($_SESSION['admin']);
 	header("Location:../index.php");
 }
?>