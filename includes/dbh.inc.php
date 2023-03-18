<?php

    $serverName = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "loginsystemDB";

    $conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);

    if(!$conn){
        die("Connection Failed: " . mysqli_connet_error());
    }