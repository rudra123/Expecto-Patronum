<?php

include 'connect.inc.php';
session_start();

if(isset($_POST['submit'])){

	if(!empty($_POST['pay_list'])) {

            $pay = $_POST['pay_list'];
            $query_delete = "DELETE FROM `pay_options` WHERE orgid=".$_SESSION['org_id'];
            $query_rund = mysql_query($query_delete);
            if(!$query_rund)
                die("Could not update(delete) DB");
            foreach ( $pay as $pay_each )
            {
                $query_insert = "INSERT INTO `pay_options` VALUES (".$_SESSION['org_id'].",".$pay_each.")";
                $query_runi = mysql_query($query_insert);
                if(!$query_runi)
                    die("Could not update(insert) DB");
            }

}


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
                    <li class="active"><a href="payment_gateways.php"><span class="glyphicon glyphicon-check"></span>&nbspPayment Gateways</a></li>
                    <li><a href="merchant_reports.php"><span class="glyphicon glyphicon-print"></span>&nbspReports</a></li>
                    <li><a href="merchant_stats.php"><span class="glyphicon glyphicon-tasks"></span>&nbspStats</a></li>
                </ul>
                
            </div>
            </div>
        </nav>

        <div class = "page-header">
        	<h2>Payment Gateways</h2>
        	<p>(Select payment options)</p>
    	</div>

    	<div class="list-group">

    		<?php

    		$query = "SELECT * FROM `pay_gateway`";
    		$query_run = mysql_query($query);
    		echo '<form action="payment_gateways.php" method = "POST">';
    		if($query_run)
    		  {    		
    		  	$org_id = $_SESSION['org_id'];
    		  	$query1 = "SELECT `pay_options`.`pay_id` FROM `pay_options` WHERE `pay_options`.`orgid` = '".$org_id."' ";
    			$query_run1 = mysql_query($query1);
    		  	if($query_run1)
    		  	  {
    		  	    $pay_array = array();    
					while($row1 = mysql_fetch_assoc($query_run1)) {
    					$pay_array[] = $row1['pay_id'];
					}  

    		  	   while ($row = mysql_fetch_assoc($query_run)) {
 							echo '
 						<a href="#" class="list-group-item">

						<div class="media">
			        		<div class="checkbox pull-left">';
			        		//print_r($pay_array);
			        		if(in_array($row['pay_id'], $pay_array))
				    			echo '<label>
									<input type="checkbox" name="pay_list[]" value='.$row['pay_id'].' checked>				
								</label>';
							else
								echo '<label>
									<input type="checkbox" name="pay_list[]" value='.$row['pay_id'].'>				
								</label>';
							echo '</div>
							<p class="pull-left">
								<img class="img-thumbnail img-responsive" src="'.$row['thumbnail'].'" alt="Image" style="max-height:100px;float:left;margin-right:10px;">
							<span><strong>'.$row['pay_name'].'</strong></span>
							</p>
					
						
					</div>					
			        
			    </a>
			    

 						';
 					}
 				}
 				}
    		?>

    		
		</div>
		<!-- <button type="button" class="btn btn-primary" onclick="passoptions();">Submit</button> -->
			    <input type="submit" class="btn btn-primary" name="submit" value="Submit">
		</form>
	</div>     
        
</body>
		<br><br>
		<footer>
        	<div class="container">
        		<div class="row">
        			
        			<div class="col-sm-8 col-sm-offset-2">
        				<div class="footer-border"></div>
        				<p> Made by Nitesh Idnani </p>
        			</div>
        			
        		</div>
        	</div>
        </footer>




