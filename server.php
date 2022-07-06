<?php
    session_start();

    $host = "localhost";
    $root = ""; //username from cpanel
    $pword = ""; //password from cpanel
    $database = "impactt"; //same name with the original name from local folder
    $connect = mysqli_connect($host, $root, $pword, $database);

    if(mysqli_connect_error()) {
        echo "Failed to connect to the server".mysqli_connect_error();
    }
?>