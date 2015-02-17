<?php 
	include "../header/header.php";
?>
<style type="text/css">
	.padding-left {
    padding-left: 135px;
	}
	.padding-right {
    padding-right: 135px;
	}

	img.scale:hover {
		-webkit-transform: scale(1.2,1.2);
		-moz-transform: scale(1.2,1.2);
		-ms-transform: scale(1.2,1.2);
		-o-transform: scale(1.2,1.2);
	}
</style>
<?php

$batas = 10;
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
$type = "type";
$pos = "asc";
if ($by == "az") {
	$order = "name";
	$type = "type";
	$pos = "asc";
} elseif ($by == "za") {
	$order = "name";
	$type = "type";
	$pos = "desc";
}

$sql = mysql_query("SELECT * FROM product WHERE status = 2 ORDER BY $order $pos,$type $pos LIMIT $posisi,$batas");
?>
<div class="row-isi">
	<table class="width">
		<tr>
			<td align="center" colspan="3">
				<hr/>
				Sort By: &nbsp;&nbsp; 
				<a href="<?php $_SERVER['PHP_SELF']?>?by=az" class="href">A-Z</a> &nbsp;&nbsp;&nbsp; 
				<a href="<?php $_SERVER['PHP_SELF']?>?by=za" class="href">Z-A</a>
				<hr/>
			</td>
		</tr>
		<?php while ($r=mysql_fetch_array($sql)) {
		$price = $r["price"];
		$stock = $r['stock']; ?>
		<tr>
			<td class="padding-left" colspan="3">			
				<p><a href="detail.php?id_product=<?php echo $r[0] ?>" class="href ref"><?php echo $r["name"]; ?>&nbsp;<?php echo $r['type']; ?></a></p>
			</td>
		</tr>
		<tr>
			<td class="padding-left" width="128px">
				<?php if (!empty($r['image'])): ?>				
					<a href="detail.php?id_product=<?php echo $r[0] ?>"><img class="scale" src="<?php echo $r['image']; ?>" width="120px" height="120px"></a>
				<?php else : ?>
					<a href="detail.php?id_product=<?php echo $r[0] ?>"><img src="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/online_shop/image/product/no-image.jpg' ?>" width="120px" height="120px"></a>
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
				Rp. <?php echo price($price); ?> &nbsp;
			</td>
			<td class="padding-right" width="80px">
				<?php if ($stock == 0): ?>
					<a>&nbsp;</a>
				<?php else: ?>
					<a href="aksi.php?act=add&amp;id=<?php echo $r[0]; ?>" id="buy" class="button round">BELI</a>
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
					echo "<br>Hal : ";

					$tampil2="SELECT * FROM product WHERE status = 2"; 
					$hasil2=mysql_query($tampil2); 
					$jmldata=mysql_num_rows($hasil2); 
					$jmlhalaman=ceil($jmldata/$batas);

					for($i=1;$i<=$jmlhalaman;$i++) {
						if($i>=($halaman-3) && $i <= ($halaman+3)){
							if ($i != $halaman) 
							{ 
							    echo " <a href=$_SERVER[PHP_SELF]?halaman=$i&by=$by><font color='#00F'>$i</font></a> |"; 
							} 
							else 
							{ 
							    echo " <a class=display>$i</a> |"; 
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