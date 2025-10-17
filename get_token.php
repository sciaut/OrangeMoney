<?php
$client_id = 'tOAqoAUoR9nbsozXAUMRL5Ai1RFhQOW1';
$client_secret = '*********';
$token_url = 'https://api.orange.com/oauth/v3/token';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $token_url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'grant_type=client_credentials');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Authorization: Basic '.base64_encode($client_id.':'.$client_secret),
    'Content-Type: application/x-www-form-urlencoded'
]);

$response = curl_exec($ch);
curl_close($ch);

$data = json_decode($response, true);
$access_token = $data['access_token'] ?? '';

echo "Access Token: ".$access_token;
