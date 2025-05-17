<?php


$webhookurl = "https://discord.com/api/webhooks/1366932078813249536/tVFwteVbLCZtTqBSrp9gClp0YQLk5HMwTHysOic_aZSKQAfYi8bVFN-64Z28hQe2Oeej";

$message = $_POST['message'];
$username = $_POST['username'];


$data = [
    "content" => $message,
    "username" => $username,
];


$json_data = json_encode($data);
$ch = curl_init($webhookurl);


curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);


$response = curl_exec($ch);


curl_close($ch);


