<?php
session_start();
	if(!isset($_SESSION['id'])) {
	  	echo "<script>window.alert('Anda Harus Login Dulu');</script>";
		echo "<script>window.location = '../login/login.php';</script>";
	} else {
include "../header/header_admin.php";
$query = mysql_query("SELECT * FROM product WHERE id_product = '$_GET[id_product]'");
$data = mysql_fetch_array($query);

$sql = mysql_query("SELECT * FROM category");

$queryCat = mysql_query("SELECT vendor FROM category WHERE id = '$data[category_id]'");
$category = mysql_fetch_array($queryCat);
?>
<form action="editing_process.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?php echo $data[0]; ?>" />
	<div class="row-isi">
		<table class="width">
			<tr>
				<td colspan="3" align="center"><h2>EDIT PRODUK</h2></td>
			</tr>
			<tr>
				<td width="20%"></td>
				<td width="12%">Id Produk &nbsp;</td>
				<td width="33%"><input type="text" class="input" value="<?php echo $data[0]; ?>" disabled></td>
			</tr>		
			<tr>
				<td></td>
				<td>Kategori &nbsp;</td>
				<td>
					<select name="category" size="0">
						<?php $selected = ""; ?>
			            <?php if($data['category']) $selected = "selected"; ?>
			            <option value="<?php echo $data['category_id'] ?>" <?php echo $selected; ?>><?php echo $category['vendor']; ?></option>
						<?php 
						while($r = mysql_fetch_array($sql))
						{
							echo "<option value=$r[0]>$r[1]</option>";
						}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td></td>
				<td>Nama &nbsp;</td>
				<td><input type="text" class="input" name="name" placeholder="Nama" value="<?php echo $data[1]; ?>"></td>
			</tr>
			<tr>
				<td></td>
				<td>Jenis &nbsp;</td>
				<td><input type="text" class="input" name="type" placeholder="Jenis" value="<?php echo $data[2]; ?>"></td>
			</tr>
			<tr>
				<td></td>
				<td>Harga &nbsp;</td>
				<td><input type="text" class="input" name="price" placeholder="Harga" value="<?php echo $data[3]; ?>"></td>
			</tr>
			<tr>
				<td></td>
				<td style="vertical-align: top;">Deskripsi &nbsp;</td>
				<td><textarea name="description" rows="5" cols="20" placeholder="Deskripsi"><?php echo $data[4]; ?></textarea></td>
			</tr>
			<tr>
				<td></td>
				<td>Stok &nbsp;</td>
				<td><input type="text" class="input" name="stock" placeholder="Stok" value="<?php echo $data[5]; ?>"></td>
			</tr>
			<tr>
				<td></td>
				<td>Image</td>
				<td>
					<?php if (!empty($data['image'])): ?>				
						<img src="<?php echo $data[6]; ?>" width="150px"><br/>
					<?php else : ?>
						<img src="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/online_shop/image/product/no-image.jpg' ?>" width="150px"><br/>
					<?php endif ?>
				</td>
			</tr>
			<tr>
				<td></td>
				<td>Ganti Gambar</td>
				<td><input type="file" name="image"></td>
			</tr>
			<tr>
				<td colspan="3">&nbsp;</td>
			</tr>
			<tr>
				<td colspan="3" align="center">
					<input type="submit" name="submit" class="button round" value="Simpan">
					<a href="view_product.php" class="button round error">Batal</a>
				</td>
			</tr>
			<tr>
				<td colspan="3">&nbsp;</td>
			</tr>
			<tr>
				<td colspan="3">
					<?php include "../footer/footer.php"; ?>
				</td>
			</tr>
		</table>		
	</div>
</form>
<?php } ?>