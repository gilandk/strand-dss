<?php

$string = "00:38:42,689";
$time   = explode(":", $string);

$hour   = $time[0] * 60 * 60 * 1000;
$minute = $time[1] * 60 * 1000;

$second = explode(",", $time[2]);
$sec    = $second[0] * 1000;
$milisec = $second[1];

$result = $hour + $minute + $sec + $milisec;

echo $result;
