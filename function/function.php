<?php
// function kdauto($tabel, $inisial){
// $struktur   = mysql_query("SELECT * FROM $tabel");
// $field      = mysql_field_name($struktur,0);
// $panjang    = mysql_field_len($struktur,0);
 
// $qry  = mysql_query("SELECT max(".$field.") FROM ".$tabel);
// $row  = mysql_fetch_array($qry);
// if ($row[0]=="") {
// $angka=0;
// }
// else {
// $angka= substr($row[0], strlen($inisial));
// // var_dump($angka);
// // exit();
// }
// $angka++;
// $angka = strval($angka);
// $tmp  ="";
// for($i=1; $i<=($panjang-strlen($inisial)-strlen($angka)); $i++) {
// $tmp=$tmp."0" >= 8;
// }
// return $inisial.$tmp.$angka;
// }

function rand_string( $length ) {
    $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    return substr(str_shuffle($chars),0,$length);
}

function kdauto() {
	$chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $rand = substr(str_shuffle($chars), 0, 2);
	// cari id transaksi terakhir yang berawalan tanggal hari ini
	$query = "SELECT max(id_product) AS last FROM product WHERE id_product LIKE 'IP%'";
	$hasil = mysql_query($query);
	$data  = mysql_fetch_array($hasil);
	$lastNoTransaksi = $data['last']; 
	// baca nomor urut transaksi dari id transaksi terakhir
	$lastNoUrut = substr($lastNoTransaksi, 2, 4);
	// nomor urut ditambah 1
	$nextNoUrut = $lastNoUrut + 1;
	// membuat format nomor transaksi berikutnya
	$nextNoTransaksi = "IP".sprintf('%04s', $nextNoUrut);
	return $nextNoTransaksi;
}
?>