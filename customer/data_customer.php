<?php
include "../header/header.php";
?>
<form action="" method="post">
	<center><div class="row">
		<table>
			<tr>
				<td><h2>DATA CUSTOMER</h2></td>
			</tr>
		</table>
		<table border="1" width="55%" class="border">
			<tr>
				<td width="30%">Full Name</td>
				<td width="25%"><input type="text" name="name" placeholder="Full Name" autofocus></td>
			</tr>
			<tr>
				<td>Address</td>
				<td><textarea name="address" rows="5" cols="25" placeholder="Address"></textarea></td>
			</tr>
			<tr>
				<td>Phone Number</td>
				<td><input type="text" name="phone" placeholder="Phone Number"></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><input type="text" name="email" placeholder="Email"></td>
			</tr>
			<tr>
				<td colspan="2" align="center">
					<input type="submit" value="Submit">
					<a href="../aplikasi/index.php"><input type="button" value="Back"></a>
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