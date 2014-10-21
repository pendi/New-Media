<?php
include "../aplikasi/koneksi.php";

$name = trim($_POST['name']);
$address = trim($_POST['address']);
$phone = trim($_POST['phone']);
$email = trim($_POST['email']);

$encript = md5($name);
$regex = preg_replace("/[^A-Za-z]/", '', $encript);
$alfa = substr($regex, 0, 5);
$kode = strtoupper($alfa);

$kdauto = mysql_query("SELECT max(id_cus) AS last FROM customer WHERE id_cus LIKE '$kode%'");
$result = mysql_fetch_array($kdauto);
$lastNoCus = $result['last'];
$lastNoUrut = substr($lastNoCus, 5, 3);
$nextNoUrut = $lastNoUrut + 1;
$nextNoCus = $kode.sprintf('%03s', $nextNoUrut);

$update = mysql_query("UPDATE orders SET id_cus='$nextNoCus'");
if ($update) {
	$query = "INSERT INTO customer(id_cus,name,address,phone_number,email)
				VALUES('$nextNoCus','$name','$address','$phone','$email')";
	$hasil = mysql_query($query);
	if ($hasil) {
	// echo "<pre>";
	// print_r($hasil);
	// exit();
		echo "<script>window.location = 'summary.php?id=$nextNoCus';</script>";
	}
}


?>