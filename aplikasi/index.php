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
$sql = mysql_query("select * from product limit $posisi,$batas");
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form>
	<table width="65%" bgcolor="#E6E6E6" align="center">
		<?php while ($r=mysql_fetch_array($sql)) { ?>
		<tr class="list">
			<td><center>
				<img src="<?php echo $r['image']; ?>" width="100"><br/>
				<?php echo $r["name"]; ?><br/>
				<?php echo $r["price"]; ?><br/>
				<?php echo "<a href='detail.php?id_product=$r[0]'><input type=button value='Detail Product'></a>"; ?>
			</center></td>
		</tr>
		<?php } ?>
		<tr>
		<td align="right">		
			<?php
				echo "<br>Halaman : "; 
				$file="produk.php"; 

				$tampil2="select * from product"; 
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