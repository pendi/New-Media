<?php 
include "../aplikasi/koneksi.php";
include "../header/header.php";

$batas   = 5;
// $halaman = $_GET['halaman'];
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

if ($_GET['id'] == 1) {
	$id = 1;
	$vendor = "ACER";
} elseif ($_GET['id'] == 2) {
	$id = 2;
	$vendor = "APPLE";
} elseif ($_GET['id'] == 3) {
	$id = 3;
	$vendor = "ASUS";
} elseif ($_GET['id'] == 4) {
	$id = 4;
	$vendor = "DELL";
} elseif ($_GET['id'] == 5) {
	$id = 5;
	$vendor = "HP";
} elseif ($_GET['id'] == 6) {
	$id = 6;
	$vendor = "LENOVO";
} elseif ($_GET['id'] == 7) {
	$id = 7;
	$vendor = "SAMSUNG";
} elseif ($_GET['id'] == 8) {
	$id = 8;
	$vendor = "TOSHIBA";
}

if (isset($id)) {
	$query = mysql_query("SELECT * FROM product WHERE category_id='$id' AND status ='2' limit $posisi,$batas");
?>
<style type="text/css">
	.padding-left {
    padding-left: 135px;
	}
	.padding-right {
    padding-right: 135px;
	}
</style>
<div class="row-isi">
	<table class="width" align="center">
		<tr>
			<td align="center" colspan="3">
				<hr/>
					<h2><?php echo $vendor ?></h2>
				<hr/>
			</td>
		</tr>
		<?php while ($r=mysql_fetch_array($query)) {
		$price = $r["price"];
		$stock = $r["stock"]; ?>
		<tr>
			<td class="padding-left" colspan="3">			
				<p><a href="detail.php?id_product=<?php echo $r[0] ?>" class="href ref"><?php echo $r["name"]; ?>&nbsp;<?php echo $r['type']; ?></a></p>
			</td>
		</tr>
		<tr>
			<td class="padding-left" width="120px">
				<?php if (!empty($r['image'])): ?>				
					<a href="detail.php?id_product=<?php echo $r[0] ?>"><img src="<?php echo $r['image']; ?>" width="120px" height="120px"></a>
				<?php else : ?>
					<a href="detail.php?id_product=<?php echo $r[0] ?>"><img src="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/new_media/aplikasi/image/no-image.jpg' ?>" width="120px" height="120px"></a>
				<?php endif ?>
			</td>
			<td style="vertical-align: top; font-size: 14px;" colspan="2" class="padding-right">
				<?php echo $r["description"]; ?><br/>
			</td>
		</tr>
		<tr>
			<td align="right" style="font-size: x-large; color: #00008B;" colspan="2">
				<?php if ($stock == 0): ?>
					<a class="stock">STOK HABIS</a>			
				<?php endif ?>				
				Rp. <?php echo number_format($price,0,'','.').",-" ?> &nbsp;
			</td>
			<td class="padding-right" width="80px">
				<?php if ($stock == 0): ?>
					<a>&nbsp;</a>
				<?php else: ?>
					<a href="cart.php?act=add&amp;id=<?php echo $r['id_product']; ?>&amp;ref=purchase.php" id="buy" class="button round">BUY</a>
				<?php endif ?>
			</td>
		</tr>
		<tr>
			<td colspan="3">
				<hr>				
			</td>
		</tr>
		<?php } ?>	
		<tr>
			<td align="right" colspan="3">		
				<?php
					echo "<br>Page : ";

					$tampil2="select * from product where status = 2 and category_id = $id"; 
					$hasil2=mysql_query($tampil2); 
					$jmldata=mysql_num_rows($hasil2); 
					$jmlhalaman=ceil($jmldata/$batas);

					for($i=1;$i<=$jmlhalaman;$i++) {
						if($i>=($halaman-3) && $i <= ($halaman+3)){
							if ($i != $halaman) 
							{ 
							    echo " <a href=$_SERVER[PHP_SELF]?halaman=$i&id=$id><font color='#00F'>$i</font></a>"; 
							} 
							else 
							{ 
							    echo " <a class=display>$i</a>"; 
							}
						}
					}
				?>
			</td>
		</tr>
		<tr>
			<td colspan="3">
				<?php include "../footer/footer.php"; ?>	
			</td>
		</tr>
	</table>
</div>
<table width="70%" bgcolor="#E6E6E6" align="center">		
</table>
<?php 
}
?>