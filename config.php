<?php

define('DB_SERVER', 'testdatabase.cn2f8k3fvr90.us-east-2.rds.amazonaws.com');
define('DB_USERNAME', 'admin');
define('DB_PASSWORD', '522ZUkrZgdhA3n9JxeGC');
define('DB_NAME', 'fybtest');

 $db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if($db === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>