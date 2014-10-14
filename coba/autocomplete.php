<!doctype html>
  
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Demo Jquery UI autocomplete Candralab Coding Studio</title>
    <!-- <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" /> -->
    <script src="../js/jquery-1.7.1.min.js"></script>
    <!-- <script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script> -->
 
<script> 
/*autocomplete muncul setelah user mengetikan minimal2 karakter */
    $(function() {
        availableSports = ["Basketball","Football","Baseball"];
      $("#sport").autocomplete({
          source: availableSports
      });
    });
</script>
</head>
<form action="sportsTeams.php" method="post">
<body>
    Sport: <input type="text" id="sport" name="sport"></input>
    Sports Team: <input type="text" id="sportsTeam" name="sportsTeam"></input>    
</body>
</form> 
</html>