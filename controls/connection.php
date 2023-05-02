<?php

/*
** PLEAE README THIS WHEN YOU ARE CHANGING THE HOSTNAME

* go to data/admin-data.php file. then change the host name of them too.
*/


$host = "127.0.0.1";
$username   = "root";
$password   = "";
$dbname     = "sms";

// Create connection
$con = mysqli_connect($host, $username, $password, $dbname);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
?>