<?php  
include "../aplikasi/koneksi.php";
mysql_query("delete from login where id = '$_POST[id]'");
echo "<script>window.alert('Data Berhasil Dihapus');</script>";
echo "<script>window.location = 'view_admin.php';</script>";
?>