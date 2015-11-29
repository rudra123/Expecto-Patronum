<?php

$conn_err='Could not connect to database';

$mysql_server='localhost';
$mysql_user='root';
$mysql_pass=' ';

$mysql_db='hackathon';

if(!mysql_connect($mysql_server,$mysql_user,$mysql_pass) || !mysql_select_db($mysql_db))
	die($conn_err);


?>

