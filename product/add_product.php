<?php 
session_start();
	if(!isset($_SESSION['id'])) {
	  	echo "<script>window.alert('Anda Harus Login Dulu');</script>";
		echo "<script>window.location = '../login/login.php';</script>";
	} else {
include "../header/header_admin.php";
?>
<form action="save_product.php" method="post" enctype="multipart/form-data">
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
			<td width="33%"><input autofocus type="text" name="id" maxlength="5" placeholder="Id Product"></td>
		</tr>
		<tr>
			<td></td>
			<td>Name &nbsp;</td>
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