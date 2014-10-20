<?php  
include "../aplikasi/koneksi.php";
session_start();
$id = $_POST['id'];
$username = $_POST['username'];
$password = md5($_POST['password']);

$que = mysql_query("select username from login where username='$username'");
$data = mysql_num_rows($que);

if ($password == $_SESSION['password']) {
	if ($data > 0) {
		echo "<script>window.alert('Username Sudah Ada');</script>";
		echo "<script>window.location = 'edit_user.php?id=$_SESSION[id_admin]';</script>";
	} else {
		$query = "update login set username='$username' where id='$_SESSION[id_admin]'";
	}
} else {
	echo "<script>window.alert('Password Anda Tidak Cocok');</script>";
	echo "<script>window.location = 'edit_user.php?id=$_SESSION[id_admin]';</script>";
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