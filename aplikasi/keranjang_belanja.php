<?php 
include "koneksi.php";
$sql = mysql_query("SELECT * FROM orders_temp, produk WHERE orders_temp.kdbrg = produk.kdbrg");
$ketemu = mysql_num_rows($sql);
if($ketemu < 1) {
	echo "<script>window.alert('Keranjang Belanjanya Masih Kosong');
  		  window.location=('header.php?module=tampil')</script>";
}
	echo "<form method=post action=aksi.php?module=keranjang&act=update>
			<center>
			<table border=2>
				<tr bgcolor='#6633FF'>
					<th>No</th>
					<th>Nama Produk</th>
					<th>Jumlah</th>
					<th>Harga Satuan</th>
					<th>Sub Total</th>
					<th>Hapus</th>
				</tr>";
			$no=1;
			while($r=mysql_fetch_array($sql)){
				$subtotal = $r["harga"] * $r["jumlah"];
				$total = $total + $subtotal;
				$harga = $r["harga"];
	echo "<tr bgcolor=#CCFF99>
			<td>$no</td>
			<input type=hidden name=id[$no] value=$r[id_orders_temp]>
			<td>$r[nama]</td>
			<td><select name='jml[$no]' value=$r[jumlah]'>";
	for ($j=1;$j <= $r["stok"];$j++) {
		if($j == $r["jumlah"]) {
			echo "<option selected>$j</option>";
		} else {
			echo "<option>$j</option>";
		}
	}	
	echo "</select></td>";
	echo "<td>Rp. $harga</td>
		  <td>Rp. $subtotal</td>
		  <td align=center><a href='aksi.php?module=keranjang&act=hapus&id=$r[id_orders_temp]'>HAPUS</td>
		</tr>";
	$no++;
}

echo "<tr>
		<td colspan=4 align=right><b>Total</b></td>
		<td colspan=2 align='right'>Rp. <b>$total</b></td>
	</tr>
	<tr>
		<td colspan=6>&nbsp;</td>
	</tr>
	<tr>
		<td colspan=3><a href=menu.php?module=tampil>BELI LAGI</a></td>
		<td colspan=3 align=right><a href=menu.php?module=selesai>SELESAI</a></td>
	</tr>
</table>
</center>
</form>";
?>