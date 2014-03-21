<?php  
include "../aplikasi/koneksi.php";

session_start();

$username = strtolower(trim($_POST['username']));
$password = md5(trim($_POST['password']));
if(isset($_POST['status'])) { 
	$status = $_POST['status']; 
} else { 
	$status = ""; 
}

$que = mysql_query("select username from login where username='$username'");
$data = mysql_num_rows($que);

if ($username != "" AND $password != "" AND $status != "") {
	if ($data > 0) {
		echo "<script>window.alert('Username Sudah Ada');</script>";
		echo "<script>window.location = 'add_admin.php';</script>";
	} else {
		$query = "INSERT INTO login(id,username,password,level) VALUES(NULL,'$username','$password','$status')";
	}
} else {
	echo "<script>window.alert('Data Tidak Boleh Kosong');</script>";
	echo "<script>window.location = 'add_admin.php';</script>";
}

$hasil = mysql_query($query);

if ($hasil) {
	echo "<script>window.alert('Data Berhasil Disimpan');</script>";
	echo "<script>window.location = 'view_admin.php';</script>";
} else {
	echo "<script>window.alert('Data Gagal Disimpan');</script>";
	echo "<script>window.location = 'view_admin.php';</script>";
}
?>