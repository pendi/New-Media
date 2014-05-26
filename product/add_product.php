<?php 
session_start();
	if(!isset($_SESSION['id'])) {
	  	echo "<script>window.alert('Anda Harus Login Dulu');</script>";
		echo "<script>window.location = '../login/login.php';</script>";
	} else {
include "../header/header_admin.php";
include "../aplikasi/koneksi.php";
include "../function/function.php";

$query = "SELECT * FROM category ORDER BY vendor ASC";
$sql = mysql_query($query);
?>
<script>
	function validasi(form) {
		// if (form.id.value == ""){
		// 	alert("Anda belum mengisikan Id Produk.");
		// 	form.id.focus();
		// 	return (false);
		// }
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
<form action="save_product.php" method="post" enctype="multipart/form-data" onsubmit="return validasi(this)">
	<table width="70%" align="center" bgcolor="#E6E6E6">
		<tr>
			<td colspan="3"><center><h2>ADD PRODUCT</h2></center></td>
		</tr>
		<tr>
			<td colspan="3">&nbsp;</td>
		</tr>
		<tr>
			<td width="25%"></td>
			<td width="12%">Id Product &nbsp;</td>
			<td width="33%">
				<input type="text" name="id" value="<?php //echo rand_string('2'); ?><?php echo kdauto() ?>" disabled="disabled">
				<input type="hidden" name="id" value="<?php //echo rand_string('2'); ?><?php echo kdauto() ?>">
			</td>
		</tr>
		<tr>
			<td></td>
			<td>Category</td>
			<td>
				<select name='category' autofocus>
					<option value="0">Select Category</option>
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
			<td><input type="text" name="name" placeholder="Name"></td>
		</tr>
		<tr>
			<td></td>
			<td>Type &nbsp;</td>
			<td><input type="text" name="type" placeholder="Type"></td>
		</tr>
		<tr>
			<td></td>
			<td>Price &nbsp;</td>
			<td><input type="text" name="price" placeholder="Price"></td>
		</tr>
		<tr>
			<td></td>
			<td>Description &nbsp;</td>
			<td><textarea name="description" rows="5" cols="20" placeholder="Description"></textarea></td>
		</tr>
		<tr>
			<td></td>
			<td>Stock &nbsp;</td>
			<td><input type="text" name="stock" placeholder="Stock"></td>
		</tr>
		<tr>
			<td></td>
			<td>Choose An Image &nbsp;</td>
			<td><input type="file" name="image"></td>
		</tr>
		<tr>
			<td colspan="3">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="3" align="center">
				<input type="submit" name="submit" value="Submit"> <input type="reset" name="reset" value="Reset">
				<a href="view_product.php"><input type="button" name="button" value="Back"></a>
			</td>
		</tr>
		<tr>
			<td colspan="3"><?php include "../footer/footer.php"; ?></td>
		</tr>
	</table>
</form>
<?php } ?>