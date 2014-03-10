<?php
include "../header/header.php";
include "../aplikasi/koneksi.php";
?>
<form action="add_product.php" method="post">
	<table width="70%" align="center" bgcolor="#E6E6E6">
		<tr>
			<td align="center"><h2>LIST PRODUCT</h2></td>
		</tr>
	</table>
	<table width="70%" align="center" bgcolor="#E6E6E6" border="1" style="border-collapse: collapse;">
		<tr bgcolor="#00FFFF">
			<th width="8%">Id Product</th>
			<th width="8%">Product Name</th>
			<th width="8%">Type Product</th>
			<th width="8%">Product Price</th>
			<th width="5%">Stock Product</th>
			<th width="5%">Image</th>
			<th width="7%">Action</th>
		</tr>
		<?php
			$batas   = 7; 
			$halaman = $_GET['halaman']; 
			// if(isset($_GET['halaman'])) { $halaman = $_GET['halaman']; } 
			// 	else { $halaman = ""; }

			if(empty($halaman)){ 
			    $posisi=0; 
			    $halaman=1; 
			} 
			else{ 
			    $posisi = ($halaman-1) * $batas; 
			}

			$que = "select * from product limit $posisi,$batas";
			$tampil = mysql_query("$que");
			$no=$posisi+1;
			while ($data = mysql_fetch_array($tampil)) {
				echo "<tr>
						<td align='center'>$data[0]</td>
						<td align='center'>$data[1]</td>
						<td align='center'>$data[2]</td>
						<td align='center'>$data[3]</td>
						<td align='center'>$data[5]</td>
						<td align='center'><img src='$data[image]' width='100%'></td>
						<td align='center'>
							<a href='edit.php?kdbrg=$data[0]'><img src='http://localhost/belajar/aplikasi/gambar/glyphicons_030_pencil.png' width='10%'></a> &nbsp;
							<a href='hapus.php?kdbrg=$data[0]'><img src='http://localhost/belajar/aplikasi/gambar/glyphicons_016_bin.png' width='10%'></a>
						</td>
					 </tr>";
				$no++;
			}
		 ?>
		 <tr>
		 	<td colspan="7"><center><input type="submit" name="submit" value="Add Product" /></center></td>
		 </tr>
	</table>
	<table width="70%" bgcolor="#E6E6E6" align="center">
	<tr>
		<td align="right">		
			<?php
				echo "<br>Halaman : "; 
				$file="produk.php"; 

				$tampil2="select * from product"; 
				$hasil2=mysql_query($tampil2); 
				$jmldata=mysql_num_rows($hasil2); 
				$jmlhalaman=ceil($jmldata/$batas); 

				for($i=1;$i<=$jmlhalaman;$i++) 
				if ($i != $halaman) 
				{ 
				    echo " <a href=$_SERVER[PHP_SELF]?halaman=$i><font color='blue'>$i</font></A> | "; 
				} 
				else 
				{ 
				    echo " <b>$i</b> | "; 
				}
			?>
		</td>
	</tr>
	</table>
	<table width="70%" align="center" bgcolor="#E6E6E6">
		<tr>
			<td>&nbsp;<a href="menuadmin.php"><img src="http://localhost/belajar/aplikasi/gambar/back1.png" width="10%"></a></td>
		</tr>
		<tr>
			<td><?php include "../footer/footer.php"; ?></td>
		</tr>
	</table>
</form>
</body>
</html>