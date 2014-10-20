<?php 
session_start();
	if(!isset($_SESSION['id'])) {
	  	echo "<script>window.alert('Anda Harus Login Dulu');</script>";
		echo "<script>window.location = '../login/login.php';</script>";
	} elseif ($_SESSION['level'] == "co-admin") {
		echo "<script>window.alert('Maaf Anda Tidak Memiliki Hak Akses');</script>";
		echo "<script>window.location = '../product/view_product.php';</script>";
	} else {
include "../header/header_admin.php";
?>
<table width="70%" align="center" bgcolor="#E6E6E6">
	<tr>
		<td width="35%" align="center">
			<a href="../product/view_product.php"><img src="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/new_media/admin/image/documents-icon.png' ?>" width="50%"></a><br/>
			DAFTAR PRODUK
		</td>
		<td width="35%" align="center">
			<a href="view_admin.php"><img src="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/new_media/admin/image/user-icon.png' ?>" width="50%"></a><br/>
			ADMIN
		</td>
	</tr>
	<tr>
		<td colspan="2"><?php include "../footer/footer.php"; ?></td>
	</tr>
</table>


<?php } ?>