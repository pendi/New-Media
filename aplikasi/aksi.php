<?php
session_start();
include "../aplikasi/koneksi.php";
if(!isset($_SESSION['transaksi'])){
    $idt = date("YmdHis");
    $_SESSION['transaksi'] = $idt;
}
$idt = $_SESSION['transaksi'];
// $id = $_GET['id'];
if(isset($_GET['id'])) { 
	$id = $_GET['id']; 
} else { 
	$id = ""; 
}

// $act = $_GET['act'];
if(isset($_GET['act'])) { 
	$act = $_GET['act']; 
} else { 
	$act = ""; 
}

// $qty = $_GET['qty'];
if(isset($_GET['qty'])) { 
	$qty = $_GET['qty']; 
} else { 
	$qty = ""; 
}

$encript = md5($id);
$regex = preg_replace("/[^A-Za-z]/", '', $encript);
$alfa = substr($regex, 0, 5);
$kode = strtoupper($alfa);

$kdauto = mysql_query("SELECT max(id_order_temp) AS last FROM orders_temp WHERE id_order_temp LIKE '$kode%'");
$result = mysql_fetch_array($kdauto);
$lastNoTransaksi = $result['last'];
$lastNoUrut = substr($lastNoTransaksi, 5, 4);
$nextNoUrut = $lastNoUrut + 1;
$nextNoTransaksi = $kode.sprintf('%04s', $nextNoUrut);

if ($act == 'add') {
	$time = date("Y-m-d");
	$selectAdd = mysql_query("SELECT * FROM orders_temp WHERE id_product='$id' AND id_session='$idt'");
	$numRowAdd = mysql_num_rows($selectAdd);
	if ($numRowAdd == 0) {
		$insert = mysql_query("INSERT INTO orders_temp(id_order_temp,id_product,id_session,quantity,created_time) 
	            VALUES('$nextNoTransaksi','$id','$idt','1','$time')");
	} else {
		$selectPro = mysql_query("SELECT stock FROM product WHERE id_product = '$id'");
		$dataPro = mysql_fetch_array($selectPro);
		$dataAdd = mysql_fetch_array($selectAdd);
		if ($dataAdd['quantity'] == $dataPro['stock']) {
			echo "<script>window.alert('Maaf, Stok yang Tersedia Hanya $dataPro[stock] Unit');</script>";
			echo "<script>window.location = '../index.php';</script>";
		} else {
			$insert = mysql_query("UPDATE orders_temp SET quantity = quantity+1 WHERE id_product='$id' AND id_session='$idt'");
		}
	}
	if ($insert) {
		echo "<script>window.location = '../customer/purchase.php?id=$id';</script>";
	}
} elseif ($act == 'plus') {
	$update = mysql_query("UPDATE orders_temp SET quantity = $qty + 1 WHERE id_product='$id' AND id_session='$idt'");
	if ($update) {
		echo "<script>window.location = '../customer/purchase.php?id=$id';</script>";
	}
} elseif ($act == 'min') {
	$update = mysql_query("UPDATE orders_temp SET quantity = $qty - 1 WHERE id_product='$id' AND id_session='$idt'");
	if ($update) {
		echo "<script>window.location = '../customer/purchase.php?id=$id';</script>";
	}
} elseif ($act == 'del') {
	$delete = mysql_query("DELETE FROM orders_temp WHERE id_product='$id' AND id_session='$idt'");
	if ($delete) {
		$select = mysql_query("SELECT * FROM orders_temp WHERE id_session='$idt'");
		$numRow = mysql_num_rows($select);
		if ($numRow == 0) {
			echo "<script>window.location = '../index.php';</script>";
		} else {
			echo "<script>window.location = '../customer/purchase.php?id=$id';</script>";
		}
	}
} elseif ($act == 'clear') {
	$delete = mysql_query("DELETE FROM orders_temp WHERE id_session='$idt'");
	if ($delete) {
		echo "<script>window.location = '../index.php';</script>";
	}
}
?>