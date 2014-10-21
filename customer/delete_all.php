<?php
session_start();
// if(!isset($_SESSION['transaksi'])){
//     $idt = date("ymdHis");
//     $_SESSION['transaksi'] = $idt;
// }
include "../aplikasi/koneksi.php";

$idtransaksi = session_id();

$del = mysql_query("delete from orders_temp where id_session=$idtransaksi");
if($del){
    header("location:../aplikasi/index.php");
}
?>
