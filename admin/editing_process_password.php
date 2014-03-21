<?php  
include "../aplikasi/koneksi.php";
session_start();
$id = $_POST['id'];
$oldpass = md5($_POST['oldpass']);
$newpass = md5($_POST['newpass']);
$newpass2 = md5($_POST['newpass2']);

// $que = mysql_query("select * from login where id='$_SESSION[id]'");
// $data = mysql_fetch_array($que);

if ($oldpass == $_SESSION['password']) {
	if ($newpass2 == $newpass) {
		$query = "update login set password='$newpass' where id='$_SESSION[id_admin]'";
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
	// print_r($query);
	// exit();


// echo "<script language=\"Javascript\">\n";
// 	mysql_query("$query");
// 	echo "window.alert('Data Berhasil Disimpan');";
// 	echo "window.location = 'view_product.php';";
// 	// echo "<h2>Data Berhasil Disimpan</h2>";
// echo "</script>";

?>