<?php  
include "../aplikasi/koneksi.php";

session_start();
$sid = session_id();
$bank = $_POST['bank'];

$query = "SELECT * FROM orders_temp WHERE id_session='$sid'";
$que = mysql_query($query);
$numrow = mysql_num_rows($que);

if ($numrow > 0) {
	$query2 = "UPDATE orders_temp SET method='$bank' WHERE id_session='$sid'";
	$que2 = mysql_query($query2);
	header("Location:summary.php");
} else {
	echo "Gagal Update";
	header("Location:../aplikasi/index.php");
}
?>