<?php
include "../header/header.php";
include "../aplikasi/koneksi.php";

$query = "SELECT * FROM product WHERE id_product = '$_GET[id_product]'";
$tampil = mysql_query($query);

?>
<script>
	function hitung() {
		var price = $(".price").val();
	    var qty = $(".qty").val();
	    sub_total = price * qty;
	    $(".sub_total").val(sub_total);
	    total = sub_total - 62;
	    $(".total").val(total);	    
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
				<td>Rp. <input readonly type="text" class="price" value="<?php echo $data[3]; ?>"></td>
				<td><center>
					<select name="quantity" class="qty" onclick="hitung();">
						<?php 
						for ($i=1; $i <= $data['stock']; $i++) { 
							echo "<option value='$i'>$i</option>";
						}
						?>
					</select>
				</center></td>
				<td>Rp. <input style="text-align: right;" type="text" class="sub_total" readonly value="<?php echo $data[3]; ?>"></td>
			</tr>
			<tr>
				<td colspan="3">&nbsp;</td>
				<td><center><b>Sub Total</b></center></td>
				<td><b>Rp.</b> <input style="font-weight: bold; text-align: right;" type="text" class="sub_total" readonly value="<?php echo $data[3]; ?>"></td>
			</tr>
			<tr>
				<td colspan="4">&nbsp;Unique Number</td>
				<td>Rp.	<span style="float: right; margin-right: 21px;">-62</span></td>
			</tr>
			<?php  
				$price = $data[3];
			?>
			<tr>
				<td colspan="2">&nbsp;</td>
				<td align="right" colspan="2"><b>Total Expenditure</b></td>
				<td><b>Rp.</b> <input style="font-weight: bold; text-align: right;" name="total" type="text" class="total" readonly value="<?php echo $price - 62; ?>"></td>
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