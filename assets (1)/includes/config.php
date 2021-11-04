<?php
define('DB_SERVER','iqserver.iq-hosting.com');
define('DB_USERNAME', 'huciq_useredu');
define('DB_PASSWORD', 'R9RTM)AQg+&!');
define('DB_NAME', 'huciq_university');
$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
// Check connection
if (mysqli_connect_errno())
{
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>