<?php
include "../aplikasi/koneksi.php";

$sql = "select * from product where id_product='$_GET[id_product]'";
$query = mysql_query($sql);
$data = mysql_fetch_array($query);
$stock = $data['stock'];

if ($stock == 0) {
	echo "<script>window.alert('Maaf, Stok Tidak Tersedia');</script>";
	echo "<script>window.location = '../aplikasi/index.php';</script>";
} else {
	header("Location:purchase.php?id_product=$data[0]");
}
?>