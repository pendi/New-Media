<?php
include "../aplikasi/koneksi.php";
// echo "<pre>";
// print_r($_POST);
// exit();

$id_order = $_POST['id_order'];
$id_cus = $_POST['id_cus'];
$name = trim($_POST['name']);
$address = trim($_POST['address']);
$phone = trim($_POST['phone']);
$email = trim($_POST['email']);

if (empty($id_cus)) {
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

	$update = mysql_query("UPDATE orders SET id_cus='$nextNoCus' WHERE id_order='$id_order'");
	if ($update) {
		$query = "INSERT INTO customer(id_cus,name,address,phone_number,email)
					VALUES('$nextNoCus','$name','$address','$phone','$email')";
		$hasil = mysql_query($query);
		if ($hasil) {
			echo "<script>window.location = 'summary.php?id=$nextNoCus';</script>";
		}
	}
} else {
	$updateCus = mysql_query("UPDATE customer SET name='$name', address='$address', phone_number='$phone', email='$email' WHERE id_cus='$id_cus'");
	if ($updateCus) {
		echo "<script>window.location = 'summary.php?id=$id_cus';</script>";
	}
}


?>