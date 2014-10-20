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
<style type="text/css">
	.h2 {
		margin-bottom: 1px;
	}

	.hr {
		margin-top: -1px;
	}

	.radio {
		vertical-align: 25px;
	}

	img {
		margin-left: 14px;		
	}

	.div {
		margin-left: -70px;
		margin-top: 13px;
	}
</style>
<form action="payment_process.php" method="post">
	<div class="row">
		<table width="80%" align="center">
			<tr>
				<td colspan="2"><h2 class="h2">Method of Payment :</h2></td>
			</tr>
			<tr>
				<td colspan="2"><hr class="hr"></td>				
			</tr>
			<tr>
				<td colspan="2">
					Total Belanja Anda <b>Rp. <?php if ($numrow > 0) {
						echo $data["total"];
					} ?></b>. Untuk Pembayaran, Silahkan Pilih Bank yang Anda Inginkan:
				</td>
			</tr>
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
			<tr>
				<td width="30%">
					<input class="radio" type="radio" name="bank" value="mandiri"><img src="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/new_media/aplikasi/image/Mandiri.png' ?>" width = "50%">
				</td>
				<td width="50%">
					<div class="div">Bank Mandiri #1111111111<br> a/n Anila Shop</div>
					&nbsp;
				</td>
			</tr>
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
			<tr>
				<td>
					<input class="radio" type="radio" name="bank" value="bca"><img src="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/new_media/aplikasi/image/Icon-BCA.png' ?>" width = "50%">
				</td>
				<td>
					<div class="div">Bank BCA #2222222222<br> a/n Anila Shop</div>
					&nbsp;
				</td>
			</tr>
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
			<tr>
				<td colspan="2">
					<input type="submit" name="submit" value="Next">
					<a href="../aplikasi/index.php"><input type="button" name="button" value="Cancel"></a>
				</td>
			</tr>
		</table>
		<table width="100%">
			<tr>
				<td><?php include "../footer/footer.php" ?></td>
			</tr>
		</table>
	</div>
</form>