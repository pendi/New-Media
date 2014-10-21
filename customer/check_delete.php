<?php 
session_start();
// if(!isset($_SESSION['transaksi'])){
//     $idt = date("ymdHis");
//     $_SESSION['transaksi'] = $idt;
// }

$idtransaksi = session_id();
include "../aplikasi/koneksi.php";

$que = mysql_query("select * from orders_temp where id_session='$idtransaksi'");

$numrow = mysql_num_rows($que);
if ($numrow == 0) {
	echo "<script>alert('Anda tidak memiliki keranjang belanja');</script>";
	echo "<meta http-equiv='Refresh' content='0; URL=../aplikasi/index.php'>";
} else {
	header("location:purchase.php");
}
?>