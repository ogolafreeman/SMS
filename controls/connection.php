<?php

$host = "127.0.0.1";
$username   = "root";
$password   = "";
$dbname     = "ims-003";

// Create connection
$con = mysqli_connect($host, $username, $password, $dbname);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
?>