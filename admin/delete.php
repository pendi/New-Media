<?php 
include "../aplikasi/koneksi.php";
session_start();
	if(!isset($_SESSION['id'])) {
	  	echo "<script>window.alert('Anda Harus Login Dulu');</script>";
		echo "<script>window.location = '../login/login.php';</script>";
	} elseif ($_SESSION['level'] == "co-admin") {
		echo "<script>window.alert('Maaf Anda Tidak Memiliki Hak Akses');</script>";
		echo "<script>window.location = '../product/view_product.php';</script>";
	} else {
include "../header/header_admin.php";
$que = mysql_query("select * from login where id='$_GET[id]'");
$data = mysql_fetch_array($que);
?>
<form action="delete_process.php" method="post">
<input type="hidden" name="id" value="<?php echo $data[0]; ?>">
	<table width="70%" align="center" bgcolor="#E6E6E6">
		<tr>
			<td colspan="3" align="center"><h2>DELETE ADMIN</h2></td>
		</tr>
		<tr>
			<td width="27%"></td>
			<td width="8%">Username &nbsp;</td>
			<td width="35%">: <?php echo $data[1]; ?></td>
		</tr>
		<tr>
			<td></td>
			<td>Full Name &nbsp;</td>
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
				<input type="submit" name="submit" value="Delete">
				<a href="view_admin.php"><input type="button" name="button" value="Back"></a>
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
</form>
<?php } ?>