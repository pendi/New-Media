<?php 
echo "<pre>";
print_r($_GET);
exit();
include "../aplikasi/koneksi.php";
session_start();

$sid = session_id();
$id = $_POST['id'];
$quantity = $_POST['quantity'];
$total = $_POST['total'];

$query = "INSERT INTO orders_temp(id_order,id_product,id_session,quantity,total,method) 
			VALUES(null,'$id','$sid','$quantity','$total','bca')";
$hasil = mysql_query($query);

if ($hasil) {
	header("Location:data_customer.php");
}

?>