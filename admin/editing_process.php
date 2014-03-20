<?php  
include "../aplikasi/koneksi.php";
session_start();
$id = $_POST['id'];
$username = $_POST['username'];
$oldpass = md5($_POST['oldpass']);
$newpass = md5($_POST['newpass']);
$newpass2 = md5($_POST['newpass2']);

$que = mysql_query("select * from login where id='$_SESSION[id]'");
$data = mysql_fetch_array($que);

if ($oldpass == $_SESSION['password']) {
	if ($newpass2 == $newpass) {
		if ($newpass != "" AND $newpass2 != "") {
			$query = "update login set username='$username',password='$newpass' where id='$_SESSION[id]'";
		} else {
			$query = "update login set username='$username',password='$oldpass' where id='$_SESSION[id]'";
		}
	} else {
		echo "<script>window.alert('Konfirmasi Password Anda Tidak Cocok');</script>";
		echo "<script>window.location = 'edit.php?id=$id';</script>";
	}
} else {
	echo "<script>window.alert('Password Anda Tidak Cocok');</script>";
	echo "<script>window.location = 'edit.php?id=$id';</script>";
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