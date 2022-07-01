<?php
    session_start();

    $host = "localhost";
    $root = "root";
    $pword = "";
    $database = "impactt";
    $connect = mysqli_connect($host, $root, $pword, $database);

    if(mysqli_connect_error()) {
        echo "Failed to connect to the server".mysqli_connect_error();
    }
?>