<?php
session_start();
	if(!isset($_SESSION['id'])) {
	  	echo "<script>window.alert('Anda Harus Login Dulu');</script>";
		echo "<script>window.location = '../login/login.php';</script>";
	} else {
include "../header/header_admin.php";
$query = mysql_query("SELECT * from product where id_product = '$_GET[id_product]'");
$data = mysql_fetch_array($query);

$sql = mysql_query("SELECT * FROM category");

$category = "";
if ($data['category_id'] == 1) {
	$category = "Acer";
} elseif($data['category_id'] == 2) {
	$category = "Apple";
} elseif($data['category_id'] == 3) {
	$category = "Asus";
} elseif($data['category_id'] == 4) {
	$category = "Dell";
} elseif($data['category_id'] == 5) {
	$category = "Hp";
} elseif($data['category_id'] == 6) {
	$category = "Lenovo";
} elseif($data['category_id'] == 7) {
	$category = "Samsung";
} elseif($data['category_id'] == 8) {
	$category = "Toshiba";
} else {
	$category = "Select Category";
}
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
			            <option value="<?php echo $data['category_id'] ?>" <?php echo $selected; ?>><?php echo $category; ?></option>
						<option value="0">Pilih Kategori</option>
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
						<img src="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/new_media/aplikasi/image/no-image.jpg' ?>" width="150px"><br/>
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
					<input type="submit" name="submit" value="Simpan">
					<a href="view_product.php"><input type="button" name="button" value="Kembali"></a>
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