<?php
$item_no            = $_REQUEST['item_number'];
$item_transaction   = $_REQUEST['tx']; // Paypal transaction ID
$item_price         = $_REQUEST['amt']; // Paypal received amount
$item_currency      = $_REQUEST['cc']; // Paypal received currency type

$price = '10.00';
$currency='USD';
require 'connection.inc.php';
$q="insert into pay_merchant values ('',4,$item_price*$item_no,$_SESSION['org_id'],'"."$_SESSION['name']".','".$_SESSION['prod']."");"
if(!$qrun=mysql_query($q))
echo die(mysql_error());
?>