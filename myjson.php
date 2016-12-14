<?php
$orderId = "A3";
$fullName = "Suppakit";
$trackNo = "234561";
// INPUT
$file = "tracking.txt";
$json = json_decode(file_get_contents($file), true);
$json[$orderId] = array("name" => $fullName, "tracking" => $trackNo);
if(file_put_contents($file, json_encode($json))) {
  $file = "tracking.txt";
  $json = json_decode(file_get_contents($file), true);
  echo $json["A3"]["tracking"];
  echo $json["A3"]["name"];
}

$find_key = "A3";
// SEARCH
$file = "tracking.txt";
$json = json_decode(file_get_contents($file), true);
if (array_key_exists($find_key, $json)) {
  echo $find_key . " EXIST";
} else {
  echo $find_key . " NOT EXIST";
}
?>
