<?php
    include('config.php');
    include('conn.php');

    $login_button = '';
    if(isset($_GET["code"])){
     $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);
     if(!isset($token['error'])){
      $google_client->setAccessToken($token['access_token']);
      $_SESSION['access_token'] = $token['access_token'];
      $google_service = new Google_Service_Oauth2($google_client);
      $data = $google_service->userinfo->get();
      //$data = $google_service->userinfo_v2_me->get();
      if(!empty($data['given_name'])){
       $_SESSION['user_first_name'] = $data['given_name'];
      }//end if
      if(!empty($data['family_name'])){
       $_SESSION['user_last_name'] = $data['family_name'];
      }//end if
      if(!empty($data['email'])){
       $_SESSION['user_email_address'] = $data['email'];
      }//end if
      if(!empty($data['gender'])){
       $_SESSION['user_gender'] = $data['gender'];
      }//end if
      if(!empty($data['picture'])){
       $_SESSION['user_image'] = $data['picture'];
      }//end if
     }//end if
    }//end if
    if(!isset($_SESSION['access_token'])){
     $login_button = '<a href="'.$google_client->createAuthUrl().'"><img src="images/gologinBtn.png" alt="google login"></a>';      
    }//end if

    $q = "INSERT INTO url (img) VALUE('".$_SESSION['user_image']."')";
    mysqli_query($link, $q);
    echo "inserted successful.";
    
    echo '<div class="panel-heading">Welcome User</div><div class="panel-body">';
    echo '<img src="'.$_SESSION["user_image"].'" class="img-responsive img-circle img-thumbnail" />';
    echo '<h3><b>Name :</b> '.$_SESSION['user_first_name'].' '.$_SESSION['user_last_name'].'</h3>';
    echo '<h3><b>Email :</b> '.$_SESSION['user_email_address'].'</h3>';

    echo '<h3><b> Rate Us:</b> <form action="POST"><div class="form-group"><label for="txtAreaRateUs"></label><textarea class="form-control" name="txtAreaRateUs" id="" rows="3"></textarea>';
    echo '<input type="button" value="Submit"></div></form>';
    echo '<h3><a href="logout.php">Logout</h3></div>';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <a href="disp-img.php">click me</a>
</body>

</html>