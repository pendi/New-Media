<?php
include "../header/header.php";
include "../aplikasi/koneksi.php";

$query = "SELECT * FROM product WHERE id_product = '$_GET[id_product]'";
$tampil = mysql_query($query);

?>
<script>
	function hitung() {
		var a = $(".a").val();
	    var b = $(".b").val();
	    c = a * b;
	    $(".c").val(c);
	}
</script>
<form method="post" action="save_purchase.php">
	<center><div class="row">
		<table width="70%">
			<tr>
				<td><h2>Details of Spending :</h2></td>
			</tr>
		</table>
		<table border="1" width="70%" class="border">
			<tr bgcolor="#75D1FF">
				<th>No</th>
				<th>Product Name</th>
				<th>Unit Price</th>
				<th>Quantity</th>
				<th>Total</th>
			</tr>
			<?php  

				$no = 1;
				while ($data = mysql_fetch_array($tampil)) {
			?>
			<input type="hidden" name="id" value="<?php echo $data[0]; ?>" />
			<tr>
				<td align="center"><?php echo $no; ?></td>
				<td><?php echo $data[1]; ?>&nbsp;<?php echo $data[2]; ?></td>
				<td>Rp. <input readonly type="text" class="a" value="<?php echo $data[3]; ?>"></td>
				<td>
					<select name="quantity" class="b" onclick="hitung();">
						<?php 
						for ($i=1; $i <= $data['stock']; $i++) { 
							echo "<option value='$i'>$i</option>";
						}
						?>
					</select>
				</td>
				<td>Rp. <input name="total" type="text" class="c" readonly value="<?php echo $data[3]; ?>">
				</td>
			</tr>
			<?php 
				$no++; 
				} 
			?>
			<tr>
				<td colspan="5" align="center">
					<input type="submit" value="Next">
					<a href="../aplikasi/index.php"><input type="button" value="Cancel"></a>
				</td>
			</tr>
		</table>
		<table width="100%">
			<tr>
				<td><?php include "../footer/footer.php" ?></td>
			</tr>
		</table>
	</div></center>
</form>