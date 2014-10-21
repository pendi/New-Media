<?php
session_start();
// if(!isset($_SESSION['transaksi'])){
//     $idt = date("YmdHis");
//     $_SESSION['transaksi'] = $idt;
// }
include "../header/header.php";

$idt = session_id();
?>
<form method="post" action="save_purchase.php">
	<div class="row-isi">
		<table width="95%" align="center">
			<tr>
				<td><h2>Rincian Pembelian :</h2></td>
			</tr>
		</table>
		<table border="1" class="border" width="95%" align="center">
			<tr bgcolor="#75D1FF">
				<th width="25px">No</th>
				<th width="305px">Nama Produk</th>
				<th width="190px">Harga Satuan</th>
				<th width="95px">Jumlah</th>
				<th width="190px">Sub Total</th>
			</tr>
			<?php
				$no = 1;
				$total = 0;
				// $val = 1;
				$query = mysql_query("SELECT * FROM orders_temp ot INNER JOIN product p ON ot.id_product=p.id_product WHERE id_session = '$idt'");
		        //$data = mysql_fetch_array($query);
				// $product = mysql_query("SELECT * FROM product WHERE id_product = '$data[1]'");
			?>
			<tr>
		        <?php while ($data = mysql_fetch_array($query)): ?>
				<input type="hidden" name="id_order[]" value="<?php echo $data['id_order']; ?>" />
				<input type="hidden" name="id[]" value="<?php echo $data['id_product']; ?>" />
				<td align="center"><?php echo $no; ?></td>
				<td style="padding-left:5px;"><?php echo $data['name']; ?>&nbsp;<?php echo $data['type']; ?></td>
				<td>Rp. <input readonly type="text" class="input" style="width:135px;" value="<?php echo price($data['price']); ?>"></td>
				<!-- <td><input style="text-align: center;" size="1" name="quantity" type="text" class="qty" value="1"></td> -->


				<?php  
					$sub_total = $data['price'] * $data['quantity'];
			        $total += $sub_total; 
				?>
				<td align="center">
					<?php if ($data['quantity'] > 1): ?>
						<a class="href minus" href="../aplikasi/aksi2.php?act=min&amp;id=<?php echo $data['id_product']; ?>&amp;qty=<?php echo $data['quantity'] ?>"></a>
					<?php else: ?>
						<a class="href minus disabled"></a>
					<?php endif ?>
					<input name="quantity[]" readonly type="text" class="input" size="1" style="text-align:center; width:38px; padding-left:0;" value="<?php echo $data['quantity']; ?>"/>
					<?php if ($data['quantity'] < $data['stock']): ?>
						<a class="href plus" href="../aplikasi/aksi2.php?act=plus&amp;id=<?php echo $data['id_product']; ?>&amp;qty=<?php echo $data['quantity'] ?>"></a>
					<?php else: ?>
						<a class="href plus disabled"></a>
					<?php endif ?>
				</td>
				<td>
					Rp. <input style="width:130px;" type="text" class="input" readonly value="<?php echo price($sub_total); ?>">

					<a href="../aplikasi/aksi2.php?act=del&amp;id=<?php echo $data['id_product']; ?>" style="vertical-align: -3px;">
						<img src="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/new_media/image/icon/delete.png' ?>" width ="13px">
					</a>
				</td>
			</tr>
			<?php 
				$no++;
				endwhile
			?>
			<tr>
				<td align="right" colspan="4"><b style="margin-right: 3px;">Total Belanja</b></td>
				<td><b>Rp.</b> <input style="font-weight: bold; width:130px;" name="total" type="text" class="input" readonly value="<?php echo price($total); ?>"></td>
			</tr>
			<tr>
				<td colspan="5" align="center">
					<a href="../aplikasi/index.php"><input type="button" value="Beli Lagi"></a>
					<!-- <a href="save_purchase.php?id=<?php //echo $data[0]; ?>&amp;qty=<?php //echo $val; ?>" class="href"> -->
						<input type="submit" value="Lanjutkan">
					<!-- </a> -->
					<!-- <input type="submit" value="Lanjutkan"> -->
					<a href="../aplikasi/aksi2.php?act=clear"><input type="button" name="button" value="Batal"></a>
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