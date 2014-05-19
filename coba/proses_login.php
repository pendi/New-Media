<?php
include "connection.php";
session_start();

$username	= strip_tags(trim($_POST['username']));
$password	= md5($_POST['password']);

$query	= "SELECT username FROM tb_user WHERE username='$username' AND password='$password'";
$sql	= mysql_query($query);
$numrow	= mysql_num_rows($sql);

if($numrow > 0) {
$_SESSION['user_admin']	= $username;
header("Location:user.php");
} else {
echo "<script>alert('Isi yang bener dong!');</script>";
echo "<meta http-equiv='Refresh' content='0; URL=index.php'>";
}
?>