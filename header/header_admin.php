<!DOCTYPE html>
<html>
<head>
	<title>TokoNadi.com</title>
	<link rel="stylesheet" type="text/css" href="../css/global.css">
	<!-- <link rel="stylesheet" type="text/css" href="../css/naked.css"> -->
	<!-- <link rel="shortcut icon" href="../image/favicon/favicon.ico" type="image/x-icon" /> -->
	<link rel="shortcut icon" href="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/online_shop/image/favicon/favicon.ico' ?>" type="image/x-icon" />
<script type="text/javascript" src="../js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="../js/highcharts.js"></script>
<script>
	function validasi(form) {
		if (form.search.value == ""){
			alert("Silahkan masukan kata kunci yang anda cari.");
			form.search.focus();
			return (false);
		}    
	}
</script>
<style type="text/css">
.search {
	margin: 7px 10px;
	width: 23%;
	height: 28px;
	border-radius: 30px;
	outline-style: none;
	padding-left: 7px;
}

.align {
	vertical-align: bottom;
	padding-bottom: 8px;
}

img.padding {
	padding-right: 4px;
}
</style>
</head>
<body bgcolor="#80B2FF">
<?php
if (!isset($_SESSION)) {
    session_start();
}
include "../aplikasi/koneksi.php";
include "../function/function.php";
$query = "SELECT * from login WHERE id='$_SESSION[id_admin]'";
$que = mysql_query($query);
$data = mysql_fetch_array($que);

?>
<div class="row-header radius">
	<table class="width">
		<tr>
			<td colspan="2"><a href="../aplikasi/index.php" class="href"><font color="#fff" size="30">&nbsp;TokoNadi.com</font></a></td>
			<td align="right" style="vertical-align: top;"><a href="../admin/view_edit.php" class="href"><font color="#fff">
				<?php echo ucfirst($data['first_name']); ?> <?php echo ucfirst($data['last_name']); ?></font></a> ||
				<?php 
					if (isset($_SESSION["id"])) {
						echo "<a href='../logout/logout.php' class='href'>Logout &nbsp;</a>";
					} else {
						echo "<a href='../login/login.php' class='href'>Login &nbsp;</a>";
					}
				?>
			</td>
		</tr>
		<tr>
			<td width="9%" align="right">
				<a href="../aplikasi/index.php"><img class="padding" src="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/online_shop/image/logo-icon.png' ?>" width="70%"></a>
			</td>
			<td width="26%" class="align">Menjual Laptop Baru dan Bergaransi</td>
			<td width="35%" align="right">&nbsp;</td>
		</tr>
	</table>
</div>
<div class="row-menu radius">
	<table class="width">
		<tr>
			<td>
				<ul class="dropmenu">
					<li><a href="../admin/check.php">Dashboard</a></li>
					<li><a href="../admin/view_edit.php">Profil</a></li>
					<li><a href="../admin/grafik.php">Grafik Penjualan</a></li>
				</ul>
			</td>
		</tr>
	</table>
</div>
<div class="row-isi radius-top">
	<form action="../search/search_admin.php" method="post" onsubmit="return validasi(this)">
		<table class="width">
			<tr>
				<td align="right">
					<input class="search" type="search" name="search" placeholder="Cari Produk">
				</td>
			</tr>
		</table>
	</form>
</div>
</body>
</html>