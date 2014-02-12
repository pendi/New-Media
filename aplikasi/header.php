<!DOCTYPE html>
<html>
<head>
	<title>Anila Shop</title>
	<link rel="stylesheet" type="text/css" href="../css/global.css">
	<link rel="shortcut icon" href="gambar/favicon_1.ico" />
<style type="text/css">
.search {
	margin: 7px 0;
}
</style>
</head>
<body bgcolor="#80B2FF">
<form action="search.php" method="post">
<table width="65%" align="center" bgcolor="#3385FF">
	<tr>
		<td colspan="2"><font color="white" size="30">&nbsp;ANILA SHOP</font></td>
		<td align="right" style="vertical-align: top;">
			<a href="login.php" style="text-decoration: none;">
			<font color="white"> Login &nbsp;</font></a>
		</td>
	</tr>
	<tr>
		<td width="10%" align="center"><img src="http://localhost/new_media/aplikasi/gambar/huruf-a.png" height="30%"></td>
		<td width="25%">Jual Laptop Baru Bergaransi</td>
		<td width="35%" align="right"><font size="6">PENDI SETIAWAN</font></td>
	</tr>
</table>
<table width="65%" align="center" bgcolor="#0052CC">
	<tr>
		<td>
			<ul class="dropmenu">
				<li><a href="#1">Acer</a>
					<!-- <ul>
						<li><a href="#11">E1-421-11202G32Mn</a></li>
						<li><a href="#12">E1-421-E302G32Mn</a></li>
						<li><a href="#12">E1-422-12502G50Mn</a></li>
						<li><a href="#12">E1-422-65202G50Mn</a></li>
						<li><a href="#12">E1-431-10002G32Mn</a></li>
						<li><a href="#12">E1-431-B832G32Mn</a></li>
					</ul> -->
				</li>
				<li><a href="#2">Asus</a>
					<!-- <ul>
						<li><a href="#21">1225B</a></li>
						<li><a href="#22">1225C</a></li>
						<li><a href="#23">A43E-VX1070D</a></li>
						<li><a href="#24">A43E-VX1071D</a></li>
					</ul> -->
				</li>
				<li><a href="#3">Apple</a>
					<!-- <ul>
						<li><a href="#31">Sub Menu 1</a></li>
						<li><a href="#32">Sub Menu 2</a></li>
						<li><a href="#33">Sub Menu 3</a></li>
					</ul> -->
				</li>
				<li><a href="#4">Dell</a>
					<!-- <ul>
						<li><a href="#41">Sub Menu 1</a></li>
						<li><a href="#42">Sub Menu 2</a></li>
						<li><a href="#43">Sub Menu 3</a></li>
					</ul> -->
				</li>
				<li><a href="#4">Hp</a>
					<!-- <ul>
						<li><a href="#41">Sub Menu 1</a></li>
						<li><a href="#42">Sub Menu 2</a></li>
						<li><a href="#43">Sub Menu 3</a></li>
					</ul> -->
				</li>
				<li><a href="#4">Lenovo</a>
					<!-- <ul>
						<li><a href="#41">Sub Menu 1</a></li>
						<li><a href="#42">Sub Menu 2</a></li>
						<li><a href="#43">Sub Menu 3</a></li>
					</ul> -->
				</li>
				<li><a href="#4">Samsung</a>
					<!-- <ul>
						<li><a href="#41">Sub Menu 1</a></li>
						<li><a href="#42">Sub Menu 2</a></li>
						<li><a href="#43">Sub Menu 3</a></li>
					</ul> -->
				</li>
				<li><a href="#4">Toshiba</a>
					<!-- <ul>
						<li><a href="#41">Sub Menu 1</a></li>
						<li><a href="#42">Sub Menu 2</a></li>
						<li><a href="#43">Sub Menu 3</a></li>
					</ul> -->
				</li>
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
</table>
</form>
</body>
</html>