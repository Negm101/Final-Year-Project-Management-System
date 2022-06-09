<?php

define('DB_SERVER', 'SERVER_URL');
define('DB_USERNAME', 'SERVER_USERNAME');
define('DB_PASSWORD', 'SERVER_PASSWORD');
define('DB_NAME', 'DB_NAME');

 $db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if($db === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>