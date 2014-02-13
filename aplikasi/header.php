<!DOCTYPE html>
<html>
<head>
	<title>Anila Shop</title>
	<link rel="stylesheet" type="text/css" href="../css/global.css">
	<link rel="shortcut icon" href="gambar/favicon/favicon_2.ico" />
<style type="text/css">
.search {
	margin: 7px 0;
}
</style>
</head>
<body bgcolor="#80B2FF">
<form action="search.php" method="post">
<?php 
	include "koneksi.php";
	$sql = "select location from image where id_image = 1";
	$query = mysql_query($sql);
	while ($data = mysql_fetch_array($query)) {
	$loc = $data['location'];
?>
<table width="65%" align="center" bgcolor="#3385FF">
	<tr>
		<td colspan="2"><font color="white" size="30">&nbsp;ANILA SHOP</font></td>
		<td align="right" style="vertical-align: top;">
			<a href="login.php" style="text-decoration: none;">
			<font color="white"> Login &nbsp;</font></a>
		</td>
	</tr>
	<tr>
		<td width="10%" align="center"><img src="<?php echo $loc; ?>" height="25%"></td>
		<td width="25%">Jual Laptop Baru Bergaransi</td>
		<td width="35%" align="right"><font size="6">PENDI SETIAWAN</font></td>
	</tr>
</table>
<?php } ?>
<table width="65%" align="center" bgcolor="#0052CC">
	<tr>
		<td>
			<ul class="dropmenu">
				<li><a href="#1">Acer</a></li>
				<li><a href="#2">Asus</a></li>
				<li><a href="#3">Apple</a></li>
				<li><a href="#4">Dell</a></li>
				<li><a href="#4">Hp</a></li>
				<li><a href="#4">Lenovo</a></li>
				<li><a href="#4">Samsung</a></li>
				<li><a href="#4">Toshiba</a></li>
			</ul>
		</td>
	</tr>
</table>
<table width="65%" align="center" bgcolor="#E6E6E6">
	<tr>
		<td align="right">
			<input class="search" required type="search" name="search" placeholder="search">
			<input type="submit" name="submit" value="search">
		</td>
	</tr>
	<tr>
		<td><center>
			<?php  
				if(isset($_REQUEST['module'])) { $module = $_REQUEST['module']; } 
				else { $module = ""; } 
					if($module=='keranjang') {
						include "keranjang_belanja.php";
					}
					else if($module=='selesai') {
						include "selesai_belanja.php";
					}
					else if($module=='simpan') {
						include "simpan_transaksi.php";
					}
					else if($module=='detail') {
						include "detail_produk.php";
					}
					else {
						include "produk.php";
					}
			?>
			</center>
		</td>
	</tr>
	<tr>
		<td>
			<?php include "footer.php" ?>	
		</td>
	</tr>
</table>
</form>
</body>
</html>