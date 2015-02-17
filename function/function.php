<?php
	function price($price) {
		$format = number_format($price,0,'','.').",-";
		return $format;
}