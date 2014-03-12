<?php  
include "../aplikasi/koneksi.php";
$id = $_POST['id'];
$name = $_POST['name'];
$type = $_POST['type'];
$price = $_POST['price'];
$description = $_POST['description'];
$stock = $_POST['stock'];
$folder = "../aplikasi/image";
$tmp_name = $_FILES["image"]["tmp_name"];
$name_img = $folder."/".$_FILES["image"]["name"];

move_uploaded_file($tmp_name, $name_img);

echo "<script language=\"Javascript\">\n";
	$query = "update product set name='$name',type='$type',price='$price',description='$description',stock='$stock',image='$name_img' where id_product='$id'";
	mysql_query("$query");
	echo "window.alert('Data Berhasil Disimpan');";
	echo "window.location = 'view_product.php';";
	// echo "<h2>Data Berhasil Disimpan</h2>";
echo "</script>";

?>