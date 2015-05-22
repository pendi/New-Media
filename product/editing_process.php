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

$select = mysql_query("SELECT vendor FROM category WHERE id='$category'");
$data = mysql_fetch_array($select);
$data['vendor'] = strtolower($data['vendor']);

if((!file_exists("../image/product/".$data['vendor']))&&(!is_dir("../image/product/".$data['vendor'])))
{
	$folder = mkdir("../image/product/".$data['vendor']);
}

$tmp_name = $_FILES["image"]["tmp_name"];
$name_img = "../image/product/".$data['vendor']."/".$_FILES["image"]["name"];

if ($fileSize > 0) {

	move_uploaded_file($tmp_name, $name_img);
	
	$query = "UPDATE product SET name='$name',type='$type',price='$price',description='$description',stock='$stock',image='$name_img',category_id='$category' WHERE id_product='$id'";
} else {
	$query = "UPDATE product SET name='$name',type='$type',price='$price',description='$description',stock='$stock',category_id='$category' WHERE id_product='$id'";
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