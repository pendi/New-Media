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
	<center><div class="row">
		<table width="55%">
			<tr>
				<td><h2>Data Customer :</h2></td>
			</tr>
		</table>
		<table width="55%">
			<tr>
				<td width="20%"><b>Full Name</b></td>
				<td width="35%"><input autofocus type="text" maxlength="50" name="name" placeholder="Full Name"></td>
			</tr>
			<tr>
				<td class="top"><b>Address</b></td>
				<td><textarea cols="25" rows="5" name="address" placeholder="Address"></textarea></td>
			</tr>
			<tr>
				<td><b>Phone Number</b></td>
				<td><input type="text" name="phone" placeholder="Phone Number"></td>
			</tr>
			<tr>
				<td><b>Email</b></td>
				<td><input type="text" name="email" placeholder="Email"></td>
			</tr>
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
			<tr>
				<td colspan="2">
					<input type="submit" value="Next"> 
					<a href="../aplikasi/index.php"><input type="button" value="Cancel"></a> 
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