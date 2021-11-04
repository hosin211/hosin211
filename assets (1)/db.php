<?php

/* Database credentials. Assuming you are running MySQL

server with default setting (user 'root' with no password) */

define('DB_SERVER', 'iqserver.iq-hosting.com');

define('DB_USERNAME', 'huciq_useredu');

define('DB_PASSWORD', 'R9RTM)AQg+&!');

define('DB_NAME', 'huciq_university');

 

/* Attempt to connect to MySQL database */

$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

$link->set_charset("utf8");

// Check connection

if($link === false){

    die("ERROR: Could not connect. " . mysqli_connect_error());

}