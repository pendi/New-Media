<?php 
include "../aplikasi/koneksi.php";
session_start();

if(!isset($_SESSION['transaksi'])){
    $idt = date("YmdHis");
    $_SESSION['transaksi'] = $idt;
}
$idt = $_SESSION['transaksi'];

$id = $_POST['id'];
$qty = $_POST['quantity'];

$encript = md5("ORDER");
$regex = preg_replace("/[^A-Za-z]/", '', $encript);
$alfa = substr($regex, 0, 5);
$kode = strtoupper($alfa);

$kdauto = mysql_query("SELECT max(id_order) AS last FROM orders WHERE id_order LIKE '$kode%'");
$result = mysql_fetch_array($kdauto);
$lastNoOrder = $result['last'];
$lastNoUrut = substr($lastNoOrder, 5, 3);
$nextNoUrut = $lastNoUrut + 1;
$nextNoOrder = $kode.sprintf('%03s', $nextNoUrut);

$time = date("Y-m-d");
$query = "INSERT INTO orders(id_order,id_cus,created_time) 
			VALUES('$nextNoOrder','','$time')";
$hasil = mysql_query($query);

$sql = mysql_query("SELECT max(id_order) AS idOrd FROM orders LIMIT 1");
$row = mysql_fetch_array($sql);
$idOrd = $row['idOrd'];

foreach($qty as $key => $value){
	$sql = "INSERT INTO transaksi(id,id_order,id_product,quantity,created_time)
	values (null,'{$idOrd}','{$id[$key]}','{$value}','{$time}')";
	mysql_query($sql);
}

if ($hasil) {
	header("Location:data_customer.php?id_order=$idOrd");
}

?>