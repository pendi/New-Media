<?php 

function image($id) {
	$sql = "select location from image where id_image = $id";
	$query = mysql_query($sql);
	while ($data = mysql_fetch_array($query)) {
	return $data['location'];
	}
}