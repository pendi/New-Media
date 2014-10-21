<?php
session_start();
include "../aplikasi/koneksi.php";
// if(!isset($_SESSION['transaksi'])){
//     $idt = date("YmdHis");
//     $_SESSION['transaksi'] = $idt;
// }
$idt = session_id();

if(isset($_GET['act'])) { 
	$act = $_GET['act']; 
} else { 
	$act = ""; 
}

if ($act == 'cart') {
	$select = mysql_query("SELECT id_session FROM orders_temp WHERE id_session = '$idt'");
	$num = mysql_num_rows($select);
	// echo "<pre>";
	// print_r($idt);
	// exit();
	if ($num > 0) {
		echo "<script>window.location = 'purchase.php';</script>";
	} else {
		echo "<script>window.alert('Keranjang Belanja Anda Kosong');</script>";
		echo "<script>window.location = '../index.php';</script>";
	}
}
?>