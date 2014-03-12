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

// echo "<script language=\"Javascript\">\n";
// if($id!="" && $name!="" && $type!="" && $price!="" && $description!="" && $stock!="")
// {		
	$query = "INSERT INTO product(id_product,name,type,price,description,stock,image) 
				VALUES('$id','$name','$type','$price','$description','$stock','$name_img')";
	mysql_query("$query");
	// echo "Data Berhasil Disimpan";
	echo "<script>window.alert('Data Berhasil Disimpan');</script>";
	// include "add_product.php";
	echo "<script>window.location = 'view_product.php';</script>";
	// echo "<h2>Data Berhasil Disimpan</h2>";
// }
// else
// {
// 	echo "window.alert('Data Tidak Boleh Kosong');";
// 	echo "window.location = 'add_product.php';";
// 	echo "<h2>Data Tidak Boleh Kosong</h2> <br/>";
// 	echo "<a href='add_product.php'>BACK</a>";	
// }
// echo "</script>";
?>