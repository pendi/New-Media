<?php 
include "../header/header.php";
include "../aplikasi/function.php";
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
			<td width="33%"><input type="text" name="id" maxlength="5" placeholder="Id Product"></td>
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
			<td colspan="3" align="center"><input type="submit" name="submit" value="Submit"> <input type="reset" name="reset" value="Reset"></td>
		</tr>
		<tr>
			<td colspan="3"><?php include "../footer/footer.php"; ?></td>
		</tr>
	</table>
</form>