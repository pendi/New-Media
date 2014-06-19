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
	margin: 7px -42px;
	width: 23%;
	height: 28px;
	border-radius: 30px;
}

.icon-search {
	width: 17px;
	height: 17px;
	margin: -4px 12px;
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
    @session_start();
}

include "../aplikasi/koneksi.php";
if(isset($_SESSION['id_admin'])) { 
	$id = $_SESSION['id_admin']; 
} else { 
	$id = ""; 
}

$sql = mysql_query("SELECT * FROM login WHERE id = '$id'");
$data = mysql_fetch_array($sql);
?>
<div class="row-header radius">
	<table class="width">
		<tr>
			<td colspan="2"><a href="../aplikasi/index.php" class="href"><font color="#fff" size="30">&nbsp;ANILA SHOP</font></a></td>
			<td align="right" style="vertical-align: top;">
				<?php if (isset($_SESSION["id"])): ?>
					<a href="../admin/view_edit.php" class="href"><font color="#fff">
					<?php echo ucfirst($data['first_name']); ?> <?php echo ucfirst($data['last_name']); ?></font></a> ||
					<a href='../logout/logout.php' class='href'>Logout &nbsp;</a>
				<?php else: ?>
					<a href='../login/login.php' class='href'>Login &nbsp;</a>				
				<?php endif ?>		
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
</div>
<div class="row-menu radius">
	<table class="width">
		<tr>
			<td>
				<ul class="dropmenu">
					<li><a href="../aplikasi/index.php">Home</a></li>
					<li><a href="../customer/product.php?id=1">Acer</a></li>
					<li><a href="../customer/product.php?id=2">Apple</a></li>
					<li><a href="../customer/product.php?id=3">Asus</a></li>
					<li><a href="../customer/product.php?id=4">Dell</a></li>
					<li><a href="../customer/product.php?id=5">Hp</a></li>
					<li><a href="../customer/product.php?id=6">Lenovo</a></li>
					<li><a href="../customer/product.php?id=7">Samsung</a></li>
					<li><a href="../customer/product.php?id=8">Toshiba</a></li>
				</ul>
			</td>
		</tr>
	</table>
</div>
<form action="../search/search.php" method="post" onsubmit="return validasi(this)">
<div class="row-isi radius-top">
	<table class="width">
		<tr>
			<td align="right">
				<input class="search" type="search" name="search" placeholder="Search Product">
				<img class="icon-search" src="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/new_media/aplikasi/image/search.png' ?>">
				<!-- <a href="../search/search.php" class="button" style="padding: 1px 10px 1px;">Search</a> -->
				<!-- <input type="submit" name="submit" value="search"> -->
			</td>
		</tr>
	</table>
</div>
</form>
</body>
</html>
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