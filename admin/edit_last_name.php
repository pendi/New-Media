<?php
session_start();
	if(!isset($_SESSION['id'])) {
	  	echo "<script>window.alert('Anda Harus Login Dulu');</script>";
		echo "<script>window.location = '../login/login.php';</script>";
	} else {
include "../header/header_admin.php";
$query = mysql_query("SELECT * FROM login WHERE id='$_GET[id]'");
$data = mysql_fetch_array($query);
?>
<form action="editing_process_last_name.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?php echo $data[0]; ?>" />
	<div class="row-isi">
		<table class="width">
			<tr>
				<td colspan="3" align="center"><h2>GANTI NAMA BELAKANG</h2></td>
			</tr>
			<tr>
				<td width="23%"></td>
				<td width="13%">Ganti Nama Belakang &nbsp;</td>
				<td width="35%"><input autofocus type="text" class="input" name="last_name" placeholder="Nama Belakang" value="<?php echo $data[3]; ?>"></td>
			</tr>
			<tr>
				<td colspan="3">&nbsp;</td>
			</tr>
			<tr>
				<td></td>
				<td>Masukan Password &nbsp;</td>
				<td><input type="password" class="input" name="password" placeholder="Masukan Password"></td>
			</tr>
			<tr>
				<td colspan="3">&nbsp;</td>
			</tr>
			<tr>
				<td colspan="3" align="center">
					<input type="submit" name="submit" value="Simpan" class="button round">
					<a href="view_edit.php" class="button round error">Batal</a>
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