<?php
session_start();
// if(!isset($_SESSION['transaksi'])){
//     $idt = date("ymdHis");
//     $_SESSION['transaksi'] = $idt;
// }
include "../header/header.php";

$idtransaksi = session_id();
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
	<div class="row-isi">
		<table width="95%" align="center">
			<tr>
				<td><h2>Rincian Pembelian :</h2></td>
			</tr>
		</table>
		<table border="1" class="border" width="95%" align="center">
			<tr bgcolor="#75D1FF">
				<th>No</th>
				<th>Nama Produk</th>
				<th>Harga Per Unit</th>
				<th width="95px">Jumlah</th>
				<th>Sub Total</th>
			</tr>
			<?php
				$no = 1;
				$subs_total = 0;
				if (isset($_SESSION['items'])) {
				    foreach ($_SESSION['items'] as $key => $val){
						$query = mysql_query ("select * from product where id_product = '$key'");
				        $data = mysql_fetch_array($query);
				         
				        $sub_total = $data['price'] * $val;
				        $subs_total += $sub_total;
			?>
			<!-- <input type="hidden" name="id" value="<?php //echo $data[0]; ?>" /> -->
			<tr>
				<td align="center"><?php echo $no; ?></td>
				<td><?php echo $data['name']; ?>&nbsp;<?php echo $data['type']; ?></td>
				<td>Rp. <input readonly type="text" class="input" style="width:135px;" value="<?php echo price($data['price']); ?>"></td>
				<!-- <td><input style="text-align: center;" size="1" name="quantity" type="text" class="qty" value="1"></td> -->


				<td align="center">
					<?php if ($val > 1): ?>
						<a class="href minus" href="cart.php?act=min&amp;id=<?php echo $key; ?>&amp;ref=purchase.php"></a>
					<?php else: ?>
						<a class="href minus disabled"></a>
					<?php endif ?>
					<input name="qty" readonly type="text" class="input" size="1" style="text-align:center; width:38px; padding-left:0;" value="<?php echo $val; ?>"/>
					<?php if ($val < $data['stock']): ?>
						<a class="href plus" href="cart.php?act=plus&amp;id=<?php echo $key; ?>&amp;ref=purchase.php"></a>
					<?php else: ?>
						<a class="href plus disabled"></a>
					<?php endif ?>
				</td>
				<td>
					Rp. <input style="width:130px;" type="text" class="input" readonly value="<?php echo price($sub_total); ?>">

					<a href="cart.php?act=del&amp;id=<?php echo $data[0]; ?>&amp;ref=purchase.php" style="vertical-align: -3px;">
					<!-- <a href="delete.php?id=<?php echo $data[0]; ?>" style="vertical-align: -3px;"> -->
						<img src="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/new_media/aplikasi/image/delete.png' ?>" width ="13px">
					</a>
				</td>
			</tr>
			<?php 
				$no++;
					}
				}
			?>
			<tr>
				<td align="right" colspan="4"><b style="margin-right: 3px;">Total Belanja</b></td>
				<td><b>Rp.</b> <input style="font-weight: bold; width:130px;" name="total" type="text" class="input" readonly value="<?php echo price($subs_total); ?>"></td>
			</tr>
			<tr>
				<td colspan="5" align="center">
					<a href="../aplikasi/index.php"><input type="button" value="Beli Lagi"></a>
					<?php //echo "<pre>"; print_r($val); exit(); ?>
					<a href="save_purchase.php?id=<?php echo $data[0]; ?>&amp;qty=<?php echo $val; ?>" class="href">
						<input type="button" value="Lanjutkan">
					</a>
					<!-- <input type="submit" value="Lanjutkan"> -->
					<a href="cart.php?act=clear&amp;ref=../aplikasi/index.php"><input type="button" name="button" value="Batal"></a>
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