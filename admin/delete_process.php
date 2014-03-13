<?php  
include "../aplikasi/koneksi.php";
mysql_query("delete from product where id_product = '$_POST[id]'");
echo "<script>window.alert('Data Berhasil Dihapus');</script>";
echo "<script>window.location = 'view_product.php';</script>";
?>