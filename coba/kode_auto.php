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
// $tmp=$tmp."00";
// }
// return $inisial.$tmp.$angka;
// }

// function rand_string( $length ) {
//     $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
//     return substr(str_shuffle($chars),0,$length);
// }

// echo rand_string(4);

function getLastTrans() { 
	$querycount="SELECT MAX(ID) AS LastID FROM tb_trans"; 
	$result=mysql_query($querycount) or die(mysql_error()); 
	$row=mysql_fetch_array($result, MYSQL_ASSOC); 
	return $row['LastID']; 
}

function FormatNoTrans($num) { 
	$num=$num+1; 
	switch (strlen($num)) {     
		case 1 : $NoTrans = "0000".$num; break;     
		case 2 : $NoTrans = "000".$num; break;     
		case 3 : $NoTrans = "00".$num; break;     
		case 4 : $NoTrans = "0".$num; break;     
		default: $NoTrans = $num;        
	}           
	return $NoTrans; 
}
?>