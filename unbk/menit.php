<?
$startMinutes  = 145;
$d = floor ($startMinutes / 1440);
$h = floor (($startMinutes - $d * 1440) / 60);
$m = $startMinutes - ($d * 1440) - ($h * 60);

//echo "{$startMinutes}min converts to {$d}d {$h}h {$m}m";

$today = date('H:i:s');
$date = date('h:i:s A', strtotime($today)+36000);

echo "$today | $date";


$startTime = date("Y-m-d H:i:s");

//display the starting time
echo 'Starting Time: '.$startTime;

//add 1 hour to time
$cenvertedTime = date('H:i:s',strtotime('+1 hour',strtotime($startTime)));

//display the converted time
echo '<br>Converted Time (added 1 hour): '.$cenvertedTime;

//add 1 hour and 30 minutes to time
$cenvertedTime = date('H:i:s',strtotime('+1 hour +30 minutes',strtotime($startTime)));

//display the converted time
echo '<br>Converted Time (added 1 hour & 30 minutes): '.$cenvertedTime;

//add 1 hour, 30 minutes and 45 seconds to time
$cenvertedTime = date('H:i:s',strtotime('+1 hour +30 minutes +45 seconds',strtotime($startTime)));

//display the converted time
echo '<br>Converted Time (added 1 hour, 30 minutes  & 45 seconds): '.$cenvertedTime;

//add 1 day, 1 hour, 30 minutes and 45 seconds to time
$cenvertedTime = date('Y-m-d H:i:s',strtotime('+1 day +1 hour +30 minutes +45 seconds',strtotime($startTime)));

//display the converted time
echo '<br>Converted Time (added 1 day, 1 hour, 30 minutes  & 45 seconds): '.$cenvertedTime;
?>