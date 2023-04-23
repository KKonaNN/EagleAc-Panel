<?php
// Replace these with your own values

if (isset($_SESSION['user'])) {
    header('Location: dashboard.php');
    exit();
}

$clientId = 'YOUR_CLIENT_ID';
$clientSecret = 'YOUR_CLIENT_SECRET';
$redirectUri = 'https://127.0.0.1/MrLuaPanel/src/process-oauth.php';

// Build the authorization URL
$authUrl = 'https://discord.com/api/oauth2/authorize?' . http_build_query([
    'client_id' => $clientId,
    'redirect_uri' => $redirectUri,
    'response_type' => 'code',
    'scope' => 'identify' // Replace with the scopes your bot needs
]);

// Redirect the user to the authorization page
header('Location: ' . $authUrl);
exit;
?>