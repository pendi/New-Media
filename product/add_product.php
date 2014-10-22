<?php 
session_start();
	if(!isset($_SESSION['id'])) {
	  	echo "<script>window.alert('Anda Harus Login Dulu');</script>";
		echo "<script>window.location = '../login/login.php';</script>";
	} else {
include "../header/header_admin.php";

$query = "SELECT * FROM category ORDER BY vendor ASC";
$sql = mysql_query($query);
?>
<form action="save_product.php" method="post" enctype="multipart/form-data" onsubmit="return validasi(this)">
	<div class="row-isi">
		<table class="width">
			<tr>
				<td colspan="3"><center><h2>TAMBAH PRODUK</h2></center></td>
			</tr>
			<tr>
				<td colspan="3">&nbsp;</td>
			</tr>
			<tr>
				<td width="20%"></td>
				<td width="12%">Kategori</td>
				<td width="33%">
					<select name='category' autofocus size="0">
						<option value="0">Pilih Kategori</option>
						<?php 
							while ($data = mysql_fetch_array($sql)) {
								echo "<option value=$data[0]>$data[1]</option>";
							}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td></td>
				<td>Vendor &nbsp;</td>
				<td><input type="text" class="input" name="name" placeholder="Vendor"></td>
			</tr>
			<tr>
				<td></td>
				<td>Jenis &nbsp;</td>
				<td><input type="text" class="input" name="type" placeholder="Jenis"></td>
			</tr>
			<tr>
				<td></td>
				<td>Harga &nbsp;</td>
				<td><input type="text" class="input" name="price" placeholder="Harga"></td>
			</tr>
			<tr>
				<td></td>
				<td style="vertical-align: top;">Deskrisi &nbsp;</td>
				<td><textarea name="description" rows="5" cols="20" placeholder="Deskrisi"></textarea></td>
			</tr>
			<tr>
				<td></td>
				<td>Stok &nbsp;</td>
				<td><input type="text" class="input" name="stock" placeholder="Stok"></td>
			</tr>
			<tr>
				<td></td>
				<td>Pilih Gambar &nbsp;</td>
				<td><input type="file" name="image"></td>
			</tr>
			<tr>
				<td colspan="3">&nbsp;</td>
			</tr>
			<tr>
				<td colspan="3" align="center">
					<input type="submit" name="submit" value="Simpan"> 
					<input type="reset" name="reset" value="Batal">
					<a href="view_product.php"><input type="button" name="button" value="Kembali"></a>
				</td>
			</tr>
			<tr>
				<td colspan="3"><?php include "../footer/footer.php"; ?></td>
			</tr>
		</table>		
	</div>
</form>
<?php } ?>
<script>
	function validasi(form) {
		if (form.category.value == 0){
			alert("Anda belum memilih Category Produk.");
			form.category.focus();
			return (false);
		}
		if (form.name.value == ""){
			alert("Anda belum mengisikan Nama Produk.");
			form.name.focus();
			return (false);
		}
		if (form.type.value == ""){
			alert("Anda belum mengisikan Type Produk.");
			form.type.focus();
			return (false);
		}
		if (form.price.value == ""){
			alert("Anda belum mengisikan Harga Produk.");
			form.price.focus();
			return (false);
		}
		if (form.description.value == ""){
			alert("Anda belum mengisikan Deskripsi Produk.");
			form.description.focus();
			return (false);
		}
		if (form.stock.value == ""){
			alert("Anda belum mengisikan Stok Produk.");
			form.stock.focus();
			return (false);
		}
		return (true);  
	}
</script>