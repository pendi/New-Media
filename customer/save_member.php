<?php
include "../aplikasi/koneksi.php";

$username = strtolower(trim($_POST['username']));
$name = trim($_POST['name']);
$address = trim($_POST['address']);
$phone = trim($_POST['phone']);
$email = trim($_POST['email']);
$password = md5(trim($_POST['password']));
$password_con = md5(trim($_POST['password_con']));

$encript = md5($name);
$regex = preg_replace("/[^A-Za-z]/", '', $encript);
$alfa = substr($regex, 0, 5);
$kode = strtoupper($alfa);

$kdauto = mysql_query("SELECT max(id_member) AS last FROM member WHERE id_member LIKE '$kode%'");
$result = mysql_fetch_array($kdauto);
$lastNoCus = $result['last'];
$lastNoUrut = substr($lastNoCus, 5, 3);
$nextNoUrut = $lastNoUrut + 1;
$nextNoCus = $kode.sprintf('%03s', $nextNoUrut);

$que = mysql_query("SELECT username FROM member WHERE username='$username'");
$data = mysql_num_rows($que);

if($data > 0) {
	echo "<script>window.alert('Username Sudah Ada');</script>";
	echo "<script>window.location = 'add_member.php';</script>";
} else {
	if ($password != $password_con) {
		echo "<script>window.alert('Konfirmasi Password Anda Salah');</script>";
		echo "<script>window.location = 'add_member.php';</script>";
	} else {
		$query = "INSERT INTO member(id_member,username,name,address,phone_number,email,password) VALUES('$nextNoCus','$username','$name','$address','$phone','$email','$password')";
	}
}

$hasil = mysql_query($query);

if ($hasil) {
	echo "<script>window.alert('Data Berhasil Disimpan');</script>";
	echo "<script>window.location = '../login/member.php';</script>";
} else {
	echo "<script>window.alert('Data Gagal Disimpan');</script>";
	echo "<script>window.location = '../index.php';</script>";
}


?>