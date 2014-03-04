<?php
include "koneksi.php";
include "header.php";
?>
<!-- <table width="70%" align="center" bgcolor="#E6E6E6" border="1">
	<tr bgcolor="orange">
		<th width="8%">Name</th>
		<th width="8%">Type</th>
		<th width="8%">Price</th>
		<th width="5%">Image</th>
		<th width="5%"></th>
	</tr>	
	<?php
		// $search= $_POST['search'];
		// $q = "select * from product where name = '$search' or type = '$search'";
		// $result = mysql_query($q);
		// $jumlah = mysql_num_rows($result);
		// if($jumlah > 0) {
		// 	while ($data = mysql_fetch_array($result)) {
		// 	echo "
		// 		<tr>
		// 			<td align='center'>$data[1]</td>
		// 			<td align='center'>$data[2]</td>
		// 			<td align='center'>$data[3]</td>
		// 			<td align='center'><img src='$data[image]' width='50%'></td>
		// 			<td align='center'><a href='detail.php?id_product=$data[0]' class='href'>Detail</a></td>
		// 		</tr>";
		// 	}
		// } else {
		// 	echo"<script>window.alert('Data Tidak Ditemukan');</script>";
		// 	echo"<script>window.location = 'index.php';</script>";
			// header('Location: index.php');
		// }
	?>
</table>
<table width="70%" align="center" bgcolor="#E6E6E6">
	<tr>
		<td>&nbsp;<a href="index.php"><img src="http://localhost/belajar/aplikasi/gambar/back1.png" width="10%"></a></td>
	</tr>
</table> -->


<?php
$batas   = 10;
$halaman = $_GET['halaman'];
$search = $_POST['search'];

if(empty($halaman)){ 
    $posisi=0; 
    $halaman=1; 
} 
else{ 
    $posisi = ($halaman-1) * $batas; 
}
$sql = mysql_query("select * from product where name = '$search' or type = '$search' limit $posisi,$batas");
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
					<img src="<?php echo $r['image']; ?>" width="100"><br/>
				<?php else : ?>
					<img src="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/new_media/aplikasi/gambar/no-image.jpg' ?>" width="100"><br/>
				<?php endif ?>
					<?php echo $r["name"]; ?><br/>
					<?php echo $r["price"]; ?><br/>
					<?php echo "<a href='detail.php?id_product=$r[0]'><input type=button value='Detail Product'></a>"; ?>
				</center></td>
			</tr>
		<?php endwhile ?>
	<?php else : ?>
		<tr>
			<td><center><h2><font color="#FF1919"><?php echo "Sorry, ".$search." not found"; ?></font></h2></center></td>
		</tr>
	<?php endif ?>
	<tr>
	<td align="right">		
		<?php
			echo "<br>Halaman : ";

			$tampil2="select * from product where name = '$search' or type = '$search'"; 
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
		<?php include "footer.php" ?>	
	</td>
</tr>
</table>