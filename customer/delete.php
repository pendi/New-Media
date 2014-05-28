<?php
include "../aplikasi/koneksi.php";

$id = $_GET['id'];

$del = mysql_query("delete from orders_temp where id_order=$id");
if($del){
    	header("location:check_delete.php");
	}
?>
