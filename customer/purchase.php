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
// $sql = mysql_query("select orders_temp.*, product.name, product.type, product.stock from orders_temp, product
// where orders_temp.id_session='$idtransaksi' and orders_temp.id_product=product.id_product");

// include "function.php";
?>
<script>
// $(function(){
//     // var qty = $(".qty").val();
// 	$(".qty").change(function(){
// 		var price = $(this).parent().parent().find("td input.price").val();
// 		var sub_total = $(this).parent().parent().find("td input.sub_total");
// 		var qty = $(this).val();
// 	    var grandtotal = price * qty;
// 		// console.log($(sub_total).val());
// 	    $(sub_total).val(grandtotal);

// 	});

// });
</script>
<form method="post" action="save_purchase.php">
	<div class="row">
		<table width="90%" align="center">
			<tr>
				<td><h2>Details of Spending :</h2></td>
			</tr>
		</table>
		<table border="1" width="90%" class="border" align="center">
			<tr bgcolor="#75D1FF">
				<th>No</th>
				<th>Product Name</th>
				<th>Unit Price</th>
				<th>Quantity</th>
				<th>Total</th>
			</tr>
			<?php  
				// $sub_total = 0;
				$no = 1;
				// while ($data = mysql_fetch_array($sql)) {
				// 	$id = $data['id_order'];
				// 	$total = $data["total"];
				$subs_total = 0;
				if (isset($_SESSION['items'])) {
				    foreach ($_SESSION['items'] as $key => $val){
				  //       $query = mysql_query("select orders_temp.*, product.name, product.type, product.stock from orders_temp, product
						// where orders_temp.id_session='$idtransaksi' and orders_temp.$key=product.$key");
						$query = mysql_query ("select * from product where id_product = '$key'");
				        $data = mysql_fetch_array($query);
				         
				        $sub_total = $data['price'] * $val;
				        $subs_total += $sub_total;
			?>
			<!-- <input type="hidden" name="id" value="<?php //echo $data[0]; ?>" /> -->
			<tr>
				<td align="center"><?php echo $no; ?></td>
				<td><?php echo $data['name']; ?>&nbsp;<?php echo $data['type']; ?></td>
				<td>Rp. <input readonly type="text" value="<?php echo $data['price']; ?>"></td>
				<!-- <td><input style="text-align: center;" size="1" name="quantity" type="text" class="qty" value="1"></td> -->


				<td align="center">
					<?php if ($val > 1): ?>
						<a class="href minus" href="cart.php?act=min&amp;id=<?php echo $key; ?>&amp;ref=purchase.php"></a>
					<?php else: ?>
						<a class="href minus disabled" href="cart.php?act=min&amp;id=<?php echo $key; ?>&amp;ref=purchase.php"></a>
					<?php endif ?>
					<input name="qty" readonly type="text" size="1" style="text-align:center" value="<?php echo $val; ?>"/>
					<?php if ($val < $data['stock']): ?>
						<a class="href plus" href="cart.php?act=plus&amp;id=<?php echo $key; ?>&amp;ref=purchase.php"></a>
					<?php else: ?>
						<a class="href plus disabled" href="cart.php?act=plus&amp;id=<?php echo $key; ?>&amp;ref=purchase.php"></a>
					<?php endif ?>
				</td>
				<td>
					Rp. <input style="text-align: right;" type="text" readonly value="<?php echo $sub_total; ?>">
					<a href="cart.php?act=del&amp;id=<?php echo $data[0]; ?>&amp;ref=purchase.php" style="vertical-align: -3px;">
					<!-- <a href="delete.php?id=<?php echo $data[0]; ?>" style="vertical-align: -3px;"> -->
						<img src="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/new_media/aplikasi/image/delete.png' ?>" width ="13px">
					</a>
				</td>
			</tr>
			<?php 
				$no++;
				mysql_free_result($query);
					}
				}
				// $sub_total = $sub_total + $data['total'];
				// }
			?>
			<tr>
				<td colspan="3">&nbsp;</td>
				<td><center><b>Sub Total</b></center></td>
				<td><b>Rp.</b> <input style="font-weight: bold; text-align: right;" type="text"  value="<?php echo $subs_total; ?>"></td>
			</tr>
			<tr>
				<td colspan="4">&nbsp;Unique Number</td>
				<td>Rp.	<span style="float: right; margin-right: 21px;">-62</span></td>
			</tr>
			<?php  
				$total = 0;
				// $total = $sub_total - 62;
			?>
			<tr>
				<td colspan="2" align="center"><a href="../aplikasi/index.php"><input type="button" value="Buy Again"></a></td>
				<td align="right" colspan="2"><b style="margin-right: 3px;">Order Total</b></td>
				<td><b>Rp.</b> <input style="font-weight: bold; text-align: right;" name="total" type="text" class="total" readonly value="<?php echo $total; ?>"></td>
			</tr>
			<tr>
				<td colspan="5" align="center">
					<input type="submit" value="Next">
					<a href="cart.php?act=clear&amp;ref=../aplikasi/index.php"><input type="button" name="button" value="Cancel"></a>
				</td>
			</tr>
		</table>
		<table width="100%">
			<tr>
				<td><?php include "../footer/footer.php" ?></td>
			</tr>
		</table>
	</div>
</form>