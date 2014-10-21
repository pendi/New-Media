<?php  
include "../header/header.php";
?>
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
<style type="text/css">
	.top {
		vertical-align: top;
	}
</style>
<form action="save_customer.php" method="post" onsubmit="return validasi(this)">
	<div class="row-isi">
		<table width="70%" align="center">
			<tr>
				<td><h2>Data Pembeli :</h2></td>
			</tr>
		</table>
		<table width="70%" align="center">
			<tr>
				<td width="20%"><b>Nama Lengkap</b></td>
				<td><input autofocus type="text" class="input" maxlength="50" name="name" placeholder="Nama Lengkap"></td>
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
				<td colspan="2">&nbsp;</td>
			</tr>
			<tr>
				<td colspan="2">
					<input type="submit" value="Simpan"> 
					<a href="../aplikasi/index.php"><input type="button" value="Batal"></a> 
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