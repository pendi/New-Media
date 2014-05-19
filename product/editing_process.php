<?php  
include "../aplikasi/koneksi.php";
$id = $_POST['id'];
$category = $_POST['category'];
$name = $_POST['name'];
$type = $_POST['type'];
$price = $_POST['price'];
$description = $_POST['description'];
$stock = $_POST['stock'];
$fileSize = $_FILES["image"]["size"];
$folder = "../aplikasi/image";
$tmp_name = $_FILES["image"]["tmp_name"];
$name_img = $folder."/".$_FILES["image"]["name"];

if ($fileSize > 0) {

	move_uploaded_file($tmp_name, $name_img);
	
	$query = "update product set name='$name',type='$type',price='$price',description='$description',stock='$stock',image='$name_img',category_id='$category' where id_product='$id'";
} else {
	$query = "update product set name='$name',type='$type',price='$price',description='$description',stock='$stock',category_id='$category' where id_product='$id'";
}

$hasil = mysql_query($query);
if ($hasil) {
	echo "<script>window.alert('Data Berhasil Disimpan');</script>";
	echo "<script>window.location = 'view_product.php';</script>";
} else {
	echo "<script>window.alert('Data Gagal Disimpan');</script>";
	echo "<script>window.location = 'view_product.php';</script>";
}

?>