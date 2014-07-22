<?php
  //Gets the sports team from the super-global POST that gets sent along from the AJAX call.
  $sport = $_POST["sport"];
  
  //Defines the basketball team array.
  $basketball[0] = "Milwaukee Bucks";
  $basketball[1] = "Chicago Bulls";
  $basketball[2] = "Minnesota Timberwolves";
  
  //Defines the football team array.
  $football[0] = "Green Bay Packers";
  $football[1] = "Chicago Bears";
  $football[2] = "Minnesota Vikings";
 
  //Defines the baseball team array.
  $baseball[0] = "Milwaukee Brewers";
  $baseball[1] = "Chicago Cubs";
  $baseball[2] = "Chicago Whitesox";
 
  //Defines an empty variable that will return the javascript array.
  $teams = "";
  switch($sport){
  	case "Basketball":
  		$teams = generateAutocompleteArray($basketball);
  	break;
  
  	case "Football":
  		$teams = generateAutocompleteArray($football);
  	break;
  
  	case "Baseball":
  		$teams = generateAutocompleteArray($baseball);
  	break;
  }
  //Returns the teams in the appropriate javascript array format.
  echo $teams;
 
  //Function converts PHP array a string where it can be split into an array easily.
  function generateAutocompleteArray($teamArray){
  	$jsTeamArray = "";
  	
  	$teamCount = count($teamArray);
  	for($i=0; $i<$teamCount; $i++){
  		$jsTeamArray.= $teamArray[$i].',';
  	}
  	//Removes the remaining comma so you don't get a blank autocomplete option.
  	$jsTeamArray = substr($jsTeamArray, 0, -1);
          
  	return $jsTeamArray;
  }

  function loadSportsTeams(){
  //Gets the name of the sport entered.
  var sportSelected= $("#sport").val();
  var teamList = "";
    $.ajax({
        url: 'sportsTeams.php',
        type: "POST",
        async: false,
        data: { sport: sportSelected}
     }).done(function(teams){
        teamList = teams.split(',');
     });
  //Returns the javascript array of sports teams for the selected sport.
  return teamList;
}
 
?>