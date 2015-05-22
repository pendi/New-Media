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
$que = mysql_query("SELECT * FROM login WHERE id='$_GET[id]'");
$data = mysql_fetch_array($que);
?>
<form action="delete_process.php" method="post">
<input type="hidden" name="id" value="<?php echo $data[0]; ?>">
	<div class="row-isi">
		<table class="width">
			<tr>
				<td colspan="3" align="center"><h2>HAPUS ADMIN</h2></td>
			</tr>
			<tr>
				<td width="27%"></td>
				<td width="10%">Username &nbsp;</td>
				<td width="35%">: <?php echo $data[1]; ?></td>
			</tr>
			<tr>
				<td></td>
				<td>Nama Lengkap &nbsp;</td>
				<td>: <?php echo $data[2]; ?> <?php echo $data[3]; ?></td>
			</tr>
			<tr>
				<td></td>
				<td>Password &nbsp;</td>
				<td>: <?php echo $data[4]; ?></td>
			</tr>
			<tr>
				<td></td>
				<td>Status &nbsp;</td>
				<td>: <?php echo $data[5]; ?></td>
			</tr>
			<tr>
				<td colspan="3">&nbsp;</td>
			</tr>
			<tr>
				<td colspan="3" align="center">
					<input type="submit" name="submit" class="button round" value="Hapus">
					<a href="view_admin.php" class="button round error">Batal</a>
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