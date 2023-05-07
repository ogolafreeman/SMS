<?php

/*
** PLEAE README THIS WHEN YOU ARE CHANGING THE HOSTNAME, USERNAME AND PASSWORD
* go to data/admin-data.php file. then change the host name of them too.

* FULLY COMPATIBLE WITH UBUNTU, RED HAT, FEDORA AND CENT OS SERVERS
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