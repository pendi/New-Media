<?php
session_start();
	if(!isset($_SESSION['id'])) {
	  	echo "<script>window.alert('Anda Harus Login Dulu');</script>";
		echo "<script>window.location = '../login/login.php';</script>";
	} else {
include "../header/header_admin.php";
$query = mysql_query("select * from login where id='$_GET[id]'");
$data = mysql_fetch_array($query);
?>
<form action="editing_process_password.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?php echo $data[0]; ?>" />
	<div class="row-isi">
		<table class="width">
			<tr>
				<td colspan="3" align="center"><h2>EDIT PASSWORD</h2></td>
			</tr>
			<tr>
				<td width="23%"></td>
				<td width="12%">Ganti Password &nbsp;</td>
				<td width="35%"><input autofocus type="password" class="input" name="newpass" placeholder="Ganti Password"></td>
			</tr>
			<tr>
				<td></td>
				<td>Ulangi Password &nbsp;</td>
				<td><input type="password" class="input" name="newpass2" placeholder="Ulangi Password"></td>
			</tr>
			<tr>
				<td colspan="3">&nbsp;</td>
			</tr>
			<tr>
				<td></td>
				<td>Masukan Password &nbsp;</td>
				<td><input type="password" class="input" name="oldpass" placeholder="Masukan Password"></td>
			</tr>
			<tr>
				<td colspan="3">&nbsp;</td>
			</tr>
			<tr>
				<td colspan="3" align="center">
					<input type="submit" name="submit" value="Simpan">
					<a href="view_edit.php"><input type="button" name="button" value="Kembali"></a>
				</td>
			</tr>
			<tr>
				<td colspan="3">&nbsp;</td>
			</tr>
			<tr>
				<td colspan="3">
					<?php include "../footer/footer.php"; ?>
				</td>
			</tr>
		</table>		
	</div>
</form>
<?php } ?>