<?php 
    $servername = 'localhost';
    $username = "root";
    $password = "";
    $databasename = "database1";

    $conn = new mysqli($servername, $username, $password,$databasename);

    if ($conn->connect_error) {
        die("Connection failed.$conn->connect_error");
    } 

    echo "";
?>