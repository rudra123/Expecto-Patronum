<?php

include 'connect.inc.php';
session_start();

echo 'Merchant Analytics here';

$query="SELECT * FROM pay_merchant WHERE merchant_id=".$_SESSION['org_id'];
$result=mysql_query($query);
if(!$result) echo mysql_error();
$num=mysql_num_rows($result);

$que="SELECT COUNT('pay_op_id') AS gate_no FROM pay_merchant";
$querun=mysql_query($que);
$no_gate=mysql_result($querun,0,'gate_no');

?>

<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>PayEasy|Payment Gateways</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">

        <style type="text/css">

        span{
            text-align: center;
            vertical-align: middle;
            line-height: 90px; 
        }

        .navbar-inverse .navbar-nav>li>a {
           color: #FFFFFF;
        }

        .navbar-inverse .navbar-brand {
            color: #FFFFFF;
        }

        .navbar-inverse .navbar-nav>.active>a{
            color: #fff;
            background-color: #4B0082;
        }

        li { border-left: 1px solid #000000; }


        </style>


        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="assets/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">

    </head>
</html>
<body>
    <br>
    <div class="container">
        <nav class="navbar navbar-inverse navbar-fixed-top" style="background-color:#9400D3;">
            <div class="container-fluid">
                <div class="navbar-header">    
                   <a class="navbar-brand" href="#">PayEasy</a>
                </div>
            <?php echo '  '; ?>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>&nbspLog Out</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="payment_gateways.php"><span class="glyphicon glyphicon-check"></span>&nbspPayment Gateways</a></li>
                    <li class="active"><a href="merchant_reports.php"><span class="glyphicon glyphicon-print"></span>&nbspReports</a></li>
                    <li><a href="merchant_stats.php"><span class="glyphicon glyphicon-tasks"></span>&nbspStats</a></li>
                </ul>
                
            </div>
            </div>
        </nav>

        <div class = "page-header">
            <h2>Transaction report</h2>
            
        </div>

<p style="text-align: left">Summary of all transactions : </p>
<br>
<table class="table table-hover table-bordered">
<thead>
    <tr>
        <td>Customer Name</td>
        <td>Amount(in Rs)</td>
        <td>Name of Gateway</td>
        <td>Product Name</td>
    </tr>
</thead>
<tbody>
<?php
$i=0;
$sum=0;
while ($i < $num) {
$f1=mysql_result($result,$i,"cust_name"); 
$f2=mysql_result($result,$i,"amount");
$sum=$sum+$f2;
$pid=mysql_result($result,$i,"pay_op_id");
$f4=mysql_result($result,$i,"prod_name");
$query="SELECT pay_name FROM pay_gateway WHERE pay_id=".$pid;
$qrun=mysql_query($query);
if(!$qrun) echo mysql_error();

$f3=mysql_result($qrun,0,"pay_name");?> 
<tr>
<td>
<font face='Arial, Helvetica, sans-serif'><?php echo $f1;  ?></font>
</td>
<td>
<font face='Arial, Helvetica, sans-serif'><?php echo $f2; ?></font>
</td>
<td>
<font face='Arial, Helvetica, sans-serif'><?php echo $f3; ?></font>
</td>
<td>
<font face='Arial, Helvetica, sans-serif'><?php echo $f4; ?></font>
</td>
</tr>
<?php $i++;}?>
</tbody>
</table>
<br><br>


<p style="text-align: left ">Gateway Analytics : </p>
<br>
<div class="row">
    <div class="col-sm-5">
        <img class="img-circle" src="images/transaction.jpeg" >
            Total Transactions:<?php echo $num;?>
    </div>
    <div class="col-sm-5">
        <img class="img-circle" src="images/amount.jpeg">
            Total Amount to be collected:<?php echo $sum; ?>
    </div>
</div>

</div>
</body>
</html>




