<?php
 session_start();
 ?>
 <?php
 if (isset($_SESSION['doctor'])) {
 	unset($_SESSION['doctor']);
 	header("Location:/index.php");
 }
?>