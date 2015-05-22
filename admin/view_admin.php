<?php
session_start();
	if(!isset($_SESSION['id'])) {
	  	echo "<script>window.alert('Anda Harus Login Dulu');</script>";
		echo "<script>window.location = '../login/login.php';</script>";
	} elseif ($_SESSION['level'] == "admin") {
		echo "<script>window.alert('Maaf Anda Tidak Memiliki Hak Akses');</script>";
		echo "<script>window.location = '../product/view_product.php';</script>";
	} else {
include "../header/header_admin.php";
?>
<form action="add_admin.php" method="post">
	<div class="row-isi">
		<table class="width">
			<tr>
				<td align="center"><h2>DAFTAR ADMIN</h2></td>
			</tr>
			<tr>
				<td align="right"><input style="margin-right: 41px;" type="submit" name="submit" value="Tambah Admin" class="button round" /></td>
			</tr>
		</table>		
		<table width="90%" align="center" border="1" class="border">
			<tr bgcolor="#00FFFF" height="35px;">
				<!-- <th>Id</th> -->
				<th>Username</th>
				<th>Nama Depan</th>
				<th>Nama Belakang</th>
				<th>Password</th>
				<th>Status</th>
				<th width="80px;"></th>
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

				$que = "SELECT * FROM login LIMIT $posisi,$batas";
				$tampil = mysql_query($que);
				$no = $posisi + 1;
				while ($data = mysql_fetch_array($tampil)) { ?>					
						<tr class="hover">
							<!-- <td align='center'><?php //echo $no; ?></td> -->
							<td align='center'><?php echo $data[1]; ?></td>
							<td align='center'><?php echo $data[2]; ?></td>
							<td align='center'><?php echo $data[3]; ?></td>
							<td align='center'><?php echo $data[4]; ?></td>
							<td align='center'><?php echo $data[5]; ?></td>
							<td align='center'>
								<a href="delete.php?id=<?php echo $data[0]; ?>"><img title="Hapus" src="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/online_shop/image/icon/delete.png' ?>" width = "15%"></a>
							</td>
						</tr>					 
					<?php $no++;
				}
			 ?>
		</table>
		<table width="90%" align="center">
			<tr>
				<td align="right" colspan="7">
					<nav>
						<ul class="pagination">
							<?php
								$tampil2="SELECT * FROM login"; 
								$hasil2=mysql_query($tampil2); 
								$jmldata=mysql_num_rows($hasil2); 
								$jmlhalaman=ceil($jmldata/$batas);
							?>

							<?php if($halaman > 1): ?>
								<?php $previous = $halaman-1; ?>
								<li><a href="<?php echo "$_SERVER[PHP_SELF]?halaman=$previous" ?>" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
							<?php else: ?>
								<li class="disabled"><a href="" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
							<?php endif ?>

							<?php for($i=1;$i<=$jmlhalaman;$i++): ?>
								<?php if($i>=($halaman-3) && $i <= ($halaman+3)): ?>
									<?php if ($i != $halaman): ?>
										<li><a href="<?php echo "$_SERVER[PHP_SELF]?halaman=$i" ?>"><?php echo $i; ?></a></li>
									<?php else: ?>
										<li class="active"><a><?php echo $i; ?></a></li>
									<?php endif ?>
								<?php endif ?>
							<?php endfor ?>

							<?php if($halaman < $jmlhalaman): ?>
								<?php $next = $halaman+1; ?>
								<li><a href="<?php echo "$_SERVER[PHP_SELF]?halaman=$next" ?>" aria-label="Next"><span aria-hidden="true">»</span></a></li>
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