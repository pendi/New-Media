<?php  
session_start();
include "../header/header.php";
if(!isset($_SESSION['transaksi'])){
    $idt = date("YmdHis");
    $_SESSION['transaksi'] = $idt;
}
$idt = $_SESSION['transaksi'];
$query = mysql_query("SELECT id_session FROM orders_temp WHERE id_session = '$idt'");
$numRow = mysql_num_rows($query);
if ($numRow == 0) {
	echo "<script>window.alert('Keranjang Belanja Anda Masih Kosong');</script>";
	echo "<script>window.location = '../index.php';</script>";
}

if(isset($_GET['id_cus'])) { 
	$id_cus = $_GET['id_cus']; 
} else { 
	$id_cus = ""; 
}
$selectCus = mysql_query("SELECT * FROM customer WHERE id_cus = '$id_cus'");
$dataCus = mysql_fetch_array($selectCus);
?>
<style type="text/css">
	.top {
		vertical-align: top;
	}
</style>
<form action="save_customer.php" method="post" onsubmit="return validasi(this)">
	<input type="hidden" name="id_order" value="<?php echo $_GET['id_order']; ?>">
	<input type="hidden" name="id_cus" value="<?php echo $dataCus['id_cus']; ?>">
	<div class="row-isi">
		<table width="70%" align="center">
			<tr>
				<td><h2>Data Pembeli :</h2></td>
			</tr>
		</table>
		<table width="70%" align="center">
			<tr>
				<td width="20%"><b>Nama Lengkap</b></td>
				<td><input autofocus type="text" class="input" maxlength="50" name="name" placeholder="Nama Lengkap" value="<?php echo $dataCus['name'] ?>"></td>
			</tr>
			<tr>
				<td class="top"><b>Alamat</b></td>
				<td><textarea cols="25" rows="5" name="address" placeholder="Alamat"><?php echo $dataCus['address'] ?></textarea></td>
			</tr>
			<tr>
				<td><b>Nomor Telepon</b></td>
				<td><input type="text" class="input" name="phone" placeholder="Nomor Telepon" value="<?php echo $dataCus['phone_number'] ?>"></td>
			</tr>
			<tr>
				<td><b>Email</b></td>
				<td><input type="text" class="input" name="email" placeholder="Email" value="<?php echo $dataCus['email'] ?>"></td>
			</tr>
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
			<tr>
				<td colspan="2">
					<input type="submit" value="Simpan"> 
					<a href="check.php?act=clear"><input type="button" value="Batal"></a> 
					<a href="check.php?act=cart"><input type="button" value="Kembali"></a> 
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
<script>
	function validasi(form) {
		if (form.name.value == ""){
			alert("Anda belum mengisikan Nama.");
			form.name.focus();
			return (false);
		}
		if (form.address.value == ""){
			alert("Anda belum mengisikan Alamat.");
			form.address.focus();
			return (false);
		}
		if (form.phone.value == ""){
			alert("Anda belum mengisikan Nomor Telepon.");
			form.phone.focus();
			return (false);
		}
		if (form.email.value == ""){
			alert("Anda belum mengisikan Alamat Email.");
			form.email.focus();
			return (false);
		}
	}
</script>