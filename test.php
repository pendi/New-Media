<?php 
// function convertToHoursMins($time, $format = '%d:%d') {
//     settype($time, 'integer');
//     if ($time < 1) {
//         return;
//     }
//     $hours = floor($time / 60);
//     $minutes = ($time % 60);
//     return sprintf($format, $hours, $minutes);
// }

// echo convertToHoursMins(555, '%01d hours %01d minutes');

function secondsToWords($seconds)
{
    $ret = "";

    /*** get the days ***/
    $days = intval(intval($seconds) / (60 * 8));
    if($days> 0)
    {
        $ret .= "$days days ";
    }

    /*** get the hours ***/
    $hours = (intval($seconds) / 60) % 8;
    var_dump(intval($seconds));
    exit();
    if($hours > 0)
    {
        $ret .= "$hours hours ";
    }

    /*** get the minutes ***/
    $minutes = intval($seconds) % 60;
    if($minutes > 0)
    {
        $ret .= "$minutes minutes ";
    }

    /*** get the seconds ***/
    // $seconds = intval($seconds) % 60;
    // if ($seconds > 0) {
    //     $ret .= "$seconds seconds";
    // }

    return $ret;
}

# Transform hours like "1:45" into the total number of minutes, "105".
function hoursToMinutes($hours)
{
  if (strstr($hours, ':'))
  {
    # Split hours and minutes.
    $separatedData = split(':', $hours);

    $minutesInHours    = $separatedData[0] * 60;
    $minutesInDecimals = $separatedData[1];

    $totalMinutes = $minutesInHours + $minutesInDecimals;
  }
  else
  {
    $totalMinutes = $hours * 60;
  }

  return $totalMinutes;
}

# Transform minutes like "105" into hours like "1:45".
function minutesToHours($minutes)
{
  $hours          = floor($minutes / 60);
  $decimalMinutes = $minutes - floor($minutes/60) * 60;

  # Put it together.
  $hoursMinutes = sprintf("%d:%02.0f", $hours, $decimalMinutes);
  return $hoursMinutes;
}

// echo hoursToMinutes("1:45");

// print secondsToWords(90);
echo "<pre>";
$str = "2h30m";
$data = str_split($str);

?>