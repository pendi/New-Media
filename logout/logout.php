<?php
session_start();
unset($_SESSION['id']);

echo "<script>window.alert('Anda Telah Berhasil Logout');</script>";
echo "<script>window.location = '../aplikasi/index.php';</script>";
?>
