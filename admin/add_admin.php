<?php 
session_start();
	if(!isset($_SESSION['id'])) {
	  	echo "<script>window.alert('Anda Harus Login Dulu');</script>";
		echo "<script>window.location = '../login/login.php';</script>";
	} elseif ($_SESSION['level'] == "admin") {
		echo "<script>window.alert('Maaf Anda Tidak Memiliki Hak Akses');</script>";
		echo "<script>window.location = '../product/view_product.php';</script>";
	} else {
include "../header/header_admin.php";
?>
<div class="row-isi">
	<form action="save_admin.php" method="post" onsubmit="return validasi(this)">
		<table width="70%" align="center" bgcolor="#E6E6E6">
			<tr>
				<td colspan="3"><center><h2>TAMBAH ADMIN</h2></center></td>
			</tr>
			<tr>
				<td colspan="3">&nbsp;</td>
			</tr>
			<tr>
				<td width="10%"></td>
				<td width="13%">Username &nbsp;</td>
				<td width="35%">
					<input autofocus type="text" class="input" name="username" placeholder="Username" maxlength="30">
				</td>
			</tr>
			<tr>
				<td></td>
				<td>Nama Depan &nbsp;</td>
				<td>
					<input type="text" class="input" name="first_name" placeholder="Nama Depan" maxlength="20">
				</td>
			</tr>
			<tr>
				<td></td>
				<td>Nama Belakang &nbsp;</td>
				<td>
					<input type="text" class="input" name="last_name" placeholder="Nama Belakang" maxlength="30">
				</td>
			</tr>
			<tr>
				<td></td>
				<td>Password &nbsp;</td>
				<td>
					<input type="text" class="input" name="password" placeholder="Password">
				</td>
			</tr>
			<tr>
				<td></td>
				<td>Status &nbsp;</td>
				<td>
					<select name="status" size="0">
						<option value="0">Pilih Status</option>
						<option value="super admin">Super Admin</option>
						<option value="admin">Admin</option>
					</select>
				</td>
			</tr>
			<tr>
				<td colspan="3">&nbsp;</td>
			</tr>
			<tr>
				<td colspan="3" align="center">
					<input type="submit" name="submit" value="Simpan" class="button round">
					<a href="view_admin.php" class="button round error">Batal</a>
				</td>
			</tr>
			<tr>
				<td colspan="3"><?php include "../footer/footer.php"; ?></td>
			</tr>
		</table>
	</form>	
</div>
<?php } ?>
<script>
	function validasi(form) {
		if (form.username.value == ""){
			alert("Anda belum mengisikan Username.");
			form.username.focus();
			return (false);
		}
		if (form.password.value == ""){
			alert("Anda belum mengisikan Password.");
			form.password.focus();
			return (false);
		}
		if (form.status.value == 0){
			alert("Anda belum memilih Status.");
			form.status.focus();
			return (false);
		}
		return (true);
	}
</script>