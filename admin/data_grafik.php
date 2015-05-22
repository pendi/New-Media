<?php
include "../aplikasi/koneksi.php";
session_start();
$result = mysql_query("SELECT vendor, sale FROM category");

$rows = array();
while($r = mysql_fetch_array($result)) {
	$row[0] = $r[0];
	$row[1] = $r[1];
	array_push($rows,$row);
}

// var_dump(json_encode($rows, JSON_NUMERIC_CHECK));exit();

print json_encode($rows, JSON_NUMERIC_CHECK);

mysql_close($con);
?> 
