<?php
session_start();
include "../aplikasi/koneksi.php";
if(!isset($_SESSION['transaksi'])){
    $idt = date("YmdHis");
    $_SESSION['transaksi'] = $idt;
}
$idt = $_SESSION['transaksi'];

if(isset($_GET['act'])) { 
	$act = $_GET['act']; 
} else { 
	$act = ""; 
}

if ($act == 'cart') {
	$select = mysql_query("SELECT id_session FROM orders_temp WHERE id_session = '$idt'");
	$num = mysql_num_rows($select);
	if ($num > 0) {
		echo "<script>window.location = 'purchase.php';</script>";
	} else {
		echo "<script>window.alert('Keranjang Belanja Anda Masih Kosong');</script>";
		echo "<script>window.location = '../index.php';</script>";
	}
} elseif ($act == 'clear') {
	$delete = mysql_query("DELETE FROM orders_temp WHERE id_session='$idt'");
	if ($delete) {
		echo "<script>window.location = '../index.php';</script>";
	}
}
?>