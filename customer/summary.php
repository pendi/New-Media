<?php  
session_start();
include "../header/header.php";
if(!isset($_SESSION['transaksi'])){
    $idt = date("YmdHis");
    $_SESSION['transaksi'] = $idt;
}
$idt = $_SESSION['transaksi'];
$query = mysql_query("SELECT id_session FROM orders_temp WHERE id_session = '$idt'");
$numRow = mysql_num_rows($query);
if ($numRow == 0) {
	echo "<script>window.alert('Keranjang Belanja Anda Masih Kosong');</script>";
	echo "<script>window.location = '../index.php';</script>";
}

$id = $_GET['id'];
$query = mysql_query("SELECT * FROM customer WHERE id_cus='$id'");
$data = mysql_fetch_array($query);
$queryOrd = mysql_query("SELECT * FROM orders WHERE id_cus='$id'");
$dataOrd = mysql_fetch_array($queryOrd);
?>
<style type="text/css">
	.info{
		border: 2px dashed;
		height: 70px;
		padding-top: 18px;
		padding-left: 7px;
	}
</style>
<div class="row-isi">
	<table width="95%" align="center">
		<tr>
			<td style="padding-top:70px; font-size:22px;">
				<div class="info">
					Terima kasih telah berbelanja di <font color="#0052CC" class="nameTitle">naditech.com</font>. <b>Periksa kembali data dan belanjaan anda</b>. 
					Klik "Benar" jika data dan belanjaan anda sudah sesuai.
				</div>
			</td>
		</tr>
	</table>
	<table class="border" width="95%" align="center" border="1" style="margin-top:-40px">
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
		<a href="check.php?act=print&amp;id_cus=<?php echo $id; ?>" class="button round">Benar</a>
		<a href="data_customer.php?id_cus=<?php echo $id; ?>" class="button round warning">Kembali</a>
	</div>
	<table class="width">
		<?php include "../footer/footer.php"; ?>
	</table>
</div>