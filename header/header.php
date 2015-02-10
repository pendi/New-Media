<!DOCTYPE html>
<html>
<head>
	<title>Nadi Shop</title>
	<link rel="stylesheet" type="text/css" href="../css/global.css">
	<!-- <link rel="stylesheet" type="text/css" href="../css/naked.css"> -->
	<!-- <link rel="shortcut icon" href="../image/favicon/favicon.ico" type="image/x-icon" /> -->
	<link rel="shortcut icon" href="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/new_media/image/favicon/favicon.ico' ?>" type="image/x-icon" />
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
if(isset($_SESSION['id_admin'])) { 
	$id = $_SESSION['id_admin']; 
} else { 
	$id = ""; 
}

if(!isset($_SESSION['transaksi'])){
    $idt = date("YmdHis");
    $_SESSION['transaksi'] = $idt;
}
$idt = $_SESSION['transaksi'];

$sql = mysql_query("SELECT * FROM login WHERE id = '$id'");
$data = mysql_fetch_array($sql);

$sqlCart = mysql_query("SELECT id_session FROM orders_temp WHERE id_session = '$idt'");
$numCart = mysql_num_rows($sqlCart);
if ($numCart > 0) {
	$totalCart = $numCart;
} else {
	$totalCart = 0;
}
?>
<div class="row-header radius">
	<table class="width">
		<tr>
			<td colspan="2"><a href="../aplikasi/index.php" class="href"><font color="#fff" size="30">&nbsp;NADI SHOP</font></a></td>
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
				<a href="../aplikasi/index.php" class="href"><img class="padding" src="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/new_media/image/logo-icon.png' ?>" width="70%"></a>
			</td>
			<td width="26%" class="align">Menjual Laptop Baru dan Bergaransi</td>
			<td width="35%" align="right">&nbsp;</td>
		</tr>
	</table>
</div>
<div class="row-menu radius">
	<table class="width">
		<tr>
			<td width="93%">
				<ul class="dropmenu">
					<li><a href="../aplikasi/index.php">Beranda</a></li>
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
			<td width="7%">
				<a href="../customer/check.php?act=cart" class="href">
					<img class="padding" src="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/new_media/image/icon/cart.png' ?>" width="50%"> 
					<span style="vertical-align:4px;font-size:23px;color:#FFF;"><?php echo $totalCart; ?></span>
				</a>
			</td>
		</tr>
	</table>
</div>
<form action="../search/search.php" method="post" onsubmit="return validasi(this)">
<div class="row-isi radius-top">
	<table class="width">
		<tr>
			<td align="right">
				<input class="search" type="search" name="search" placeholder="Cari Produk">
			</td>
		</tr>
	</table>
</div>
</form>
</body>
</html>