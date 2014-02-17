<?php 
include "koneksi.php";
include "header.php";

$batas   = 8;
$halaman = $_GET['halaman'];

if(empty($halaman)){ 
    $posisi=0; 
    $halaman=1; 
} 
else{ 
    $posisi = ($halaman-1) * $batas; 
}
$sql = mysql_query("select * from produk limit $posisi,$batas");
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
<style type="text/css">
.search {
	margin: 7px 0;
}
</style>
</head>
<body>
<form action="search.php" method="post">
	<table width="65%" bgcolor="#E6E6E6" align="center">
		<tr>
			<td align="right">
				<input class="search" type="search" name="search" placeholder="search">
				<input type="submit" name="submit" value="search">
			</td>
		</tr>
		<?php while ($r=mysql_fetch_array($sql)) { ?>
		<tr class="list">
			<td><center>
				<img src="<?php echo $r['gambar']; ?>" width="100"><br/>
				<?php echo "$r[nama]"; ?><br/>
				<?php echo "$r[harga]"; ?><br/>
				<?php echo "<a href='aksi.php?module=keranjang&act=tambah&id=$r[kdbrg]'><input type='button' value='Beli'></a>
				<input type=button value='Detail' onclick=\"window.location.href='aksi.php?module=detail&id=$r[0]';\">"; ?>
			</center></td>
		</tr>
		<?php } ?>
		<tr>
		<td align="right">		
			<?php
				echo "<br>Halaman : "; 
				$file="produk.php"; 

				$tampil2="select * from produk"; 
				$hasil2=mysql_query($tampil2); 
				$jmldata=mysql_num_rows($hasil2); 
				$jmlhalaman=ceil($jmldata/$batas); 

				for($i=1;$i<=$jmlhalaman;$i++) 
				if ($i != $halaman) 
				{ 
				    echo " <a href=$_SERVER[PHP_SELF]?halaman=$i><font color='blue'>$i</font></A> | "; 
				} 
				else 
				{ 
				    echo " <b>$i</b> | "; 
				}
			?>
		</td>
	</tr>
	<tr>
		<td>
			<?php include "footer.php" ?>	
		</td>
	</tr>
	</table>
</form>
</body>
</html>