<?php
//connect to your database
  mysql_connect("localhost","root","password");
  mysql_select_db("world");
//harus selalu gunakan variabel term saat memakai autocomplete,
//jika variable term tidak bisa, gunakan variabel q
$q = trim(strip_tags($_GET['q']));
 
$qstring = "SELECT Code,Name FROM country WHERE Name LIKE '".$q."%'";
//query database untuk mengecek tabel Country 
$result = mysql_query($qstring);
 
while ($row = mysql_fetch_array($result))
{
    $row['value']=htmlentities(stripslashes($row['Name']));
    $row['id']=(int)$row['Code'];
//buat array yang nantinya akan di konversi ke json
    $row_set[] = $row;
}
//data hasil query yang dikirim kembali dalam format json
echo json_encode($row_set);
?>