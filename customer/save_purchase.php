<?php 
include "../aplikasi/koneksi.php";
session_start();

echo "<pre>";
$tot = $_POST['total'];
$totalStr = substr($tot, 0, -2);
$totExp = explode('.', $totalStr);
$total = $totExp[0].$totExp[1].$totExp[2];
$sid = session_id();
$id = $_POST['id'];
$idImp = implode(',', $id);

$qty = $_POST['quantity'];
$qtyImp = implode(',', $qty);

$idOrd = implode(",", $_POST['id_order']);
$encript = md5($idOrd);
$regex = preg_replace("/[^A-Za-z]/", '', $encript);
$alfa = substr($regex, 0, 5);
$kode = strtoupper($alfa);

$kdauto = mysql_query("SELECT max(id_order) AS last FROM orders_temp WHERE id_order LIKE '$kode%'");
$result = mysql_fetch_array($kdauto);
$lastNoTransaksi = $result['last'];
$lastNoUrut = substr($lastNoTransaksi, 5, 3);
$nextNoUrut = $lastNoUrut + 1;
$nextNoTransaksi = $kode.sprintf('%03s', $nextNoUrut);
print_r($nextNoTransaksi);
exit();

$query = "INSERT INTO orders(id,id_transaksi,id_cus,id_product,quantity,total,method) 
			VALUES(null,'','','$idImp','$qtyImp','$total','bca')";
$hasil = mysql_query($query);


if ($hasil) {
	header("Location:data_customer.php");
}

?>