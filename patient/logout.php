<?php
 session_start();
?>
<?php
 if (isset($_SESSION['patient'])) {
 	unset($_SESSION['patient']);
 	header("Location:../index.php");
 }
?>