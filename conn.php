<?php
    $link = mysqli_connect("localhost", 'root', '', 'demo45');
    if(!mysqli_connect_errno($link)){
        echo "connected";
    }else{
        echo "failed to connect: ".mysqli_connect_errno();
    }
?>