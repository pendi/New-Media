<?php 
session_start();
if(isset($_SESSION['id']) AND $_SESSION['level'] == "admin") {
	header('location:../admin/dashboard.php'); 
} elseif (isset($_SESSION['id']) AND $_SESSION['level'] == "co-admin") {
	header('location:../product/view_product.php'); 
}
include "../header/header.php";
?>
<form action="login_process.php" method="post">
	<table width="70%" align="center" bgcolor="#E6E6E6">
		<tr>
			<td colspan="3" align="center"><h2>Login Admin</h2></td>
		</tr>
		<tr>
			<td colspan="3">&nbsp;</td>
		</tr>
		<tr>
			<td width="27%">&nbsp;</td>
			<td width="8%">Username</td>
			<td width="35%"><input type="text" name="username" placeholder="username" autofocus></td>	
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>Password</td>
			<td><input type="password" name="password" placeholder="password"></td>	
		</tr>
		<tr>
			<td colspan="3">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="3" align="center">
				<input type="submit" name="submit" value="Login">
				<a href="../aplikasi/index.php"><input type="button" name="button" value="Back"></a>
			</td>
		</tr>
		<tr>
			<td colspan="3">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="3"><?php include "../footer/footer.php"; ?></td>
		</tr>
	</table>
</form>