<?php  
include "../aplikasi/koneksi.php";
$category = $_POST['category'];
$name = $_POST['name']; 
$type = $_POST['type']; 
$price = $_POST['price'];
$description = $_POST['description'];
$stock = $_POST['stock'];
$fileSize = $_FILES["image"]["size"];

$select = mysql_query("SELECT vendor FROM category WHERE id='$category'");
$data = mysql_fetch_array($select);
$vendor = strtolower($data['vendor']);

if((!file_exists("../image/product/".$vendor))&&(!is_dir("../image/product/".$vendor)))
{
	$folder = mkdir("../image/product/".$vendor);
}

$tmp_name = $_FILES["image"]["tmp_name"];
$name_img = $vendor."/".$_FILES["image"]["name"];


$vend = substr($data['vendor'], 0, 2);
$encript = md5($data['vendor']);
$alfaOnly = preg_replace("/[^A-Za-z]/", '', $encript);
$alfa = substr($alfaOnly, 0, 3);
$kode = strtoupper($vend.$alfa);

$kdauto = mysql_query("SELECT max(id_product) AS last FROM product WHERE id_product LIKE '$kode%'");
$result = mysql_fetch_array($kdauto);
$lastNoProduct = $result['last'];
$lastNoUrut = substr($lastNoProduct, 5, 3);
$nextNoUrut = $lastNoUrut + 1;
$nextNoProduct = $kode.sprintf('%03s', $nextNoUrut);

if ($fileSize > 0) {
	move_uploaded_file($tmp_name, $name_img);
	$query = "INSERT INTO product(id_product,name,type,price,description,stock,image,category_id,status) 
			VALUES('$nextNoProduct','$name','$type','$price','$description','$stock','$name_img','$category','1')";
} else {
	$query = "INSERT INTO product(id_product,name,type,price,description,stock,image,category_id,status) 
			VALUES('$nextNoProduct','$name','$type','$price','$description','$stock','','$category','1')";
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