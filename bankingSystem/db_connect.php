<?php
$warning = " ";

include('config.php');

error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
ini_set('display_errors', 1);

$db = mysqli_connect($hostname, $username, $password, $database);

if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL" . mysqli_connect_error();

    exit();
}
?>

