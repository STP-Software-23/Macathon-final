<?php
$host = "localhost";
$username = "fahmy";
$password = "test1234";
$dbname = "stp";


$mysqli = new mysqli(hostname:$host,
                    username: $username,
                    password: $password,
                    database: $dbname);
                    
if ($mysqli->connect_errno) {
    die("Connection error: " . $mysqli->connect_error);
}

return $mysqli;