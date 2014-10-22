<?php  
include "../aplikasi/koneksi.php";
mysql_query("DELETE FROM product WHERE id_product = '$_POST[id]'");
echo "<script>window.alert('Data Berhasil Dihapus');</script>";
echo "<script>window.location = 'view_product.php';</script>";
?>