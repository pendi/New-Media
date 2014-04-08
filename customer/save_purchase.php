<?php  
include "../aplikasi/koneksi.php";
session_start();

$id = $_POST['id'];
$quantity = $_POST['quantity'];

$query = "INSERT INTO orders(id_order,id_product,quantity) 
			VALUES(null,'$id','$quantity')";
$hasil = mysql_query($query);

if ($hasil) {
	header("Location:../aplikasi/index.php");
}

?>