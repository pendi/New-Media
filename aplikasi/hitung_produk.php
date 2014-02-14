<?php
include "koneksi.php";
$kdbrg = $_GET["kdbrg"];
$sql = mysql_query("SELECT * FROM produk WHERE kdbrg=$kdbrg");
$data=mysql_fetch_array($sql);
?>
<form>
	<table border='1'>
		<tr>
			<th>Nama Produk</th>
			<th>Harga</th>
			<th>Jumlah Beli</th>
		</tr>
		<tr>
			<td><?php echo $data["nama"]; ?></td>
			<td><?php echo $data["harga"]; ?></td>
			<td><input type="text" name="jml" value="<?php echo $_GET['jml']; ?>"></td>
		</tr>
</table>
</form>