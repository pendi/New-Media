<?php  
include "../aplikasi/koneksi.php";
session_start();

$sid = session_id();
$id = $_POST['id'];
$quantity = $_POST['quantity'];

$query = "INSERT INTO orders_temp(id_order,id_product,id_session,quantity) 
			VALUES(null,'$id','$sid','$quantity')";
$hasil = mysql_query($query);

if ($hasil) {
	header("Location:data_customer.php");
}

?>