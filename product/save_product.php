<?php  
include "../aplikasi/koneksi.php";

$id = $_POST['id'];
$category = $_POST['category'];
$name = $_POST['name']; 
$type = $_POST['type']; 
$price = $_POST['price'];
$description = $_POST['description'];
$stock = $_POST['stock'];
$folder = "../aplikasi/image";
$tmp_name = $_FILES["image"]["tmp_name"];
$name_img = $folder."/".$_FILES["image"]["name"];

move_uploaded_file($tmp_name, $name_img);

$query = "INSERT INTO product(id_product,name,type,price,description,stock,image,category_id) 
			VALUES('$id','$name','$type','$price','$description','$stock','$name_img','$category')";
$hasil = mysql_query($query);

if ($hasil) {
	echo "<script>window.alert('Data Berhasil Disimpan');</script>";
	echo "<script>window.location = 'view_product.php';</script>";
} else {
	echo "<script>window.alert('Data Gagal Disimpan');</script>";
	echo "<script>window.location = 'view_product.php';</script>";
}
?>