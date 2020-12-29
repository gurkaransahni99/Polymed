<?php
//Database credentials
$dbHost     = 'localhost';
$dbUsername = 'lol';
$dbPassword = 'karan1122';
$dbName     = 'polymed';	 

//Connect and select the database
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
?>