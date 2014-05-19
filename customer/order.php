<?php
include "../header/header.php";
include "../aplikasi/koneksi.php";
// session_start();

// $query = "SELECT customer.name,customer.address,customer.phone_number,customer.email,product.name,product.type,product.price
// 		 FROM customer INNER JOIN product ON customer.id_product=product.id_product";

// $tampil = mysql_query($query);
$que = mysql_query("SELECT * FROM product");
$data = mysql_fetch_array($que);

$price = $data['price'];
$quantity = $_SESSION['quantity'];
?>
<form action="" method="post">
	<center><div class="row">
		<table>
			<tr>
				<td><h2>ORDER</h2></td>
			</tr>
		</table>
		<table border="1" width="55%" class="border">
		<?php  
			// while ($data = mysql_fetch_array($tampil)) {
		?>
			<tr>
				<td width="30%">Full Name</td>
				<td width="25%"><?php echo $_SESSION['name']; ?></td>
			</tr>
		<?php //} ?>

			<tr>
				<td>Address</td>
				<td><?php echo $_SESSION['address']; ?></td>
			</tr>
			<tr>
				<td>Phone Number</td>
				<td><?php echo $_SESSION['phone']; ?></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><?php echo $_SESSION['email']; ?></td>
			</tr>
			<tr>
				<td>Total</td>
				<td><?php echo $price * $quantity; ?></td>
			</tr>
			<tr>
				<td colspan="2" align="center">
					<input type="submit" value="Submit">
					<a href="../aplikasi/index.php"><input type="button" value="Cancel"></a>
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