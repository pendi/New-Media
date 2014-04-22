<?php
include "../aplikasi/koneksi.php";

$name = trim($_POST['name']);
$address = trim($_POST['address']);
$phone = trim($_POST['phone']);
$email = trim($_POST['email']);

$query = "INSERT INTO customer(id_cus,name,address,phone_number,email)
			VALUES(null,'$name','$address','$phone','$email')";
$hasil = mysql_query($query);

if ($hasil) {
	header("Location:method_of_payment.php");
}
?>