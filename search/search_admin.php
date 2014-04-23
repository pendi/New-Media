<?php
include "../aplikasi/koneksi.php";
include "../header/header_admin.php";

$batas   = 10;
// $halaman = $_GET['halaman'];
$search = $_POST['search'];
if(isset($_GET['halaman'])) { 
	$halaman = $_GET['halaman']; 
} else { 
	$halaman = ""; 
}

if(empty($halaman)){ 
    $posisi=0; 
    $halaman=1; 
} 
else{ 
    $posisi = ($halaman-1) * $batas; 
}
if ((isset($_POST['submit'])) AND ($_POST['search'] <> "")) {

	$sql = mysql_query("select * from product where name like '%$search%' or type like '%$search%' limit $posisi,$batas");
	$jumlah = mysql_num_rows($sql);
	?>
	<table width="70%" bgcolor="#E6E6E6" align="center">
		<?php if ($jumlah > 0): ?>
			<tr>
				<td><center><?php echo "featuring " .$search. " many as " .$jumlah. " records"; ?></center></td>
			</tr>
			<?php while ($r=mysql_fetch_array($sql)) : ?>
				<tr class="list">
					<td><center>
					<?php if (!empty($r['image'])): ?>				
						<a href='../product/detail.php?id_product=<?php echo $r[0] ?>'><img class="gambar" src="<?php echo $r['image']; ?>" width="100px" height="120px"></a><br/>
					<?php else : ?>
						<a href='../product/detail.php?id_product=<?php echo $r[0] ?>'><img class="gambar" src="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/new_media/aplikasi/gambar/no-image.jpg' ?>" width="100px" height="120px"></a><br/>
					<?php endif ?>
						<?php echo $r["name"]; ?><br/>
						<?php echo $r["price"]; ?><br/>
						<?php echo "<a href='../product/detail.php?id_product=$r[0]'><input type=button value='Detail Product'></a>"; ?>
					</center></td>
				</tr>
			<?php endwhile ?>
		<?php else : ?>
			<tr>
				<td><center><h2><font color="#FF1919"><?php echo "Sorry, ".$search." not found"; ?></font></h2></center></td>
			</tr>
		<?php endif ?>
		<tr>
			<td>
				<a href="../product/view_product.php"><input type="button" name="button" value="Back"></a>
			</td>
		</tr>
		<tr>
			<td align="right">		
				<?php
					echo "<br>Halaman : ";

					$tampil2="select * from product where name like '%$search%' or type like '%$search%'"; 
					$hasil2=mysql_query($tampil2); 
					$jmldata=mysql_num_rows($hasil2); 
					$jmlhalaman=ceil($jmldata/$batas);

					for($i=1;$i<=$jmlhalaman;$i++) 
						if($i>=($halaman-3) && $i <= ($halaman+3)){
							if ($i != $halaman) 
							{ 
							    echo " <a href=$_SERVER[PHP_SELF]?halaman=$i><font color='#00F'>$i</font></a> | "; 
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
				<?php include "../footer/footer.php" ?>	
			</td>
		</tr>
	</table>
<?php 
} else {
	echo "
		<table width='70%' bgcolor='#E6E6E6' align='center'>
			<tr>
				<td><center><h2><font color='#FF1919'>Please enter your search keywords</font></h2></center></td>
			</tr>
			<tr>
				<td>
					<a href='../product/view_product.php'><input type='button' name='button' value='Back'></a>
				</td>
			</tr>
			<tr>
				<td>"; 
					include '../footer/footer.php';
				echo "</td>
			</tr>
		</table>";

} 
?>