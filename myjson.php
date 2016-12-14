<?php
$user = "bross";
$first = "Bob";
$last = "Ross";

$file = "tracking.txt";
$json = json_decode(file_get_contents($file), true);

$json[$user] = array("first" => $first, "last" => $last);

if(file_put_contents($file, json_encode($json))) {
  $file = "tracking.txt";
  $json = json_decode(file_get_contents($file), true);
  echo $json . "OK";
}
?>
