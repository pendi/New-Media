<!DOCTYPE html>
<html>
<head>
	<title>naditech.com</title>
	<link rel="stylesheet" type="text/css" href="../css/font/stylesheet.css">
	<link rel="stylesheet" type="text/css" href="../css/global.css">
	<!-- <link rel="stylesheet" type="text/css" href="../css/naked.css"> -->
	<link rel="shortcut icon" href="../image/favicon/favicon.ico" type="image/x-icon" />
<script type="text/javascript" src="../js/jquery-1.7.1.min.js"></script>
<style type="text/css">
	.align {
		vertical-align: 10px;
		/*padding-bottom: 10px;*/
	}

	@media print{
		input[type=submit],
		input[type=reset],
		input[type=button] {
			display: none;
		}

		a.button.round.warning { display: none; }
	}
</style>

<?php  
session_start();
include "../aplikasi/koneksi.php";
include "../function/function.php";
if(!isset($_SESSION['transaksi'])){
    $idt = date("YmdHis");
    $_SESSION['transaksi'] = $idt;
}
$idt = $_SESSION['transaksi'];
// $query = mysql_query("SELECT id_session FROM orders_temp WHERE id_session = '$idt'");
// $numRow = mysql_num_rows($query);
// if ($numRow == 0) {
// 	echo "<script>window.alert('Keranjang Belanja Anda Masih Kosong');</script>";
// 	echo "<script>window.location = '../index.php';</script>";
// }

$id = $_GET['id_cus'];
$query = mysql_query("SELECT * FROM customer WHERE id_cus='$id'");
$data = mysql_fetch_array($query);
$queryOrd = mysql_query("SELECT * FROM orders WHERE id_cus='$id'");
$dataOrd = mysql_fetch_array($queryOrd);
?>
<table width="95%" align="center">
	<tr>
		<td width="10%" align="right">
			<a href="#"><img class="padding" src="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/online_shop/image/logo-icon.png' ?>" width="95%"></a>
		</td>
		<td width="85%">
			<a href="#" class="href headerName print">naditech.com</a><br />
			<span class="subHeaderName align">Menjual Laptop Baru dan Bergaransi</span>
		</td>
	</tr>
</table>
<table style="border-collapse: collapse;" width="95%" align="center" border="1">
	<tr>
		<td colspan="5" style="padding-bottom:25px;">
			<table>
				<tr>
					<td width="118px"><b>Nama Lengkap</b></td>
					<td width="10px">:</td>
					<td><?php echo $data['name']; ?></td>
				</tr>
				<tr>
					<td style="vertical-align:top;"><b>Alamat</b></td>
					<td style="vertical-align:top;">:</td>
					<td><?php echo $data['address']; ?></td>
				</tr>
				<tr>
					<td><b>Nomor Telepon</b></td>
					<td>:</td>
					<td><?php echo $data['phone_number']; ?></td>
				</tr>
				<tr>
					<td><b>Email</b></td>
					<td>:</td>
					<td><?php echo $data['email']; ?></td>
				</tr>
			</table>
		</td>
	</tr><br/><br/><br/>
	<tr>
		<th width="25px">No</th>
		<th width="305px">Barang</th>
		<th width="190px">Harga Satuan</th>
		<th width="95px">Jumlah</th>
		<th width="190px">Sub Total</th>
	</tr>
	<?php 
		$no = 1;
		$total = 0;
		$queryTrs = mysql_query("SELECT * FROM transaksi WHERE id_order='$dataOrd[id_order]'");
		while($dataTrs = mysql_fetch_array($queryTrs)){
			$queryPro = mysql_query("SELECT * FROM product WHERE id_product='$dataTrs[id_product]'");
			$dataPro = mysql_fetch_array($queryPro);
			$sub_total = $dataPro['price'] * $dataTrs['quantity'];
			$total += $sub_total;
	?>
	<tr style="height:50px;">
		<td align="center"><?php echo $no; ?></td>
		<td><?php echo $dataPro['name']; ?> <?php echo $dataPro['type'] ?></td>
		<td align="center">Rp. <?php echo price($dataPro['price']); ?></td>
		<td align="center"><?php echo $dataTrs['quantity']; ?></td>
		<td align="center">Rp. <?php echo price($sub_total); ?></td>
	</tr>
	<?php
		$no++;
	 	} 
	?>
	<tr style="height:50px;">
		<td colspan="4" align="right"><b style="margin-right: 3px;">Total Belanja</b></td>
		<td align="center"><b>Rp. <?php echo price($total); ?></b></td>
	</tr>
</table>
<div style="padding:10px 0 0 23px;">
	<input type="button" onclick="window.print();" value="Cetak Bukti Transaksi" class="button round">
	<a href="../index.php" class="button round warning">Kembali</a>
</div>