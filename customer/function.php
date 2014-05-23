<!-- <html>
<script type="text/javascript">
function total()
{
	var jumlah=0;
	var harga;


	if(document.getElementById("price").selected)
	{
		harga=document.getElementById("price").value;
		jumlah=jumlah+parseInt(harga);
	}
	if(document.getElementById("qty").selected)
	{
		harga=document.getElementById("qty").value;
		jumlah=jumlah+parseInt(harga);
	}
	if(document.getElementById("menu3").checked)
	{
		harga=document.getElementById("menu3").value;
		jumlah=jumlah+parseInt(harga);
	}
	document.getElementById("sub_total").value=jumlah;
}

function inputan (){
var sub_total;
var bayar;
var kembalian;
sub_total = document.getElementById("sub_total").value;
bayar = document.getElementById("bayar").value;
kembalian = parseInt(bayar)-parseInt(total);
document.getElementById("kembali").innerHTML=kembalian;
} -->

<script type="text/javascript">
	function startCalc()
	{
		interval=setInterval("calc()",1)
	}

	function calc()
	{
		one=document.autoSumForm.firstBox.value;
		two=document.autoSumForm.secondBox.value;
		document.autoSumForm.thirdBox.value=(one*1)+(two*1)
	}

	function stopCalc()
	{
		clearInterval(interval)
	}
</script>

<form name="autoSumForm">
<input type=text name="firstBox" value="" onFocus="startCalc();" onBlur="stopCalc();"> +
<input type=text name="secondBox" value="" onFocus="startCalc();" onBlur="stopCalc();"> =
<input type=text name="thirdBox">
</form>