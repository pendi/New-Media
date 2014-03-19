<?php  
include "../aplikasi/koneksi.php";

$username = strtolower(trim($_POST['username']));
$password = md5(trim($_POST['password']));
if(isset($_POST['status'])) { 
	$status = $_POST['status']; 
} else { 
	$status = ""; 
}

if ($username != "" AND $password != "" AND $status != "") {

	$query = "INSERT INTO login(id,username,password,level) VALUES(NULL,'$username','$password','$status')";
	$hasil = mysql_query($query);

	if ($hasil) {
		echo "<script>window.alert('Data Berhasil Disimpan');</script>";
		echo "<script>window.location = 'view_admin.php';</script>";
	} else {
		echo "<script>window.alert('Data Gagal Disimpan');</script>";
		echo "<script>window.location = 'view_admin.php';</script>";
	}
} else {
	echo "<script>window.alert('Data Tidak Boleh Kosong');</script>";
	echo "<script>window.location = 'add_admin.php';</script>";
}
?>