<?php
$orderId = "A3";
$fullName = "Suppakit";
$trackNo = "234561";

$file = "tracking.txt";
$json = json_decode(file_get_contents($file), true);

$json[$orderId] = array("name" => $fullName, "tracking" => $trackNo);

if(file_put_contents($file, json_encode($json))) {
  $file = "tracking.txt";
  $json = json_decode(file_get_contents($file), true);
  echo $json["A3"]["tracking"];
  echo $json["A3"]["name"];
}

$file = "tracking.txt";
$json = json_decode(file_get_contents($file), true);
if (array_key_exists("A1", $json)) {
    echo "A1 EXIST";
} else {
  echo "A1 NOT EXIST";
}
if (array_key_exists("A4", $json)) {
    echo "A4 EXIST";
} else {
  echo "A4 NOT EXIST";
}
?>
