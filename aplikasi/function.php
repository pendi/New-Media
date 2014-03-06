<?php 

function image($id) {
	$sql = "select location from image where id_image = $id";
	$query = mysql_query($sql);
	while ($data = mysql_fetch_array($query)) {
	return $data['location'];
	}
}

function setValue($field) {
	if (isset($_POST[$field]) && !empty($_POST[$field])) {
		return $_POST[$field];
	} 
	return "";
}

function setEmpty($field){
	if ($_POST) {
		if (empty($_POST[$field])) {
		return 'Isi ' . $field . ' dengan benar'; 
		}
	}
	return '';
}

function validEmpty($required = null) {
	if ($_POST) {
		$_POST[$required] = trim($_POST[$required]);

		if(empty($_POST[$required])) {
		return 'Kolom Ini Harus di Isi';		
		}
	}
	return '';
}

function validChar($required,$min = 1,$max = 5) {
	if ($_POST) {
		$_POST[$required] = trim($_POST[$required]);

		if ((strlen($_POST[$required])) < $min) {
			return ucfirst($required) . ' Harus Lebih Dari '.$min.' Huruf';
		} elseif ((strlen($_POST[$required])) > $max) {
			return ucfirst($required) . ' Harus Kurang Dari '.$max.' Huruf';
		}	
	}
	return '';
}

function nameValidation(){
	$msg = '';
		if($_POST){
			if(validEmpty('nama') != '') {
				$msg = validEmpty('nama');
				return $msg;
			} 
			if(validChar('nama',3,50) != '') {
				$msg = validChar('nama',3,50);
				return $msg;
			}
		}
return $msg;
}