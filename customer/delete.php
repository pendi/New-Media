<?php
// echo "<pre>";
// print_r($_GET);
// exit();
include "../aplikasi/koneksi.php";

$id = $_GET['id'];

$del = mysql_query("delete from orders_temp where id_product='$id'");
if($del){
    	header("location:check_delete.php");
	}
?>
