<?php
//koneksi ke MySQL
mysql_connect("localhost","root","password");
mysql_select_db("new_media");

$keterangan = $_POST['keterangan'];
$folder = "image";
$tmp_name = $_FILES["file_foto"]["tmp_name"];
$name = $folder."/".$_FILES["file_foto"]["name"];
// print_r($_FILES);
// exit();

//kode untuk upload ke folder gambar
move_uploaded_file($tmp_name, $name);

//masukkan datanya ke database
$input = mysql_query("INSERT INTO image VALUES(null,'$keterangan','$name')");

if($input){
    //jika berhasil kita redirect ke halaman untuk menampilkan foto
    // header("location: tampil.php");
  echo "berhasil<br/>";
  echo "<a href='upload.php'>Upload Foto Lagi";
}else{
    echo "gagal";
}
?>