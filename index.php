<?php
//index.php
//Include Configuration File
include('config.php');
// $request = $client->get($url, ['http_errors' => false]);
$login_button = '';
if (isset($_GET["code"])) {
    $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);
    if (!isset($token['error'])) {
        $google_client->setAccessToken($token['access_token']);
        $_SESSION['access_token'] = $token['access_token'];
        $google_service = new Google_Service_Oauth2($google_client);
        $data = $google_service->userinfo->get();
        if (!empty($data['given_name'])) {
            $_SESSION['user_first_name'] = $data['given_name'];
        } //end if
        if (!empty($data['family_name'])) {
            $_SESSION['user_last_name'] = $data['family_name'];
        } //end if
        if (!empty($data['email'])) {
            $_SESSION['user_email_address'] = $data['email'];
        } //end if
        if (!empty($data['gender'])) {
            $_SESSION['user_gender'] = $data['gender'];
        } //end if
        if (!empty($data['picture'])) {
            $_SESSION['user_image'] = $data['picture'];
        } //end if
    } //end if
} //end if
if (!isset($_SESSION['access_token'])) {
    $login_button = '<a href="' . $google_client->createAuthUrl() . '"><img src="images/gologinBtn.png" alt="google login"></a>';
} //end if
?>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>PHP Login using Google Account</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        <br />
        <h2 align="center">PHP Login using Google Account</h2>
        <br />
        <div class="panel panel-default">
            <?php

            if ($login_button == '') {
                // echo '<div class="panel-heading">Welcome User</div><div class="panel-body">';
                // echo '<img src="'.$_SESSION["user_image"].'" class="img-responsive img-circle img-thumbnail" />';
                // echo '<h3><b>Name :</b> '.$_SESSION['user_first_name'].' '.$_SESSION['user_last_name'].'</h3>';
                // echo '<h3><b>Email :</b> '.$_SESSION['user_email_address'].'</h3>';
                // echo '<h3><a href="logout.php">Logout</h3></div>';
                // echo '<a href="display.php" class="btn btn-primary">Click me to Display at new page</a>';
                header('location: display.php');
                //header("location:display.php");

            } else {
                echo '<div align="center">' . $login_button . '</div>';
            } //end if else
            ?>
            <a href="disp-img.php">click me</a>
        </div>
    </div>
</body>

</html>