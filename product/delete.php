<?php
session_start();
	if(!isset($_SESSION['id'])) {
	  	echo "<script>window.alert('Anda Harus Login Dulu');</script>";
		echo "<script>window.location = '../login/login.php';</script>";
	} else {
include "../header/header_admin.php";
$que = mysql_query("SELECT * FROM product WHERE id_product='$_GET[id_product]'");
$data = mysql_fetch_array($que);
?>
<style type="text/css">
	.td{
		vertical-align: top;
	}
</style>
<form action="delete_process.php" method="post">
<input type="hidden" name="id" value="<?php echo $data[0]; ?>">
	<div class="row-isi">
		<center>			
			<table width="80%">
				<tr>
					<td colspan="4" align="center"><h2>HAPUS PRODUK</h2></td>
				</tr>
				<tr>
					<td width="10%"></td>
					<td width="12%">Id Produk &nbsp;</td>
					<td width="1%">:</td>
					<td width="43%"><?php echo $data[0]; ?></td>
				</tr>
				<tr>
					<td></td>
					<td>Nama &nbsp;</td>
					<td >:</td>
					<td><?php echo $data[1]; ?></td>
				</tr>
				<tr>
					<td></td>
					<td>Jenis &nbsp;</td>
					<td >:</td>
					<td><?php echo $data[2]; ?></td>
				</tr>
				<tr>
					<td></td>
					<td>Harga &nbsp;</td>
					<td >:</td>
					<td><?php echo $data[3]; ?></td>
				</tr>
				<tr>
					<td></td>
					<td class="td">Deskripsi &nbsp;</td>
					<td >:</td>
					<td><?php echo nl2br($data[4]); ?></td>
				</tr>
				<tr>
					<td></td>
					<td>Stok &nbsp;</td>
					<td >:</td>
					<td><?php echo $data[5]; ?></td>
				</tr>
				<tr>
					<td></td>
					<td>Gambar</td>
					<td></td>
					<td>
						<?php if (!empty($data['image'])): ?>				
							<img src="<?php echo $data[6]; ?>" width="150px"><br/>
						<?php else : ?>
							<img src="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/online_shop/aplikasi/image/no-image.jpg' ?>" width="150px"><br/>
						<?php endif ?>
					</td>
				</tr>
				<tr>
					<td colspan="4">&nbsp;</td>
				</tr>
				<tr>
					<td colspan="4" align="center">
						<input type="submit" name="submit" value="Hapus">
						<a href="view_product.php"><input type="button" class="back" name="button" value="Kembali"></a>
					</td>
				</tr>
			</table>		
		</center>
		<table class="width">
			<tr>
				<td colspan="4">
					<?php include "../footer/footer.php"; ?>
				</td>
			</tr>
		</table>
	</div>
</form>
<?php } ?>