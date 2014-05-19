<?php
include "../aplikasi/koneksi.php";
session_start();
	if(!isset($_SESSION['id'])) {
	  	echo "<script>window.alert('Anda Harus Login Dulu');</script>";
		echo "<script>window.location = '../login/login.php';</script>";
	} elseif ($_SESSION['level'] == "co-admin") {
		echo "<script>window.alert('Maaf Anda Tidak Memiliki Hak Akses');</script>";
		echo "<script>window.location = '../product/view_product.php';</script>";
	} else {
include "../header/header_admin.php";
?>
<form action="add_admin.php" method="post">
	<table width="70%" align="center" bgcolor="#E6E6E6">
		<tr>
			<td align="center"><h2>LIST ADMIN</h2></td>
		</tr>
		<tr>
			<td align="right"><input style="margin-right: 41px;" type="submit" name="submit" value="Add Admin" /></td>
		</tr>
	</table>
	<center><div class="row">
		<table width="90%" align="center" border="1" class="border">
			<tr bgcolor="#00FFFF">
				<th>Id</th>
				<th>Username</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Password</th>
				<th>Status</th>
				<th>Action</th>
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

				$que = "select * from login limit $posisi,$batas";
				$tampil = mysql_query($que);
				$no = $posisi + 1;
				while ($data = mysql_fetch_array($tampil)) { ?>					
						<tr class="hover">
							<td align='center'><?php echo $no; ?></td>
							<td align='center'><?php echo $data[1]; ?></td>
							<td align='center'><?php echo $data[2]; ?></td>
							<td align='center'><?php echo $data[3]; ?></td>
							<td align='center'><?php echo $data[4]; ?></td>
							<td align='center'><?php echo $data[5]; ?></td>
							<td align='center'>
								<a href="delete.php?id=<?php echo $data[0]; ?>"><img src="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/new_media/aplikasi/image/delete.png' ?>" width = "15%"></a>
							</td>
						</tr>					 
					<?php $no++;
				}
			 ?>
			<tr>
				<td align="right" colspan="7">		
					<?php
						echo "<br>Halaman : ";

						$tampil2="select * from login"; 
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
								    echo " <b>$i</b> | "; 
								}
							}
						}
					?>
				</td>
			</tr>
		</table>
		<table width="100%">
			<tr>
				<td><?php include "../footer/footer.php"; ?></td>
			</tr>
		</table>
	</div></center>
</form>
<?php } ?>