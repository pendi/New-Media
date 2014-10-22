<?php
session_start();
	if(!isset($_SESSION['id'])) {
	  	echo "<script>window.alert('Anda Harus Login Dulu');</script>";
		echo "<script>window.location = '../login/login.php';</script>";
	} else {
include "../header/header_admin.php";

?>
<form method="post">
	<div class="row-isi">
		<table class="width">
			<tr>
				<td align="center"><h2>PROFIL</h2></td>
			</tr>
		</table>		
		<table align="center" class="border" border="1">
			<tr class="hover">
				<td width="13%"><b>Username</b></td>
				<td width="22%"><?php echo $data[1]; ?></td>
				<td width="10%"><center>
					<a href="edit_user.php?id=<?php echo $_SESSION['id_admin']; ?>"><img src="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/new_media/image/icon/edit.png' ?>" width="20px"></a>
				</center></td>
			</tr>
			<tr class="hover">
				<td><b>Nama Depan</b></td>
				<td><?php echo $data[2]; ?></td>
				<td><center>
					<a href="edit_first_name.php?id=<?php echo $_SESSION['id_admin']; ?>"><img src="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/new_media/image/icon/edit.png' ?>" width="20px"></a>
				</center></td>
			</tr>
			<tr class="hover">
				<td><b>Nama Belakang</b></td>
				<td><?php echo $data[3]; ?></td>
				<td><center>
					<a href="edit_last_name.php?id=<?php echo $_SESSION['id_admin']; ?>"><img src="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/new_media/image/icon/edit.png' ?>" width="20px"></a>
				</center></td>
			</tr>
			<tr class="hover">
				<td><b>Password</b></td>
				<td>**********</td>
				<td><center>
					<a href="edit_password.php?id=<?php echo $_SESSION['id_admin']; ?>"><img src="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/new_media/image/icon/edit.png' ?>" width="20px"></a>
				</center></td>
			</tr>
			<tr class="hover">
				<td><b>Status</b></td>
				<td><?php echo $data[5]; ?></td>
				<td></td>
			</tr>
		</table>
		<table class="width">
			<tr>
				<td><?php include "../footer/footer.php"; ?></td>
			</tr>
		</table>
	</div>
</form>
<?php } ?>