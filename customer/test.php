<?php
session_start();
include "../aplikasi/koneksi.php";
if(!isset($_SESSION['transaksi'])){
    $idt = date("YmdHis");
    $_SESSION['transaksi'] = $idt;
}
$idt = $_SESSION['transaksi'];
$id = $_GET['id'];

$encript = md5($id);
$regex = preg_replace("/[^A-Za-z]/", '', $encript);
$alfa = substr($regex, 0, 5);
$kode = strtoupper($alfa);

$kdauto = mysql_query("SELECT max(id_order) AS last FROM orders_temp WHERE id_order LIKE '$kode%'");
$result = mysql_fetch_array($kdauto);
$lastNoTransaksi = $result['last'];
$lastNoUrut = substr($lastNoTransaksi, 5, 4);
$nextNoUrut = $lastNoUrut + 1;
$nextNoTransaksi = $kode.sprintf('%04s', $nextNoUrut);

$insert = mysql_query("INSERT INTO orders_temp(id_order,id_product,id_session,quantity,total,method) 
        VALUES('$nextNoTransaksi','$id','$idt','0','0','bca')");
// echo "<pre>";
// print_r($insert);
// exit();
?>