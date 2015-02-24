<?php
	function price($price) {
		$format = number_format($price,0,'','.').",-";
		return $format;
	}

	function autoDelete($table) {
		$time = 3;
		$query = "DELETE FROM $table WHERE DATEDIFF(CURDATE(), created_time) > $time";
		$hasil = mysql_query($query);
		return $hasil;
	}
