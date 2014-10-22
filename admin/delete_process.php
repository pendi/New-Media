<?php  
include "../aplikasi/koneksi.php";
mysql_query("DELETE FROM login WHERE id = '$_POST[id]'");
echo "<script>window.alert('Data Berhasil Dihapus');</script>";
echo "<script>window.location = 'view_admin.php';</script>";
?>