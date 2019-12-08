<?php

require('config.php');
$conn = mysql_connect($hostname, $username, $password)
	or die ("Could not connect to mysql");

mysql_select_db($database);
?>