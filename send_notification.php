<?php

$url = "https://fcm.googleapis.com/fcm/send";

$server_key = "AAAAk8_YSyI:APA91bFD_O68oO4S3nHZyINl5-wyTYScaPrxAGfFS22Iv_3a5WhUsTuwKdkxmvJOmPdL8tNen6bWxTXWvhOKIAXJcKnCA5gYyNbzyiyxygLa8kloMgXrrlMJ1vNIw7LXszncGx7-IKjx";

$message = array(
    "data" => array(
    'body' => 'Hello, I am Akalanka Kaushalya Click Me',
    'title' => 'This is Firebase Web Push Notification',
    'icon' => 'https://avatars.githubusercontent.com/u/73414070?v=4',
    'image' => 'https://avatars.githubusercontent.com/u/73414070?v=4',
    'sound' => 'https://assets.mixkit.co/active_storage/sfx/2869/2869-preview.mp3',
    'click_action' => 'https://github.com/AkalankaKaushalya'
    ),
    /*Array of device tokens*/
    "registration_ids" => [
        "fi2X0ri2nM1Ss0slchIPH9:APA91bGCTDCZkhXt5SXBpEKnJG5hz_LUmTfQ-zxURfQl03pcslga-JbMS2HwJ9ptODdl7Zoi5jthu5XtY0F_Jb2jaibWErSO_rFpj9LvAyl228GHCwQ_QUFLBJFIlcnXl4gJWl1mI3WT",
        "cTQl7950RKt0YcOkU2Jlhq:APA91bFqsLOd0Rx8Fujdv75RHKhu0RSZ6pxz4qopuqeO_dyUYghTT7j5xp4tRoQgr-_EmoUQRl2OCte2Qa9gIr8DVpKCBbSiY3rJyI7sH9-SEjHmlU1XCIxXC6YMzNgaBTzPLmapdge3"
    ],
);

$options = array(
    CURLOPT_URL => $url,
    CURLOPT_POST => true,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_SSL_VERIFYPEER => false,
    CURLOPT_HTTPHEADER => array(
        'Authorization: key=' . $server_key,
        'Content-Type: application/json'
    ),
    CURLOPT_POSTFIELDS => json_encode($message)
);

$curl = curl_init();
curl_setopt_array($curl, $options);
$result = curl_exec($curl);

if ($result === false) {
    echo 'Curl error: ' . curl_error($curl);
} else {
    echo $result;
}


curl_close($curl);


echo $result;
