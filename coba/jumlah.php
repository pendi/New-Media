<!DOCTYPE HTML>

<html>

<head>

<meta http-equiv="content-type" content="text/html" />

<meta name="author" content="Jayuhni" />



<title>Untitled 2</title>

</head>



<body>

Contoh Tambah2an





<input type="text" id="type1" onkeyup="kalkulatorTambah(this.value,getElementById('type2').value);" />x

<input type="text" id="type2" onkeyup="kalkulatorTambah(getElementById('type1').value,this.value);" />

=

<span id="result">

</span><br/>

<input type="text" id="type1" onkeyup="kalkulatorTambah(this.value,getElementById('type2').value);" />x

<input type="text" id="type2" onkeyup="kalkulatorTambah(getElementById('type1').value,this.value);" />

=

<span id="result">

</span>

<script>
function kalkulatorTambah(type1,type2){
var hasil = eval(type1) * eval(type2);
document.getElementById('result').innerHTML = hasil;
}
</script>



</body>

</html>



