<?php
session_start();
	if(!isset($_SESSION['id'])) {
	  	echo "<script>window.alert('Anda Harus Login Dulu');</script>";
		echo "<script>window.location = '../login/login.php';</script>";
	} else {
include "../header/header_admin.php";

$sql=mysql_query("SELECT * FROM product WHERE id_product='$_GET[id_product]'");
$data=mysql_fetch_array($sql);
?>
<style type="text/css">
table.padding tr > td {
	padding-left: 2%;
}

.top {
	vertical-align: top;
}
</style>
<div class="row-isi">
	<table class="padding width">
		<tr>
			<td colspan="3">
				<?php if (!empty($data['image'])): ?>				
					<img src="<?php echo $data['image']; ?>" width="20%"><br/>
				<?php else : ?>
					<img src="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/online_shop/image/product/no-image.jpg' ?>" width="20%"><br/>
				<?php endif ?>
			</td>
		</tr>
		<tr>
			<td width="10%">Produk</td>
			<td width="1%">:</td>
			<td width="57%"><?php echo $data['name'] ?></td>
		</tr>
		<tr>
			<td>Jenis</td>
			<td>:</td>
			<td><?php echo $data['type'] ?></td>
		</tr>
		<tr>
			<td>Harga</td>
			<td>:</td>
			<td>Rp. <?php echo price($data['price']); ?></td>
		</tr>
		<tr>
			<td>Stok Tersedia</td>
			<td>:</td>
			<td><?php echo $data['stock']; ?></td>
		</tr>
		<tr>
			<td class="top">Deskripsi</td>
			<td class="top">:</td>
			<td><?php echo nl2br($data['description']); ?></td>
		</tr>
		<tr>
			<td colspan="3">
				<a href="view_product.php"><input type="button" name="back" class="back" value="Kembali"></a>
			</td>
		</tr>
		<tr>
			<td colspan="3" style="padding: 0px;">
				<?php include "../footer/footer.php" ?>
			</td>
		</tr>
	</table>	
</div>
<?php } ?>