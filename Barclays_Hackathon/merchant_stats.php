<?php

include 'connect.inc.php';

ob_start();
session_start();

      require "connect.inc.php";
       $merchant_id=$_SESSION['org_id'];


      $query="SELECT pay_op_id,COUNT(pay_op_id) AS count
              FROM pay_merchant
              WHERE merchant_id=$merchant_id
              GROUP BY pay_op_id
              ";

      if(!$run=mysql_query($query))
      echo mysql_error();
      $p="";
      $i=0;
      $rows_num=mysql_num_rows($run);
      while ($row = mysql_fetch_assoc($run)) {
      $count=$row['count'];

     $name_q="SELECT pay_name FROM pay_gateway WHERE pay_id=".$row['pay_op_id'];
     $run_n=mysql_query($name_q);
     $name=mysql_result($run_n,0,'pay_name');
     
      

    $p=$p."['".$name."',".$count."]";
     
     $i++;
    if($i!=$rows_num) $p=$p.",";



      }





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
         <script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Gateway', 'Number of Clients'],
          <?php echo $p; ?>

        ]);

        var options = {
          title: 'Different Gateways for your Client',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>


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
                    <li><a href="merchant_reports.php"><span class="glyphicon glyphicon-print"></span>&nbspReports</a></li>
                    <li class="active"><a href="merchant_stats.php"><span class="glyphicon glyphicon-tasks"></span>&nbspStats</a></li>
                </ul>
                
            </div>
            </div>
        </nav>

        <div class = "page-header">
            <h2>Transaction Reports</h2>
            <p>(View transaction statistics)</p>
        </div>

    </div> 
    <div class="row">
        <div class="col col-sm-6 col-sm-offset-3">
         <div id="piechart_3d" style="width: 900px; height: 500px;"></div>
          <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        </div>
    </div>    
        
</body>
        <br><br>
        <footer>
            <div class="container">
                <div class="row">
                    
                    <div class="col-sm-8 col-sm-offset-2">
                        <div class="footer-border"></div>
                        <p> </p>
                    </div>
                    
                </div>
            </div>
        </footer>