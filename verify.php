<?php
$access_token = 'e9wZ3HziGn+Uj6NGYN1O6vpvZf3jCRPO2kGa0/knH6k9DsOE1AJJGaJ+oBLCJjwHVu4lW2+hMFacime2HEk8JtrW5KhPZ0ZdRuA4RVMqkC70eT0UyVd3pEYhZizkiyKAqrR2ooZWaTd1WT/R/y2RUAdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
?>
