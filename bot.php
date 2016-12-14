<?php
$access_token = 'e9wZ3HziGn+Uj6NGYN1O6vpvZf3jCRPO2kGa0/knH6k9DsOE1AJJGaJ+oBLCJjwHVu4lW2+hMFacime2HEk8JtrW5KhPZ0ZdRuA4RVMqkC70eT0UyVd3pEYhZizkiyKAqrR2ooZWaTd1WT/R/y2RUAdB04t89/1O/w1cDnyilFU=';

// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			$text = $event['message']['text'];
			// Get replyToken
			$replyToken = $event['replyToken'];
			
			$find_key = $text;
			// SEARCH
			$file = "http://sodaorder.com/sodasupport/tracking.txt";
			$json = json_decode(file_get_contents($file), true);
			if (array_key_exists($find_key, $json)) {
  			$my_respond = "Name : " . $json[$find_key]["name"] . ", Tracking : " . $json[$find_key]["tracking"];
			} else {
  			$my_respond = "ไม่พบข้อมูล : " . $find_key;
			}

			// Build message to reply back
			$messages = [
				{
				'type' => 'text',
				'text' => $my_respond
				},{
				'type' => 'text',
				'text' => $my_respond
				}
				
			];

			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => [$messages],
			];
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);
			curl_close($ch);

			echo $result . "\r\n";
		}
	}
}
echo "OK";
?>
