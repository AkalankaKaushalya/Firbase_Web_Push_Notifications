<?php

$url = "https://fcm.googleapis.com/fcm/send";

$server_key = "AAAAk8_xxxxxxxxxxx";

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
        "xxxT",
        "xxx"
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
