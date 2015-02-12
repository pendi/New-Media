<?php  
include "../aplikasi/koneksi.php";
session_start();
$id = $_POST['id'];
$last_name = strtolower($_POST['last_name']);
$password = md5($_POST['password']);

if ($password == $_SESSION['password']) {
		$query = "UPDATE login SET last_name='$last_name' WHERE id='$_SESSION[id_admin]'";
}else {
	echo "<script>window.alert('Password Anda Tidak Cocok');</script>";
	echo "<script>window.location = 'edit_last_name.php?id=$_SESSION[id_admin]';</script>";
}

$hasil = mysql_query($query);

if ($hasil) {
	echo "<script>window.alert('Data Berhasil Disimpan');</script>";
	echo "<script>window.location = 'check.php';</script>";
} else {
	echo "<script>window.alert('Data Gagal Disimpan');</script>";
	echo "<script>window.location = 'check.php';</script>";
}

?>