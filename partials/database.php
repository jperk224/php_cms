<?php

$db_host = "localhost";
$db_name = "php_cms";
$db_user = "cms_www";
$db_password = "cn3WUv8WnxTwvzPo";

$connection = mysqli_connect($db_host, $db_user, $db_password, $db_name);

if (!$connection) {
    echo "Error: Unable to connect to MySQL." . nl2br('<br>');
    echo "Debugging errno: " . mysqli_connect_errno() . nl2br('<br>'); //Error code
    echo "Debugging error: " . mysqli_connect_error() . nl2br('<br>'); //Error text
    exit;
}

// echo "Success: A proper connection to MySQL was made!" . nl2br('<br>');
// echo "Host information: " . mysqli_get_host_info($connection) . nl2br('<br>');
