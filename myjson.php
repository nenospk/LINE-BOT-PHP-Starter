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
if (in_array('A1', $json)) {
    echo "EXIST";
} else {
  echo "NOT EXIST";
}
?>
