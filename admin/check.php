<?php 
session_start();

if(!isset($_SESSION['id'])) {
  	echo "<script>window.alert('Anda Harus Login Dulu');</script>";
	echo "<script>window.location = '../login/login.php';</script>";
} else {
	if ($_SESSION['level'] == "super admin") {
		header("Location:../admin/dashboard.php");
	} elseif ($_SESSION['level'] == "admin") {
		header("Location:../product/view_product.php");
	}	
}
?>