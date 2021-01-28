<?php
// //logout.php
// include('config.php');
// //Reset OAuth access token
// $google_client->revokeToken();
// //Destroy entire session data.
// session_destroy();
// //redirect page to index.php
// header('location:index.php');
//to know more - https://www.thapatechnical.com/2020/04/logoutphp-page-code-for-google-oauth.html
include('config.php');
//$accesstoken=$_SESSION['access_token'];

//Reset OAuth access token
$google_client->revokeToken($_SESSION['access_token']);

//Destroy entire session data.
session_destroy();

//redirect page to index.php
header('location:index.php');
?>
