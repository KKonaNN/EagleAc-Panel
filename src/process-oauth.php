<?php
session_start();
// Replace these with your own values
$clientId = 'YOUR_CLIENT_ID';
$clientSecret = 'YOUR_CLIENT_SECRET';
$redirectUri = 'https://127.0.0.1/MrLuaPanel/src/process-oauth.php';

// Check for errors
if (isset($_GET['error'])) {
    header('Location: index.php');
    exit();
}

// Exchange the authorization code for an access token
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://discord.com/api/oauth2/token');
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query([
    'client_id' => $clientId,
    'client_secret' => $clientSecret,
    'code' => $_GET['code'],
    'grant_type' => 'authorization_code',
    'redirect_uri' => $redirectUri,
    'scope' => 'identify' // Replace with the scopes your bot needs
]));

curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$response = curl_exec($ch);
curl_close($ch);

// Parse the response
$accessToken = json_decode($response)->access_token;
$_SESSION['access_token'] = $accessToken;
// Make API requests with the access token
// For example:
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://discord.com/api/users/@me');
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Authorization: Bearer ' . $accessToken
]);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$response = curl_exec($ch);
curl_close($ch);

// Handle the response
$user = json_decode($response);
$_SESSION['user'] = $user;

// Redirect to the dashboard
header('Location: dashboard.php');
?>
