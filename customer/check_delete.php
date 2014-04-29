<?php 
session_start();
if(!isset($_SESSION['transaksi'])){
    $idt = date("ymdHis");
    $_SESSION['transaksi'] = $idt;
}

$idtransaksi = $_SESSION['transaksi'];
include "../aplikasi/koneksi.php";

$que = mysql_query("select * from orders_temp where id_session='$idtransaksi'");

$numrow = mysql_num_rows($que);
if ($numrow == 0) {
	header("location:../aplikasi/index.php");
} else {
	header("location:purchase.php");
}
?>