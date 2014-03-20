<!DOCTYPE html>
<html>
<head>
	<title>Anila Shop</title>
	<link rel="stylesheet" type="text/css" href="../css/global.css">
	<link rel="shortcut icon" href="../aplikasi/image/favicon/favicon_2.ico" type="image/x-icon" />
<style type="text/css">
.search {
	margin: 7px 0;
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
?>
<table width="70%" align="center" bgcolor="#3385FF" border="0">
	<tr>
		<td colspan="2"><font color="#fff" size="30">&nbsp;ANILA SHOP</font></td>
		<td align="right" style="vertical-align: top;">
			<a href="../login/login.php" class="href">Login &nbsp;</a>
		</td>
	</tr>
	<tr>
		<td width="9%" align="right">
			<img class="padding" src="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/new_media/aplikasi/image/logo-icon.png' ?>" width="70%">
		</td>
		<td width="26%" class="align">Selling a New Laptop Under Warranty</td>
		<td width="35%" align="right"><font size="6">PENDI SETIAWAN</font></td>
	</tr>
</table>
<table width="70%" align="center" bgcolor="#0052CC">
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
<form action="../search/search.php" method="post">
<table width="70%" align="center" bgcolor="#E6E6E6">
	<tr>
		<td align="right">
			<input class="search" type="search" name="search" placeholder="search Product">
			<input type="submit" name="submit" value="search">
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