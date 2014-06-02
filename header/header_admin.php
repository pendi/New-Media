<!DOCTYPE html>
<html>
<head>
	<title>Anila Shop</title>
	<link rel="stylesheet" type="text/css" href="../css/global.css">
	<!-- <link rel="stylesheet" type="text/css" href="../css/naked.css"> -->
	<link rel="shortcut icon" href="../aplikasi/image/favicon/favicon_2.ico" type="image/x-icon" />
<script type="text/javascript" src="../js/jquery-1.7.1.min.js"></script>
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
	margin: 7px -27px;
	width: 23%;
	height: 28px;
}

.icon-search {
	width: 17px;
	height: 17px;
	margin: -4px 4px;
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
$query = "SELECT * from login WHERE id='$_SESSION[id_admin]'";
$que = mysql_query($query);
$data = mysql_fetch_array($que);

?>
<table width="70%" align="center" bgcolor="#3385FF" class="radius">
	<tr>
		<td colspan="2"><a href="../aplikasi/index.php" class="href"><font color="#fff" size="30">&nbsp;ANILA SHOP</font></a></td>
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
			<img class="padding" src="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/new_media/aplikasi/image/logo-icon.png' ?>" width="70%">
		</td>
		<td width="26%" class="align">Selling a New Laptop Under Warranty</td>
		<td width="35%" align="right">&nbsp;</td>
	</tr>
</table>
<table width="70%" align="center" bgcolor="#0052CC" class="radius" style="margin: 5px auto;">
	<tr>
		<td>
			<ul class="dropmenu">
				<li><a href="../admin/check.php">Dashboard</a></li>
				<li><a href="../admin/view_edit.php">Profile</a></li>
			</ul>
		</td>
	</tr>
</table>
<form action="../search/search_admin.php" method="post" onsubmit="return validasi(this)">
<table width="70%" align="center" bgcolor="#E6E6E6" class="radius-top">
	<tr>
		<td align="right">
			<input class="search" type="search" name="search" placeholder="Search Product">
			<img class="icon-search" src="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/new_media/aplikasi/image/search.png' ?>">
		</td>
	</tr>
	<!-- <tr>
		<td><center>
			<?php  
				// if(isset($_REQUEST['module'])) { $module = $_REQUEST['module']; } 
				// else { $module = ""; } 
				// 	if($module=='keranjang') {
				// 		include "keranjang_belanja.php";
				// 	}
				// 	else if($module=='selesai') {
				// 		include "selesai_belanja.php";
				// 	}
				// 	else if($module=='simpan') {
				// 		include "simpan_transaksi.php";
				// 	}
				// 	else if($module=='detail') {
				// 		include "detail.php";
				// 	}
				// 	else if($module=='hitung') {
				// 		include "hitung_produk.php";
				// 	}
				// 	else {
				// 		include "produk.php";
					// }
			?>
			</center>
		</td>
	</tr>
	<tr>
		<td>
			<?php //include "footer.php" ?>	
		</td>
	</tr> -->
</table>
</form>
</body>
</html>