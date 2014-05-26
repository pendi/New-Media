<?php  
include "../aplikasi/koneksi.php";

$id = $_POST['id'];
$nama = $_POST['nama'];
$pesan = $_POST['pesan'];

$sql = mysql_query("INSERT INTO coba(id_tamu,nama,pesan) 
			VALUES('$id','$nama','$pesan')")


?>
<script>window.alert('Data Berhasil Disimpan');</script>
<script>window.location = 'form_tamu.php';</script>