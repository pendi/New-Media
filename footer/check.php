<?php 
session_start();

if (isset($_SESSION['id'])) {
	header("Location:../admin/check.php");
} else {
	header("Location:../login/login.php");
}
?>