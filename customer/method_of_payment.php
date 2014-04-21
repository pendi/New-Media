<?php  
session_start();
include "../header/header.php";
include "../aplikasi/koneksi.php";

$sid = session_id();
$que = "SELECT * FROM orders_temp WHERE id_session='$sid'";
$sql = mysql_query($que);
$numrow = mysql_num_rows($sql);
$data = mysql_fetch_array($sql);
?>
<form>
	<center><div class="row">
		<table width="80%">
			<tr>
				<td><h2>Method of Payment :</h2></td>
			</tr>
			<tr>
				<td><hr></td>				
			</tr>
			<tr>
				<td>
					Total Belanja Anda <b>Rp. <?php if ($numrow > 0) {
						echo $data["total"];
					} ?></b>. Silahkan Pilih Bank yang Anda Inginkan:
				</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>
					<input type="radio" name="bank" value="mandiri">Mandiri
				</td>
			</tr>
			<tr>
				<td>
					<input type="radio" name="bank" value="bca">BCA
				</td>
			</tr>
		</table>
	</div></center>
</form>