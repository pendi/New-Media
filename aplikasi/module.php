<?php 
include "koneksi.php";

$module = $_GET["module"];

if ($module == 'detail') {
	header('Location:header.php?module=detail');
}
?>