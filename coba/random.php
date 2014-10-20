<?php 
function rand_string( $length ) {

    $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    return substr(str_shuffle($chars),0,$length);

}

echo rand_string(8);
?>