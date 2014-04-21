<?php
include "../aplikasi/koneksi.php";
session_start();

$waktu = time()+25200;
$expired = 5;

$username = trim($_POST['username']);
$password = md5(trim($_POST['password']));

$query	= "SELECT * FROM login WHERE username='$username' AND password='$password'";
$sql	= mysql_query($query);
$numrow	= mysql_num_rows($sql);
$data = mysql_fetch_array($sql);

if($numrow > 0) {
$_SESSION['id']	= $username;
$_SESSION['id_admin'] = $data['id'];
$_SESSION['password'] = $password;
$_SESSION['level'] = $data['level'];
$_SESSION['timeout'] = $waktu + $expired;
header("Location:../admin/check.php");
} else {
echo "<script>alert('Periksa Kembali Username dan Password Anda');</script>";
echo "<meta http-equiv='Refresh' content='0; URL=login.php'>";
}
?>