<?php  
include "../header/header.php";

echo "<pre>";
$id = $_GET['id'];
$selectOrd = mysql_query("SELECT id_product FROM orders WHERE id_cus='$id' ");
while($dataOrd = mysql_fetch_array($selectOrd)) {
	$dataExp = explode(',', $dataOrd['id_product']);
			print_r($dataExp);
			exit();	
	foreach ($dataExp as $key => $value) {
		$selectPro = mysql_query("SELECT * FROM product WHERE id_product='$value' ");
		while($test = mysql_fetch_array($selectPro)){
		}
	}
	for ($i=0; $i<count($dataExp); $i++) {
		//echo "$dataExp[$i]<br>";
	}
	
}



$query = mysql_query("SELECT * FROM customer WHERE id_cus = '$id'");
$data = mysql_fetch_array($query);
?>
<div class="row-isi">
	<table class="border" width="95%" align="center" border="1">
		<tr>
			<td colspan="5">
				<table>
					<tr>
						<td width="118px"><b>Nama Lengkap</b></td>
						<td width="10px">:</td>
						<td><?php echo $data['name']; ?></td>
					</tr>
					<tr>
						<td><b>Alamat</b></td>
						<td>:</td>
						<td><?php echo $data['address']; ?></td>
					</tr>
					<tr>
						<td><b>Nomor Telepon</b></td>
						<td>:</td>
						<td><?php echo $data['phone_number']; ?></td>
					</tr>
					<tr>
						<td><b>Email</b></td>
						<td>:</td>
						<td><?php echo $data['email']; ?></td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<th width="25px">No</th>
			<th width="305px">Barang</th>
			<th width="190px">Harga Satuan</th>
			<th width="95px">Jumlah</th>
			<th width="190px">Sub Total</th>
		</tr>
		<tr>
			<td></td>
			<?php while($test = mysql_fetch_array($selectPro)): ?>
			<td><?php echo $test['name']; ?></td>
			<?php endwhile ?>
		</tr>
	</table>
	<?php include "../footer/footer.php"; ?>
</div>