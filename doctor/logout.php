 <?php
 session_start();
 if (isset($_SESSION['doc'])) {
 	unset($_SESSION['doc']);
 	header("Location:../index.php");
 }
?>