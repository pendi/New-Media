<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript" src="js/jquery-1.7.1min.js"></script>
</head>
<body>
<script>
 
/*autocomplete muncul setelah user mengetikan minimal2 karakter */
    $(function() {  
        $( "#product" ).autocomplete({
         source: "sourcedata.php",  
           minLength:1, 
        });
    });
</script>

<div>
    <label for="product">Product: </label>
    <input id="product"  />
</div>
</body>
</html>