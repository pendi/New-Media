<?php 
include "../aplikasi/koneksi.php";
include "../header/header.php";
$query=mysql_query("select * from product where id_product='$_GET[id_product]'");
$data=mysql_fetch_array($query);
?>
<form action="editing_process.php" method="post">
<input type="hidden" name="id" value="<?php echo $data[0]; ?>" />
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
			<td></td>
			<td>Name &nbsp;</td>
			<td><input type="text" name="name" placeholder="Name" value="<?php echo $data[1]; ?>"></td>
		</tr>
		<tr>
			<td></td>
			<td>Type &nbsp;</td>
			<td><input type="text" name="type" placeholder="Type" value="<?php echo $data[2]; ?>"></td>
		</tr>
		<tr>
			<td></td>
			<td>Price &nbsp;</td>
			<td><input type="text" name="price" placeholder="Price" value="<?php echo $data[3]; ?>"></td>
		</tr>
		<tr>
			<td></td>
			<td>Description &nbsp;</td>
			<td><textarea name="description" rows="5" cols="20" placeholder="Description"><?php echo $data[4]; ?></textarea></td>
		</tr>
		<tr>
			<td></td>
			<td>Stock &nbsp;</td>
			<td><input type="text" name="stock" placeholder="Stock" value="<?php echo $data[5]; ?>"></td>
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
			<td>Change Image</td>
			<td><input type="file" name="image"></td>
		</tr>
		<tr>
			<td colspan="3">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="3" align="center">
				<input type="submit" name="submit" value="Submit">
				<a href="view_product.php"><input type="button" name="button" value="Back"></a>
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
</form>