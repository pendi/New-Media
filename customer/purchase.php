<?php
session_start();
if(!isset($_SESSION['transaksi'])){
    $idt = date("ymdHis");
    $_SESSION['transaksi'] = $idt;
}
include "../header/header.php";
include "../aplikasi/koneksi.php";

$idtransaksi = $_SESSION['transaksi'];

// $query = "SELECT * FROM product WHERE id_product = '$_GET[id_product]'";
// $tampil = mysql_query($query);
$sql = mysql_query("select orders_temp.*, product.name, product.type, product.stock from orders_temp, product
where orders_temp.id_session='$idtransaksi' and orders_temp.id_product=product.id_product");

?>
<script>
	function hitung(id) {
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
				$sub_total = 0;
				$no = 1;
				while ($data = mysql_fetch_array($sql)) {
					$id = $data['id_order'];
			?>
			<!-- <input type="hidden" name="id" value="<?php //echo $data[0]; ?>" /> -->
			<tr>
				<td align="center"><?php echo $no; ?></td>
				<td><?php echo $data['name']; ?>&nbsp;<?php echo $data['type']; ?></td>
				<td>Rp. <input readonly type="text" class="price" value="<?php echo $data['total']; ?>"></td>
				<td><center>
					<select name="quantity" class="qty" onclick="hitung(<?php echo $id; ?>)">
						<?php 
						for ($i=1; $i <= $data['stock']; $i++) { 
							echo "<option value='$i'>$i</option>";
						}
						?>
					</select>
				</center></td>
				<td>
					Rp. <input style="text-align: right;" type="text" class="sub_total" readonly value="<?php echo $data['total']; ?>">
					<a href="delete.php?id=<?php echo $data[0]; ?>" style="vertical-align: -3px;">
						<img src="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/new_media/aplikasi/image/delete.png' ?>" width = "13px">
					</a>
				</td>
			</tr>
			<?php 
				$no++;
				$sub_total = $sub_total + $data['total'];
				} 
			?>
			<tr>
				<td colspan="3">&nbsp;</td>
				<td><center><b>Sub Total</b></center></td>
				<td><b>Rp.</b> <input style="font-weight: bold; text-align: right;" type="text" readonly value="<?php echo $sub_total; ?>"></td>
			</tr>
			<tr>
				<td colspan="4">&nbsp;Unique Number</td>
				<td>Rp.	<span style="float: right; margin-right: 21px;">-62</span></td>
			</tr>
			<?php  
				$total = 0;
				$total = $sub_total - 62;
			?>
			<tr>
				<td colspan="2" align="center"><a href="../aplikasi/index.php"><input type="button" value="Buy Again"></a></td>
				<td align="right" colspan="2"><b style="margin-right: 3px;">Order Total</b></td>
				<td><b>Rp.</b> <input style="font-weight: bold; text-align: right;" name="total" type="text" class="total" readonly value="<?php echo $total; ?>"></td>
			</tr>
			<tr>
				<td colspan="5" align="center">
					<input type="submit" value="Next">
					<a href="delete_all.php"><input type="button" name="button" value="Cancel"></a>
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