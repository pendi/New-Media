<?php 
include "koneksi.php";
include "../header/header.php";

$batas   = 5;
// $halaman = $_GET['halaman'];
if(isset($_GET['halaman'])) { 
	$halaman = $_GET['halaman']; 
} else { 
	$halaman = ""; 
}
// $by = $_GET['by']
if(isset($_GET['by'])) { 
	$by = $_GET['by']; 
} else { 
	$by = ""; 
}

if(empty($halaman)){ 
    $posisi=0; 
    $halaman=1; 
} 
else{ 
    $posisi = ($halaman-1) * $batas; 
}

$order = "id_product";
$pos = "asc";
if ($by == "az") {
	$order = "name";
	$pos = "asc";
} elseif ($by == "za") {
	$order = "name";
	$pos = "desc";
}

$sql = mysql_query("select * from product where status = 2 order by $order $pos limit $posisi,$batas");
// $data = mysql_fetch_array($sql);
?>
<style type="text/css">
	/*.margin {
    margin-left: 132px;
    margin-bottom: 96px;
    margin-top: -124px;
    position: absolute;
	}*/
</style>
<table width="70%" bgcolor="E6E6E6" align="center">
	<tr>
		<td align="center">
			<hr/>
			Sort By: &nbsp;&nbsp; 
			<a href="<?php $_SERVER['PHP_SELF']?>?by=az" class="href">A-Z</a> &nbsp;&nbsp;&nbsp; 
			<a href="<?php $_SERVER['PHP_SELF']?>?by=za" class="href">Z-A</a>
			<hr/>
		</td>
	</tr>
</table>
<div class="row-index">	
	<table width="70%" align="center" border="0">
		<?php while ($r=mysql_fetch_array($sql)) {
		$price = $r["price"];	 ?>
		<tr>
			<td colspan="3">			
				<p><a href="detail.php?id_product=<?php echo $r[0] ?>" class="href ref"><?php echo $r["name"]; ?>&nbsp;<?php echo $r['type']; ?></a></p>
			</td>
		</tr>
		<tr>
			<td width="120px">
				<?php if (!empty($r['image'])): ?>				
					<a href="detail.php?id_product=<?php echo $r[0] ?>"><img src="<?php echo $r['image']; ?>" width="120px" height="120px"></a>
				<?php else : ?>
					<a href="detail.php?id_product=<?php echo $r[0] ?>"><img src="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/new_media/aplikasi/image/no-image.jpg' ?>" width="120px" height="120px"></a>
				<?php endif ?>
			</td>
			<td style="vertical-align: top; font-size: 14px;" colspan="2">
				<?php echo $r["description"]; ?><br/>
			</td>
		</tr>
		<tr>
			<td>
				&nbsp;<?php //echo "<a href='detail.php?id_product=$r[0]'><input type=button value='Detail Product'></a>"; ?>
			</td>
			<td align="right" style="font-size: x-large; color: #00008B;">				
				Rp. <?php echo number_format($price,0,'','.').",-" ?> &nbsp;
			</td>
			<td width="80px">
				<a href="../customer/cart.php?act=add&amp;id=<?php echo $r['id_product']; ?>&amp;ref=purchase.php">
				<!-- <a href="../customer/check.php?id_product=<?php echo $r[0]; ?>" class="href"> -->
					<img title="Buy" class="image" src="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/new_media/aplikasi/image/buy.png' ?>" width="80px">
				</a>
			</td>
		</tr>
		<tr>
			<td colspan="3">
				<hr>				
			</td>
		</tr>
		<?php } ?>
	</table>
	<table width="100%">		
		<tr>
			<td align="right">		
				<?php
					echo "<br>Page : ";

					$tampil2="select * from product where status = 2 order by $order $pos"; 
					$hasil2=mysql_query($tampil2); 
					$jmldata=mysql_num_rows($hasil2); 
					$jmlhalaman=ceil($jmldata/$batas);

					for($i=1;$i<=$jmlhalaman;$i++) {
						if($i>=($halaman-3) && $i <= ($halaman+3)){
							if ($i != $halaman) 
							{ 
							    echo " <a href=$_SERVER[PHP_SELF]?halaman=$i&by=$by><font color='#00F'>$i</font></a> | "; 
							} 
							else 
							{ 
							    echo " <b>$i</b> | "; 
							}
						}
					}
				?>
			</td>
		</tr>
		<tr>
			<td>
				<?php include "../footer/footer.php"; ?>	
			</td>
		</tr>
	</table>
</div>
<!-- <div class="row">
	<table width="100%" align="center">
		<tr>
			<td align="center">
				Sort By: &nbsp;&nbsp; 
				<a href="<?php $_SERVER['PHP_SELF']?>?by=az" class="href">A-Z</a> &nbsp;&nbsp;&nbsp; 
				<a href="<?php $_SERVER['PHP_SELF']?>?by=za" class="href">Z-A</a>
			</td>
		</tr>
		<?php while ($r=mysql_fetch_array($sql)) { ?>
		<tr class="list">
			<td><center>
			<?php if (!empty($r['image'])): ?>				
				<a href="detail.php?id_product=<?php echo $r[0] ?>"><img class="gambar" src="<?php echo $r['image']; ?>" width="100px" height="120px"></a><br/>
			<?php else : ?>
				<a href="detail.php?id_product=<?php echo $r[0] ?>"><img class="gambar" src="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/new_media/aplikasi/image/no-image.jpg' ?>" width="100px" height="120px"></a><br/>
			<?php endif ?>
				<?php echo $r["name"]; ?><br/>
				<?php echo $r["price"]; ?><br/>
				<?php echo "<a href='detail.php?id_product=$r[0]'><input type=button value='Detail Product'></a>"; ?>
			</center></td>
		</tr>
		<?php } ?>
	</table>
</div> -->