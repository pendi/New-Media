<?php
session_start();
	if(!isset($_SESSION['id'])) {
	  	echo "<script>window.alert('Anda Harus Login Dulu');</script>";
		echo "<script>window.location = '../login/login.php';</script>";
	} else {
include "../header/header_admin.php";
?>

<form action="add_product.php" method="post">
	<div class="row-isi">
		<table class="width">
			<tr>
				<td align="center"><h2>DAFTAR PRODUK</h2></td>
			</tr>
			<tr>
				<td align="right"><input type="submit" name="submit" value="Tambah Produk" /></td>
			</tr>
		</table>		
		<table border="1" class="width border">
			<tr bgcolor="#00FFFF" height="35px">
				<th width="8%">Id Produk</th>
				<th width="8%">Nama Produk</th>
				<th width="8%">Jenis Produk</th>
				<th width="8%">Harga Produk</th>
				<th width="3%">Stok</th>
				<th width="5%">Gambar</th>
				<th width="4%">Status</th>
				<th width="5%"></th>
			</tr>
			<?php
				$batas   = 7; 
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

				$que = "select * from product limit $posisi,$batas";
				$tampil = mysql_query("$que");
				while ($data = mysql_fetch_array($tampil)) { ?>					
						<tr class="hover">
							<td align='center'>
								<a href="detail.php?id_product=<?php echo $data[0]; ?>" class="href"><?php echo $data[0]; ?></a>
							</td>
							<td align='center'><?php echo $data[1]; ?></td>
							<td align='center'><?php echo $data[2]; ?></td>
							<td align='center'>Rp. <?php echo price($data[3]); ?></td>
							<td align='center'><?php echo $data[5]; ?></td>
							<td align='center'>
								<?php if (!empty($data['image'])): ?>				
									<img src="<?php echo $data['image']; ?>" width="50%"><br/>
								<?php else : ?>
									<img src="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/new_media/image/product/no-image.jpg' ?>" width="50%"><br/>
								<?php endif ?>
							</td>
							<td align="center">
								<?php 
									if ($data[8]==1) {
										echo "Not Publish";
									} elseif ($data[8]==2) {
										echo "Publish";
									}
								?>
							</td>
							<td align='center'>
								<a href="edit.php?id_product=<?php echo $data[0]; ?>"><img title="Edit" src="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/new_media/image/icon/edit.png' ?>" width = "15%"></a> &nbsp;
								<a href="delete.php?id_product=<?php echo $data[0]; ?>"><img title="Hapus" src="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/new_media/image/icon/delete.png' ?>" width = "15%"></a> &nbsp;
								<?php if($data[8]==1): ?>
									<a href="publish.php?id_product=<?php echo $data[0]; ?>"><img title="Publish" src="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/new_media/image/icon/publish.png' ?>" width = "17%"></a>
								<?php else: ?>
									<a href="publish.php?id_product=<?php echo $data[0]; ?>"><img title="Not Publish" src="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/new_media/image/icon/publish.png' ?>" width = "17%"></a>
								<?php endif ?>
							</td>
						</tr>					 
					<?php
				}
			 ?>
		</table>
		<table class="width">
		<tr>
			<td align="right">		
				<?php
					echo "<br>Hal : ";

					$tampil2="select * from product"; 
					$hasil2=mysql_query($tampil2); 
					$jmldata=mysql_num_rows($hasil2); 
					$jmlhalaman=ceil($jmldata/$batas); 

					for($i=1;$i<=$jmlhalaman;$i++) {
						if($i>=($halaman-3) && $i <= ($halaman+3)){
							if ($i != $halaman)
							{ 
							    echo " <a href=$_SERVER[PHP_SELF]?halaman=$i><font color='#00F'>$i</font></a> | "; 
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
		</table>
		<table class="width">
			<tr>
				<td><?php include "../footer/footer.php"; ?></td>
			</tr>
		</table>
	</div>
</form>
<?php } ?>