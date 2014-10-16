<?php
    session_start();
    include "../aplikasi/koneksi.php";
    if(!isset($_SESSION['transaksi'])){
        $idt = date("YmdHis");
        $_SESSION['transaksi'] = $idt;
    }
    $idt = $_SESSION['transaksi'];
    $id = $_GET['id'];

    $encript = md5($id);
    $regex = preg_replace("/[^A-Za-z]/", '', $encript);
    $alfa = substr($regex, 0, 5);
    $kode = strtoupper($alfa);

    $kdauto = mysql_query("SELECT max(id_order) AS last FROM orders_temp WHERE id_order LIKE '$kode%'");
    $result = mysql_fetch_array($kdauto);
    $lastNoTransaksi = $result['last'];
    $lastNoUrut = substr($lastNoTransaksi, 5, 4);
    $nextNoUrut = $lastNoUrut + 1;
    $nextNoTransaksi = $kode.sprintf('%04s', $nextNoUrut);
    
    
    // $insert = mysql_query("INSERT INTO orders_temp(id_order,id_product,id_session,quantity,total,method) 
    //         VALUES($nextNoTransaksi,'$id','$idt','0','0','bca')");
    // if ($insert) {
    //     echo "<script>window.alert('Data Berhasil Disimpan');</script>";
    //     echo "<script>window.location = 'view_product.php';</script>";
    // } else {
    //     echo "<script>window.alert('Data Gagal Disimpan');</script>";
    //     echo "<script>window.location = 'view_product.php';</script>";
    // }
    // $query = mysql_query("SELECT * FROM product WHERE id_product = '$_GET[id]'");
    // $data = mysql_fetch_array($query);
     
    if (isset($_GET['act']) && isset($_GET['ref'])) 
    {
        $act = $_GET['act'];
        $ref = $_GET['ref'];
             
        if ($act == "add") 
        {           
            if (isset($_GET['id'])) 
            {
                $id = $_GET['id'];
                if (isset($_SESSION['items'][$id])) 
                {
                    $_SESSION['items'][$id] += 1;
                } 
                else 
                {
                    $_SESSION['items'][$id] = 1; 
                }
            }
        } 
        elseif ($act == "plus") 
        {
            if (isset($_GET['id'])) 
            {
                $id = $_GET['id'];
                if (isset($_SESSION['items'][$id])) 
                {
                    $_SESSION['items'][$id] += 1;
                }
            }
        } 
        elseif ($act == "min") 
        {
            if (isset($_GET['id'])) 
            {
                $id = $_GET['id'];
                if (isset($_SESSION['items'][$id])) 
                {
                    $_SESSION['items'][$id] -= 1;
                }
            }
        } 
        elseif ($act == "del") {
            if (isset($_GET['id'])) 
            {
                $id = $_GET['id'];
                if (isset($_SESSION['items'][$id])) 
                {
                    // echo "<pre>";
                    // print_r($_SESSION['items'][$id]);
                    // exit();
                    unset($_SESSION['items'][$id]);
                }
            }


            //     if (!isset($_SESSION['items'][$id])) {
            //         // session_destroy();
            //      $ref = "../aplikasi/index.php";
            //     }
            // }
        } 
        elseif ($act == "clear") 
        {
            if (isset($_SESSION['items'])) 
            {
                foreach ($_SESSION['items'] as $key => $val) 
                {
                    unset($_SESSION['items'][$key]);
                }
                unset($_SESSION['items']);
            }
        } 
         
        header ("location:" . $ref);
    }   
     
?>