<?php 
include "../aplikasi/koneksi.php";
include "../header/header.php";

if ($_GET['id'] == 1) {
	$query = mysql_query("SELECT * FROM product WHERE category_id='1'");
?>
<center><div class ='row'>
	<table width="70%">
		<tr>
			<td colspan="2" align="center"><h2>ACER</h2></td>
		</tr>
		<?php 
			$no = 1;
			while ($data = mysql_fetch_array($query)) {
		?>
		<tr>
			<td width="4%" align="left"><?php echo $no; ?></td>
			<td>
				<a class="href" href="../aplikasi/detail.php?id_product=<?php echo $data[0] ?>"><?php echo $data['name'];?>&nbsp;<?php echo $data['type']; ?></a>
			</td>
		</tr>
		<?php
			$no++;
			}
		?>
	</table>
</div></center>
<?php
} elseif ($_GET['id'] == 2) {
	$query = mysql_query("SELECT * FROM product WHERE category_id='2'");
?>
<center><div class ='row'>
	<table width="70%">
		<tr>
			<td colspan="2" align="center"><h2>ASUS</h2></td>
		</tr>
		<?php 
			$no = 1;
			while ($data = mysql_fetch_array($query)) {
		?>
		<tr>
			<td width="4%" align="left"><?php echo $no; ?></td>
			<td>
				<a class="href" href="../aplikasi/detail.php?id_product=<?php echo $data[0] ?>"><?php echo $data['name'];?>&nbsp;<?php echo $data['type']; ?></a>
			</td>
		</tr>
		<?php
			$no++;
			}
		?>
	</table>
</div></center>
<?php
} elseif ($_GET['id'] == 3) {
	$query = mysql_query("SELECT * FROM product WHERE category_id='3'");
?>
<center><div class ='row'>
	<table width="70%">
		<tr>
			<td colspan="2" align="center"><h2>APPLE</h2></td>
		</tr>
		<?php 
			$no = 1;
			while ($data = mysql_fetch_array($query)) {
		?>
		<tr>
			<td width="4%" align="left"><?php echo $no; ?></td>
			<td>
				<a class="href" href="../aplikasi/detail.php?id_product=<?php echo $data[0] ?>"><?php echo $data['name'];?>&nbsp;<?php echo $data['type']; ?></a>
			</td>
		</tr>
		<?php
			$no++;
			}
		?>
	</table>
</div></center>
<?php
} elseif ($_GET['id'] == 4) {
	$query = mysql_query("SELECT * FROM product WHERE category_id='4'");
?>
<center><div class ='row'>
	<table width="70%">
		<tr>
			<td colspan="2" align="center"><h2>DELL</h2></td>
		</tr>
		<?php 
			$no = 1;
			while ($data = mysql_fetch_array($query)) {
		?>
		<tr>
			<td width="4%" align="left"><?php echo $no; ?></td>
			<td>
				<a class="href" href="../aplikasi/detail.php?id_product=<?php echo $data[0] ?>"><?php echo $data['name'];?>&nbsp;<?php echo $data['type']; ?></a>
			</td>
		</tr>
		<?php
			$no++;
			}
		?>
	</table>
</div></center>
<?php
} elseif ($_GET['id'] == 5) {
	$query = mysql_query("SELECT * FROM product WHERE category_id='5'");
?>
<center><div class ='row'>
	<table width="70%">
		<tr>
			<td colspan="2" align="center"><h2>HP</h2></td>
		</tr>
		<?php 
			$no = 1;
			while ($data = mysql_fetch_array($query)) {
		?>
		<tr>
			<td width="4%" align="left"><?php echo $no; ?></td>
			<td>
				<a class="href" href="../aplikasi/detail.php?id_product=<?php echo $data[0] ?>"><?php echo $data['name'];?>&nbsp;<?php echo $data['type']; ?></a>
			</td>
		</tr>
		<?php
			$no++;
			}
		?>
	</table>
</div></center>
<?php
} elseif ($_GET['id'] == 6) {
	$query = mysql_query("SELECT * FROM product WHERE category_id='6'");
?>
<center><div class ='row'>
	<table width="70%">
		<tr>
			<td colspan="2" align="center"><h2>LENOVO</h2></td>
		</tr>
		<?php 
			$no = 1;
			while ($data = mysql_fetch_array($query)) {
		?>
		<tr>
			<td width="4%" align="left"><?php echo $no; ?></td>
			<td>
				<a class="href" href="../aplikasi/detail.php?id_product=<?php echo $data[0] ?>"><?php echo $data['name'];?>&nbsp;<?php echo $data['type']; ?></a>
			</td>
		</tr>
		<?php
			$no++;
			}
		?>
	</table>
</div></center>
<?php
} elseif ($_GET['id'] == 7) {
	$query = mysql_query("SELECT * FROM product WHERE category_id='7'");
?>
<center><div class ='row'>
	<table width="70%">
		<tr>
			<td colspan="2" align="center"><h2>SAMSUNG</h2></td>
		</tr>
		<?php 
			$no = 1;
			while ($data = mysql_fetch_array($query)) {
		?>
		<tr>
			<td width="4%" align="left"><?php echo $no; ?></td>
			<td>
				<a class="href" href="../aplikasi/detail.php?id_product=<?php echo $data[0] ?>"><?php echo $data['name'];?>&nbsp;<?php echo $data['type']; ?></a>
			</td>
		</tr>
		<?php
			$no++;
			}
		?>
	</table>
</div></center>
<?php
} elseif ($_GET['id'] == 8) {
	$query = mysql_query("SELECT * FROM product WHERE category_id='8'");
?>
<center><div class ='row'>
	<table width="70%">
		<tr>
			<td colspan="2" align="center"><h2>TOSHIBA</h2></td>
		</tr>
		<?php 
			$no = 1;
			while ($data = mysql_fetch_array($query)) {
		?>
		<tr>
			<td width="4%" align="left"><?php echo $no; ?></td>
			<td>
				<a class="href" href="../aplikasi/detail.php?id_product=<?php echo $data[0] ?>"><?php echo $data['name'];?>&nbsp;<?php echo $data['type']; ?></a>
			</td>
		</tr>
		<?php
			$no++;
			}
		?>
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