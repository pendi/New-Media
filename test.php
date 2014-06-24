<?php 
$alpha = array('A','B','C','D','E','F','G','H','I','J','K', 'L','M','N','O','P','Q','R','S','T','U','V','W','X ','Y','Z');
$myStr = md5("pendi");
$myStr1 = md5("setiawan");
// $p = ord($myStr);
$p = chr($myStr);
// $result = substr($myStr,0, 5);
// $result = $myStr;
// $result = $alpha[$myStr];

// $integer = 93;
// $stringedInt = (string) $integer
$stringAsli = md5("user/pendi.setiawan/mine");
$stringAsli2 = md5("user/pendi.setiawan/hris");
$stringAsli3 = md5("user/pendi.setiawan/hris");

$stringBersih = preg_replace("/[^A-Za-z]/", '', $stringAsli);
$stringBersih2 = preg_replace("/[^A-Za-z]/", '', $stringAsli2);
$stringBersih3 = preg_replace("/[^A-Za-z]/", '', $stringAsli3);
print_r($stringBersih); echo "<br/>"; 
print_r($stringBersih2); echo "<br/>"; 
print_r($stringBersih3); 
exit;
?>