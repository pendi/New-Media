<?php 
include "koneksi.php";

$tgl_sekarang = date("Ymd");
$jam_sekarang = date("H:i:s");
$module=$_GET["module"];
$act=$_GET["act"];

if ($module=='detail')
{
	include "detail_produk.php";
}
elseif ($module=='keranjang' AND $act=='tambah'){
	$sql = mysql_query("SELECT stok FROM produk WHERE kdbrg='$_GET[id]'");
	$r = mysql_fetch_array($sql);
  
  if ($r["stok"] == 0){
      echo "stok habis";
  }
  else{
	// check if the product is already
	// in cart table for this session
	$sql2 = mysql_query("SELECT kdbrg FROM orders_temp WHERE kdbrg='$_GET[id]'");
	$ketemu=mysql_num_rows($sql2);
	if ($ketemu==0){
		// put the product in cart table
		mysql_query("INSERT INTO orders_temp (kdbrg, jumlah, tgl_order_temp, jam_order_temp)
				VALUES ('$_GET[id]', 1, '$tgl_sekarang', '$jam_sekarang')");
	} else {
	
		// update product quantity in cart table
		mysql_query("UPDATE orders_temp SET jumlah = jumlah + 1
				WHERE kdbrg='$_GET[id]'");		
	}	
	deleteAbandonedCart();
	header('Location:header.php?module=keranjang');
  }				
}

?>