<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
<?php
include "../aplikasi/koneksi.php";
include  "kode_auto.php";
$query = "SELECT * FROM category ORDER BY vendor ASC";
$sql = mysql_query($query);
$r = mysql_fetch_array($sql);
$selected = "";
// if ($r[0]==1) {
// 	$kode = "kdauto('coba','AP')";
// } else {
// 	$kode = "";	
// }
?>
<form id="form1" name="form1" method="post" action="simpan_tamu.php">
<!-- <p>	
	<select name='category'>
		<option value="0">Select Category</option>
		<?php 
			// while ($data = mysql_fetch_array($sql)) {
			// 	echo "<option value=$data[0]>$data[1]</option>";
			// }
		?>
	</select>
</p> -->
<p>nomor tamu
<input name="id" type="text" id="id" value="<?php echo rand_string('2'); ?><?php echo kdauto('coba','IP') ?>" disabled="disabled" />
<input name="id" type="hidden" id="id" value="<?php echo rand_string('2'); ?><?php echo kdauto('coba','IP') ?>" />
</p>
<p>nama tamu
<input type="text" name="nama" id="nama" />
</p>
<p>
pesan
<input type="text" name="pesan" id="pesan" />
</p>
<p>
<input type="submit" name="button" id="button" value="Kirim" />
</p>
</form>
</body>
</html>