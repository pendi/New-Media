<?php
session_start();
	if(!isset($_SESSION['id'])) {
	  	echo "<script>window.alert('Anda Harus Login Dulu');</script>";
		echo "<script>window.location = '../login/login.php';</script>";
	} else {
include "../header/header_admin.php";
?>
<style type="text/css">
	.search {
		margin: 7px 10px;
		width: 50%;
		height: 28px;
		border-radius: 30px;
		outline-style: none;
		padding-left: 7px;
	}
</style>

<form action="<?php echo "$_SERVER[PHP_SELF]" ?>" method="get">
	<div class="row-isi">
		<table class="width">
			<tr>
				<td align="center" colspan="2"><h2>DAFTAR PRODUK</h2></td>
			</tr>
			<tr>
				<td>
					<input class="search" type="search" name="search" placeholder="Cari Produk">
				</td>
				<td align="right">
					<a href="<?php echo 'add_product.php'; ?>" class="button round">Tambah Produk</a>
					<!-- <input type="submit" name="submit" class="button round" value="Tambah Produk" /> -->
				</td>
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
				$batas   = 10;
				if(isset($_GET['search'])) {
					$search = $_GET['search'];
				} else { 
					$search = "";
				}
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

				if (!empty($search)) {
					$que = mysql_query("SELECT * FROM product WHERE name LIKE '%$search%' OR type LIKE '%$search%' LIMIT $posisi,$batas");
					$jumlah = mysql_num_rows($que);
				} else {
					$que = mysql_query("SELECT * FROM product LIMIT $posisi,$batas");
					$jumlah = mysql_num_rows($que);
				}
				// $tampil = mysql_query($que);
			?>
			<?php if($jumlah > 0): ?>
				<?php while ($data = mysql_fetch_array($que)): ?>					
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
								<img src="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/online_shop/image/product/no-image.jpg' ?>" width="50%"><br/>
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
							<a href="edit.php?id_product=<?php echo $data[0]; ?>"><img title="Edit" src="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/online_shop/image/icon/edit.png' ?>" width = "15%"></a> &nbsp;
							<a href="delete.php?id_product=<?php echo $data[0]; ?>"><img title="Hapus" src="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/online_shop/image/icon/delete.png' ?>" width = "15%"></a> &nbsp;
							<?php if($data[8]==1): ?>
								<a href="publish.php?id_product=<?php echo $data[0]; ?>"><img title="Publish" src="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/online_shop/image/icon/publish.png' ?>" width = "17%"></a>
							<?php else: ?>
								<a href="publish.php?id_product=<?php echo $data[0]; ?>"><img title="Not Publish" src="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/online_shop/image/icon/publish.png' ?>" width = "17%"></a>
							<?php endif ?>
						</td>
					</tr>					 
				<?php endwhile ?>
			<?php else: ?>
				<tr>
					<td colspan="8" align="center" style="font-size:20px; padding:20px">Produk tidak ditemukan</td>
				</tr>
			<?php endif ?>
		</table>
		<table class="width">
		<tr>
			<td align="right">
				<nav>
					<ul class="pagination">
						<?php
							if(!empty($search)) {
								$tampil2 = "SELECT * FROM product WHERE name LIKE '%$search%' OR type LIKE '%$search%'";
							} else {
								$tampil2="SELECT * FROM product";
							}
							$hasil2=mysql_query($tampil2); 
							$jmldata=mysql_num_rows($hasil2); 
							$jmlhalaman=ceil($jmldata/$batas);
						?>

						<?php if($halaman > 1): ?>
							<?php $previous = $halaman-1; ?>
							<?php if(!empty($search)): ?>
								<li><a href="<?php echo "$_SERVER[PHP_SELF]?search=$search&halaman=$previous" ?>" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
							<?php else: ?>
								<li><a href="<?php echo "$_SERVER[PHP_SELF]?halaman=$previous" ?>" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
							<?php endif ?>
						<?php else: ?>
							<li class="disabled"><a href="" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
						<?php endif ?>

						<?php for($i=1;$i<=$jmlhalaman;$i++): ?>
							<?php if($i>=($halaman-3) && $i <= ($halaman+3)): ?>
								<?php if ($i != $halaman): ?>
									<?php if(!empty($search)): ?>
										<li><a href="<?php echo "$_SERVER[PHP_SELF]?search=$search&halaman=$i" ?>"><?php echo $i; ?></a></li>
									<?php else: ?>
										<li><a href="<?php echo "$_SERVER[PHP_SELF]?halaman=$i" ?>"><?php echo $i; ?></a></li>
									<?php endif ?>
								<?php else: ?>
									<li class="active"><a><?php echo $i; ?></a></li>
								<?php endif ?>
							<?php endif ?>
						<?php endfor ?>

						<?php if($halaman < $jmlhalaman): ?>
							<?php $next = $halaman+1; ?>
							<?php if(!empty($search)): ?>
								<li><a href="<?php echo "$_SERVER[PHP_SELF]?search=$search&halaman=$next" ?>" aria-label="Next"><span aria-hidden="true">»</span></a></li>
							<?php else: ?>
								<li><a href="<?php echo "$_SERVER[PHP_SELF]?halaman=$next" ?>" aria-label="Next"><span aria-hidden="true">»</span></a></li>
							<?php endif ?>
						<?php else: ?>
							<li class="disabled"><a href="" aria-label="Next"><span aria-hidden="true">»</span></a></li>
						<?php endif ?>
					</ul>
			   	</nav>
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