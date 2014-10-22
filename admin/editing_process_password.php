<?php  
include "../aplikasi/koneksi.php";
session_start();
$id = $_POST['id'];
$oldpass = md5($_POST['oldpass']);
$newpass = md5($_POST['newpass']);
$newpass2 = md5($_POST['newpass2']);

if ($oldpass == $_SESSION['password']) {
	if ($newpass2 == $newpass) {
		$query = "UPDATE login SET password='$newpass' WHERE id='$_SESSION[id_admin]'";
	} else {
		echo "<script>window.alert('Konfirmasi Password Anda Tidak Cocok');</script>";
		echo "<script>window.location = 'edit_password.php?id=$_SESSION[id_admin]';</script>";
	}
} else {
	echo "<script>window.alert('Password Anda Tidak Cocok');</script>";
	echo "<script>window.location = 'edit_password.php?id=$_SESSION[id_admin]';</script>";
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