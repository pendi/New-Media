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

if(isset($_GET['id_cus'])) { 
	$id_cus = $_GET['id_cus']; 
} else { 
	$id_cus = ""; 
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
} elseif ($act == 'print') {
	$queryOrd = mysql_query("SELECT * FROM orders WHERE id_cus='$id_cus'");
	$dataOrd = mysql_fetch_array($queryOrd);
	$queryTrs = mysql_query("SELECT * FROM transaksi WHERE id_order='$dataOrd[id_order]'");
	while($dataTrs = mysql_fetch_array($queryTrs)){
		$queryPro = mysql_query("SELECT * FROM product WHERE id_product='$dataTrs[id_product]'");
		$dataPro = mysql_fetch_array($queryPro);
		$delete = mysql_query("UPDATE product SET stock='$dataPro[stock]'-'$dataTrs[quantity]' WHERE id_product='$dataTrs[id_product]'");
	}
	if ($delete) {
		$deleteOt = mysql_query("DELETE FROM orders_temp WHERE id_session='$idt'");
		echo "<script>window.location = 'print.php?id_cus=$_GET[id_cus]';</script>";
	}
}
?>