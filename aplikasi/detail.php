<?php  
include "koneksi.php";
include "../header/header.php";

$sql=mysql_query("select * from product where id_product='$_GET[id_product]'");
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
<table width="70%" bgcolor="E6E6E6" align="center" class="padding">
	<tr>
		<td colspan="2">
			<?php if (!empty($data['image'])): ?>				
				<img src="<?php echo $data['image']; ?>" width="100%"><br/>
			<?php else : ?>
				<img src="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/new_media/aplikasi/image/no-image.jpg' ?>" width="100%"><br/>
			<?php endif ?>			
		</td>
		<td style="vertical-align: bottom;">
			<a href="../customer/check.php?id_product=<?php echo $data[0]; ?>" class="href">
				<img title="Buy" src="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/new_media/aplikasi/image/buy.png' ?>" width="15%">
			</a> &nbsp;
			<a href="index.php">
				<img title="Back" src="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/new_media/aplikasi/image/back4.png' ?>" width="10%">
			</a>
		</td>
	</tr>
	<tr>
		<td width="12%">Produck</td>
		<td width="2%">:</td>
		<td width="51%"><?php echo $data['name'] ?></td>
	</tr>
	<tr>
		<td>Type</td>
		<td>:</td>
		<td><?php echo $data['type'] ?></td>
	</tr>
	<tr>
		<td>Price</td>
		<td>:</td>
		<td>Rp. <?php echo $data['price']; ?></td>
	</tr>
	<tr>
		<td>Available Stock</td>
		<td>:</td>
		<td>
			<?php
				if ($data['stock']==0) {
					echo "Stok Habis";
				} else {
					echo $data['stock'];
				}
			?>
		</td>
	</tr>
	<tr>
		<td class="top">Description</td>
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