<?php 
include "../aplikasi/koneksi.php";
include "../header/header.php";

if ($_GET['id'] == 1) {
	$query = mysql_query("SELECT * FROM product WHERE category_id='1' AND publish ='2'");
?>
<center><div class='row'>
	<table width="100%">
		<tr>
			<td colspan="2" align="center"><h2>ACER</h2></td>
		</tr>
		<?php while ($r=mysql_fetch_array($query)) { ?>
		<tr class="list">
			<td><center>
			<?php if (!empty($r['image'])): ?>				
				<a href="../aplikasi/detail.php?id_product=<?php echo $r[0] ?>"><img class="gambar" src="<?php echo $r['image']; ?>" width="100px" height="120px"></a><br/>
			<?php else : ?>
				<a href="../aplikasi/detail.php?id_product=<?php echo $r[0] ?>"><img class="gambar" src="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/new_media/aplikasi/image/no-image.jpg' ?>" width="100px" height="120px"></a><br/>
			<?php endif ?>
				<?php echo $r["name"]; ?><br/>
				<?php echo $r["price"]; ?><br/>
				<?php echo "<a href='../aplikasi/detail.php?id_product=$r[0]'><input type=button value='Detail Product'></a>"; ?>
			</center></td>
		</tr>
		<?php } ?>
	</table>
</div></center>
<?php
} elseif ($_GET['id'] == 2) {
	$query = mysql_query("SELECT * FROM product WHERE category_id='2' AND publish ='2'");
?>
<center><div class ='row'>
	<table width="100%">
		<tr>
			<td colspan="2" align="center"><h2>ASUS</h2></td>
		</tr>
		<?php while ($r=mysql_fetch_array($query)) { ?>
		<tr class="list">
			<td><center>
			<?php if (!empty($r['image'])): ?>				
				<a href="../aplikasi/detail.php?id_product=<?php echo $r[0] ?>"><img class="gambar" src="<?php echo $r['image']; ?>" width="100px" height="120px"></a><br/>
			<?php else : ?>
				<a href="../aplikasi/detail.php?id_product=<?php echo $r[0] ?>"><img class="gambar" src="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/new_media/aplikasi/image/no-image.jpg' ?>" width="100px" height="120px"></a><br/>
			<?php endif ?>
				<?php echo $r["name"]; ?><br/>
				<?php echo $r["price"]; ?><br/>
				<?php echo "<a href='../aplikasi/detail.php?id_product=$r[0]'><input type=button value='Detail Product'></a>"; ?>
			</center></td>
		</tr>
		<?php } ?>
	</table>
</div></center>
<?php
} elseif ($_GET['id'] == 3) {
	$query = mysql_query("SELECT * FROM product WHERE category_id='3' AND publish ='2'");
?>
<center><div class ='row'>
	<table width="100%">
		<tr>
			<td colspan="2" align="center"><h2>APPLE</h2></td>
		</tr>
		<?php while ($r=mysql_fetch_array($query)) { ?>
		<tr class="list">
			<td><center>
			<?php if (!empty($r['image'])): ?>				
				<a href="../aplikasi/detail.php?id_product=<?php echo $r[0] ?>"><img class="gambar" src="<?php echo $r['image']; ?>" width="100px" height="120px"></a><br/>
			<?php else : ?>
				<a href="../aplikasi/detail.php?id_product=<?php echo $r[0] ?>"><img class="gambar" src="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/new_media/aplikasi/image/no-image.jpg' ?>" width="100px" height="120px"></a><br/>
			<?php endif ?>
				<?php echo $r["name"]; ?><br/>
				<?php echo $r["price"]; ?><br/>
				<?php echo "<a href='../aplikasi/detail.php?id_product=$r[0]'><input type=button value='Detail Product'></a>"; ?>
			</center></td>
		</tr>
		<?php } ?>
	</table>
</div></center>
<?php
} elseif ($_GET['id'] == 4) {
	$query = mysql_query("SELECT * FROM product WHERE category_id='4' AND publish ='2'");
?>
<center><div class ='row'>
	<table width="100%">
		<tr>
			<td colspan="2" align="center"><h2>DELL</h2></td>
		</tr>
		<?php while ($r=mysql_fetch_array($query)) { ?>
		<tr class="list">
			<td><center>
			<?php if (!empty($r['image'])): ?>				
				<a href="../aplikasi/detail.php?id_product=<?php echo $r[0] ?>"><img class="gambar" src="<?php echo $r['image']; ?>" width="100px" height="120px"></a><br/>
			<?php else : ?>
				<a href="../aplikasi/detail.php?id_product=<?php echo $r[0] ?>"><img class="gambar" src="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/new_media/aplikasi/image/no-image.jpg' ?>" width="100px" height="120px"></a><br/>
			<?php endif ?>
				<?php echo $r["name"]; ?><br/>
				<?php echo $r["price"]; ?><br/>
				<?php echo "<a href='../aplikasi/detail.php?id_product=$r[0]'><input type=button value='Detail Product'></a>"; ?>
			</center></td>
		</tr>
		<?php } ?>
	</table>
</div></center>
<?php
} elseif ($_GET['id'] == 5) {
	$query = mysql_query("SELECT * FROM product WHERE category_id='5' AND publish ='2'");
?>
<center><div class ='row'>
	<table width="100%">
		<tr>
			<td colspan="2" align="center"><h2>HP</h2></td>
		</tr>
		<?php while ($r=mysql_fetch_array($query)) { ?>
		<tr class="list">
			<td><center>
			<?php if (!empty($r['image'])): ?>				
				<a href="../aplikasi/detail.php?id_product=<?php echo $r[0] ?>"><img class="gambar" src="<?php echo $r['image']; ?>" width="100px" height="120px"></a><br/>
			<?php else : ?>
				<a href="../aplikasi/detail.php?id_product=<?php echo $r[0] ?>"><img class="gambar" src="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/new_media/aplikasi/image/no-image.jpg' ?>" width="100px" height="120px"></a><br/>
			<?php endif ?>
				<?php echo $r["name"]; ?><br/>
				<?php echo $r["price"]; ?><br/>
				<?php echo "<a href='../aplikasi/detail.php?id_product=$r[0]'><input type=button value='Detail Product'></a>"; ?>
			</center></td>
		</tr>
		<?php } ?>
	</table>
</div></center>
<?php
} elseif ($_GET['id'] == 6) {
	$query = mysql_query("SELECT * FROM product WHERE category_id='6' AND publish ='2'");
?>
<center><div class ='row'>
	<table width="100%">
		<tr>
			<td colspan="2" align="center"><h2>LENOVO</h2></td>
		</tr>
		<?php while ($r=mysql_fetch_array($query)) { ?>
		<tr class="list">
			<td><center>
			<?php if (!empty($r['image'])): ?>				
				<a href="../aplikasi/detail.php?id_product=<?php echo $r[0] ?>"><img class="gambar" src="<?php echo $r['image']; ?>" width="100px" height="120px"></a><br/>
			<?php else : ?>
				<a href="../aplikasi/detail.php?id_product=<?php echo $r[0] ?>"><img class="gambar" src="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/new_media/aplikasi/image/no-image.jpg' ?>" width="100px" height="120px"></a><br/>
			<?php endif ?>
				<?php echo $r["name"]; ?><br/>
				<?php echo $r["price"]; ?><br/>
				<?php echo "<a href='../aplikasi/detail.php?id_product=$r[0]'><input type=button value='Detail Product'></a>"; ?>
			</center></td>
		</tr>
		<?php } ?>
	</table>
</div></center>
<?php
} elseif ($_GET['id'] == 7) {
	$query = mysql_query("SELECT * FROM product WHERE category_id='7' AND publish ='2'");
?>
<center><div class ='row'>
	<table width="100%">
		<tr>
			<td colspan="2" align="center"><h2>SAMSUNG</h2></td>
		</tr>
		<?php while ($r=mysql_fetch_array($query)) { ?>
		<tr class="list">
			<td><center>
			<?php if (!empty($r['image'])): ?>				
				<a href="../aplikasi/detail.php?id_product=<?php echo $r[0] ?>"><img class="gambar" src="<?php echo $r['image']; ?>" width="100px" height="120px"></a><br/>
			<?php else : ?>
				<a href="../aplikasi/detail.php?id_product=<?php echo $r[0] ?>"><img class="gambar" src="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/new_media/aplikasi/image/no-image.jpg' ?>" width="100px" height="120px"></a><br/>
			<?php endif ?>
				<?php echo $r["name"]; ?><br/>
				<?php echo $r["price"]; ?><br/>
				<?php echo "<a href='../aplikasi/detail.php?id_product=$r[0]'><input type=button value='Detail Product'></a>"; ?>
			</center></td>
		</tr>
		<?php } ?>
	</table>
</div></center>
<?php
} elseif ($_GET['id'] == 8) {
	$query = mysql_query("SELECT * FROM product WHERE category_id='8' AND publish ='2'");
?>
<center><div class ='row'>
	<table width="100%">
		<tr>
			<td colspan="2" align="center"><h2>TOSHIBA</h2></td>
		</tr>
		<?php while ($r=mysql_fetch_array($query)) { ?>
		<tr class="list">
			<td><center>
			<?php if (!empty($r['image'])): ?>				
				<a href="../aplikasi/detail.php?id_product=<?php echo $r[0] ?>"><img class="gambar" src="<?php echo $r['image']; ?>" width="100px" height="120px"></a><br/>
			<?php else : ?>
				<a href="../aplikasi/detail.php?id_product=<?php echo $r[0] ?>"><img class="gambar" src="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/new_media/aplikasi/image/no-image.jpg' ?>" width="100px" height="120px"></a><br/>
			<?php endif ?>
				<?php echo $r["name"]; ?><br/>
				<?php echo $r["price"]; ?><br/>
				<?php echo "<a href='../aplikasi/detail.php?id_product=$r[0]'><input type=button value='Detail Product'></a>"; ?>
			</center></td>
		</tr>
		<?php } ?>
	</table>
</div></center>
<?php 
}
?>
<center><div class="row">
	<table width="100%">
		<tr>
			<td><?php include "../footer/footer.php"; ?></td>
		</tr>
	</table>
</div></center>