<?php 
session_start();

if ($_SESSION['level'] == "admin") {
	header("Location:../admin/dashboard.php");
} elseif ($_SESSION['level'] == "co-admin") {
	header("Location:../product/view_product.php");
}
?>