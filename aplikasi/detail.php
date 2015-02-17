<?php
include "../header/header.php";

$sql=mysql_query("SELECT * FROM product WHERE id_product='$_GET[id_product]'");
$data=mysql_fetch_array($sql);
$price = $data['price'];
$stock = $data['stock'];
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
	<table class="width padding">
		<tr>
			<td colspan="2">
				<?php if (!empty($data['image'])): ?>				
					<img src="<?php echo $data['image']; ?>" width="100%"><br/>
				<?php else : ?>
					<img src="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/online_shop/image/product/no-image.jpg' ?>" width="100%"><br/>
				<?php endif ?>			
			</td>				
			<td style="vertical-align: bottom;">
				<?php if ($stock == 0): ?>
					<a class="stock" style="font-size: x-large; color: #F00;">STOK HABIS</a>			
				<?php endif ?>
				<a style="font-size: x-large; color: #00008B;">Rp. <?php echo price($price); ?></a> &nbsp;
				<?php if ($stock == 0): ?>
					<a></a>
				<?php else: ?>
					<a href="aksi.php?act=add&amp;id=<?php echo $data[0]; ?>" id="buy" class="button round-group">BELI</a>
				<?php endif ?>
				<a href="index.php" id="alert" class="button alert round-group-right">KEMBALI</a>
			</td>
		</tr>
		<tr>
			<td width="12%">Produk</td>
			<td width="2%">:</td>
			<td width="51%"><?php echo $data['name'] ?></td>
		</tr>
		<tr>
			<td>Jenis</td>
			<td>:</td>
			<td><?php echo $data['type'] ?></td>
		</tr>
		<tr>
			<td>Stok Tersedia</td>
			<td>:</td>
			<td>
				<?php
					if ($stock==0) {
						echo "-";
					} else {
						echo $stock;
					}
				?>
			</td>
		</tr>
		<tr>
			<td class="top">Deskripsi</td>
			<td class="top">:</td>
			<td><?php echo nl2br($data['description']); ?></td>
		</tr>
		<tr>
			<td colspan="3">
			</td>
		</tr>
		<tr>
			<td colspan="3" style="padding: 0px;">
				<?php include "../footer/footer.php" ?>
			</td>
		</tr>
	</table>
</div>