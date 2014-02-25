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
	<table width="65%" bgcolor="#E6E6E6" align="center">
		<?php while ($r=mysql_fetch_array($sql)) { ?>
		<tr class="list">
			<td><center>
			<?php if (!empty($r['image'])): ?>				
				<img src="<?php echo $r['image']; ?>" width="100"><br/>
			<?php else : ?>
				<img src="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/new_media/aplikasi/gambar/no-image.jpg' ?>" width="100"><br/>
			<?php endif ?>
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

				$tampil2="select * from product"; 
				$hasil2=mysql_query($tampil2); 
				$jmldata=mysql_num_rows($hasil2); 
				$jmlhalaman=ceil($jmldata/$batas); 


				$existingPage = $_GET['halaman'];

				for($i=1;$i<=$jmlhalaman;$i++) 
					if($i>=($existingPage-3) && $i <= ($existingPage+3)){
						if ($i != $existingPage) 
						{ 
						    echo " <a href=$_SERVER[PHP_SELF]?halaman=$i><font color='#B82929'>$i</font></a> | "; 
						} 
						else 
						{ 
						    echo " <b>$i</b> | "; 
						}
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