<?php  
include "../aplikasi/koneksi.php";
$query = mysql_query("SELECT * FROM product WHERE id_product = '$_GET[id_product]'");
$data = mysql_fetch_array($query);

if ($data[8]==1) {
	$sql = mysql_query("UPDATE product SET status = 2 WHERE id_product = '$_GET[id_product]'");
} elseif ($data[8]==2) {
	$sql = mysql_query("UPDATE product SET status = 1 WHERE id_product = '$_GET[id_product]'");
}

if ($sql) {
	echo "<script>window.location = 'view_product.php';</script>";
}
?>