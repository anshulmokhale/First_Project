<?php

//start session on web page
session_start();

//config.php

//Include Google Client Library for PHP autoload file
require_once 'vendor/autoload.php';

//Make object of Google API Client for call Google API
$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID
$google_client->setClientId('422920659368-oi4h7an9gaufknm1p8n8ege5qtog6jsg.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('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');

//Set the OAuth 2.0 Redirect URI
$google_client->setRedirectUri('http://localhost/Project/Log/login.php');

// to get the email and profile 
$google_client->addScope('email');

$google_client->addScope('profile');

?>