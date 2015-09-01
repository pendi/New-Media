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
<form action="save_member.php" method="post" onsubmit="return validasi(this)">
	<div class="row-isi">
		<table width="70%" align="center">
			<tr>
				<td><h2>Daftar Member :</h2></td>
			</tr>
		</table>
		<table width="70%" align="center">
			<tr>
				<td width="25%"><b>Username</b></td>
				<td><input autofocus type="text" class="input" name="username" placeholder="Username"></td>
			</tr>
			<tr>
				<td><b>Nama Lengkap</b></td>
				<td><input type="text" class="input" name="name" placeholder="Nama Lengkap"></td>
			</tr>
			<tr>
				<td class="top"><b>Alamat</b></td>
				<td><textarea cols="25" rows="5" name="address" placeholder="Alamat"></textarea></td>
			</tr>
			<tr>
				<td><b>Nomor Telepon</b></td>
				<td><input type="text" class="input" name="phone" placeholder="Nomor Telepon"></td>
			</tr>
			<tr>
				<td><b>Email</b></td>
				<td><input type="text" class="input" name="email" placeholder="Email"></td>
			</tr>
			<tr>
				<td><b>Password</b></td>
				<td><input type="password" class="input" name="password" placeholder="Password"></td>
			</tr>
			<tr>
				<td><b>Konfirmasi Password</b></td>
				<td><input type="password" class="input" name="password_con" placeholder="Konfirmasi Password"></td>
			</tr>
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
			<tr>
				<td colspan="2">
					<input type="submit" value="Simpan" class="button round"> 
					<a href="data_customer.php" class="button round warning">Kembali</a> 
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
		if (form.username.value.trim() == ""){
			alert("Username harus diisi.");
			form.username.focus();
			return (false);
		}
		if (form.name.value.trim() == ""){
			alert("Anda belum mengisikan Nama.");
			form.name.focus();
			return (false);
		}
		if (form.address.value.trim() == ""){
			alert("Anda belum mengisikan Alamat.");
			form.address.focus();
			return (false);
		}
		if (form.phone.value.trim() == ""){
			alert("Anda belum mengisikan Nomor Telepon.");
			form.phone.focus();
			return (false);
		}
		if (form.email.value.trim() == ""){
			alert("Anda belum mengisikan Alamat Email.");
			form.email.focus();
			return (false);
		}
		if (form.password.value.trim() == ""){
			alert("Anda belum mengisikan Password.");
			form.password.focus();
			return (false);
		}
		if (form.password_con.value.trim() == ""){
			alert("Konfirmasi Password harus diisi.");
			form.password_con.focus();
			return (false);
		}
	}
</script>