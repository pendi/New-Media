<?php 
include "../aplikasi/koneksi.php";
include "../header/header.php";
$query=mysql_query("select * from product where id_product='$_GET[id_product]'");
$data=mysql_fetch_array($query);
?>
<form action="" method="post">
	<table width="70%" align="center" bgcolor="#E6E6E6">
		<tr>
			<td colspan="3" align="center"><h2>EDIT PRODUCT</h2></td>
		</tr>
		<tr>
			<td width="25%"></td>
			<td width="10%">Id Product &nbsp;</td>
			<td width="35%"><?php echo $data[0]; ?></td>
		</tr>
		<tr>
			<td width="25%"></td>
			<td width="10%">Name &nbsp;</td>
			<td width="35%"><input type="text" name="name" placeholder="Name" value="<?php echo $data[1]; ?>"></td>
		</tr>
		<tr>
			<td width="25%"></td>
			<td width="10%">Type &nbsp;</td>
			<td width="35%"><input type="text" name="type" placeholder="Type" value="<?php echo $data[2]; ?>"></td>
		</tr>
		<tr>
			<td width="25%"></td>
			<td width="10%">Price &nbsp;</td>
			<td width="35%"><input type="text" name="price" placeholder="Price" value="<?php echo $data[3]; ?>"></td>
		</tr>
		<tr>
			<td width="25%"></td>
			<td width="10%">Description &nbsp;</td>
			<td width="35%"><textarea name="description" rows="5" cols="20" placeholder="Description"><?php echo $data[4]; ?></textarea></td>
		</tr>
		<tr>
			<td width="25%"></td>
			<td width="10%">Stock &nbsp;</td>
			<td width="35%"><input type="text" name="stock" placeholder="Stock" value="<?php echo $data[5]; ?>"></td>
		</tr>
	</table>
</form>