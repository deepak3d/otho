<?php

//start session on web page
session_start();

//config.php

//Include Google Client Library for PHP autoload file
require_once 'vendor/autoload.php';

//Make object of Google API Client for call Google API
$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID
// $google_client->setClientId('Your Clint ID.apps.googleusercontent.com');
$google_client->setClientId('40519804184-2f1m0spf9nuri32srb9k2a5tva43k8od.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key
// $google_client->setClientSecret('Your Client Secret Key');
$google_client->setClientSecret('IfeEvnKGxfYrlTMXlCgFAqF_');

//Set the OAuth 2.0 Redirect URI
// $google_client->setRedirectUri('Your exact location where you want the code to be run');
$google_client->setRedirectUri('http://localhost/google-o/index.php');

//to get refresh token
//$google_client->setAccessType("offline");
//$google_client->setApprovalPrompt('force');

// to safely disable SSL
$guzzleClient = new \GuzzleHttp\Client(array( 'curl' => array( CURLOPT_SSL_VERIFYPEER => false, ), ));
$google_client->setHttpClient($guzzleClient);

// to get the email and profile 
$google_client->addScope('email');

$google_client->addScope('profile');

?>