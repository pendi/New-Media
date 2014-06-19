<?php
include "../aplikasi/koneksi.php";
session_start();
	if(!isset($_SESSION['id'])) {
	  	echo "<script>window.alert('Anda Harus Login Dulu');</script>";
		echo "<script>window.location = '../login/login.php';</script>";
	} else {
include "../header/header_admin.php";

?>
<form method="post">
	<table width="70%" align="center" bgcolor="#E6E6E6">
		<tr>
			<td align="center"><h2>PROFILE</h2></td>
		</tr>
	</table>
		<table class="width" bgcolor="#E6E6E6" align="center" border="1" style="border-collapse: collapse;">
			<tr class="hover">
				<td width="13%"><b>Id</b></td>
				<td width="22%"><?php echo $data[0]; ?></td>
				<td width="10%"></td>
			</tr>
			<tr class="hover">
				<td><b>Username</b></td>
				<td><?php echo $data[1]; ?></td>
				<td><center>
					<a href="edit_user.php?id=<?php echo $_SESSION['id_admin']; ?>"><img src="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/new_media/aplikasi/image/edit.png' ?>" width = "20%"></a>
				</center></td>
			</tr>
			<tr class="hover">
				<td><b>First Name</b></td>
				<td><?php echo $data[2]; ?></td>
				<td><center>
					<a href="edit_first_name.php?id=<?php echo $_SESSION['id_admin']; ?>"><img src="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/new_media/aplikasi/image/edit.png' ?>" width = "20%"></a>
				</center></td>
			</tr>
			<tr class="hover">
				<td><b>Last Name</b></td>
				<td><?php echo $data[3]; ?></td>
				<td><center>
					<a href="edit_last_name.php?id=<?php echo $_SESSION['id_admin']; ?>"><img src="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/new_media/aplikasi/image/edit.png' ?>" width = "20%"></a>
				</center></td>
			</tr>
			<tr class="hover">
				<td><b>Password</b></td>
				<td>**********</td>
				<td><center>
					<a href="edit_password.php?id=<?php echo $_SESSION['id_admin']; ?>"><img src="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/new_media/aplikasi/image/edit.png' ?>" width = "20%"></a>
				</center></td>
			</tr>
			<tr class="hover">
				<td><b>Status</b></td>
				<td><?php echo $data[5]; ?></td>
				<td></td>
			</tr>
		</table>
		<table class="width" bgcolor="#E6E6E6" align="center">
			<tr>
				<td><?php include "../footer/footer.php"; ?></td>
			</tr>
		</table>
</form>
<?php } ?>