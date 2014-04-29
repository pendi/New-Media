<?php
include "../aplikasi/koneksi.php";
session_start();
if(!isset($_SESSION['transaksi'])){
    $idt = date("YmdHis");
    $_SESSION['transaksi'] = $idt;
}

$idtransaksi = $_SESSION['transaksi'];
$id = $_GET['id_product'];

$sql = "select * from product where id_product='$_GET[id_product]'";
$query = mysql_query($sql);
$data = mysql_fetch_array($query);
$stock = $data['stock'];
$price = $data['price'];

if ($stock == 0) {
	echo "<script>window.alert('Maaf, Stok Tidak Tersedia');</script>";
	echo "<script>window.location = '../aplikasi/index.php';</script>";
} else {
	$input = mysql_query("insert into orders_temp values(null,'$id','$idtransaksi','1','$price','bca')");
	// print_r($input);
	// exit();
	if ($input) {
		header("Location:purchase.php");
	}
}
?>