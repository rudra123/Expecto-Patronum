<?php

session_start();

include 'connect.inc.php';

?>


<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Merchant Integration|Payment Gateways</title>

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

    

        <script>
  function onSubmit() {
    var form = document.forms.myForm;
    form.submit();
  }
   

</script>




    </head>

<body>
	
     <form action="PayUMoney_form.php" name="myForm" method="POST">
    <input type="hidden" name="merchant_id" value="<?php if(isset($_POST['merchant_id'])){ echo $_POST['merchant_id'];} ?>" \>
    <input type="hidden" name="product_info" value="<?php if(isset($_POST['product_info'])){ echo $_POST['product_info'];} ?>"\>
    <input type="hidden" name="amount" value="<?php if(isset($_POST['amount'])){ echo $_POST['amount'];} ?>"\>
    </form>


    <div class="container">
    	
    		<?php

              if(isset($_POST['merchant_id'])&&isset($_POST['product_info'])&&isset($_POST['amount']))
                {
                 $merchant_id = $_POST['merchant_id'];
                 $product_info=$_POST['product_info'];
                 $amount=$_POST['amount'];

                 
                 echo '<div class = "page-header">
                <h2>';
                
                
               $query = "SELECT `merchant_reg`.`org_name` FROM `merchant_reg` WHERE `merchant_reg`.`org_id` = '".$merchant_id."' ";
                $query_run = mysql_query($query);
                if($query_run)
                    {
                        $name = mysql_result($query_run, 0,'org_name');
                        echo $name.' Gateways</h2>';
                    }
                else
                    echo 'Merchant does not exists'; ?>
            
        </div>

        <div class="list-group">

                
                <?php
                $org_id = $_SESSION['org_id'];
                $query = "SELECT `pay_options`.`pay_id` FROM `pay_options` WHERE `pay_options`.`orgid` = '".$merchant_id."' ";
                $query_run = mysql_query($query);
                if($query_run)
                  {
                    $pay_array = array();    
                    while($row1 = mysql_fetch_assoc($query_run)) {

                        $query1 = "SELECT `pay_gateway`.`pay_name`, `pay_gateway`.`thumbnail` FROM `pay_gateway` WHERE `pay_gateway`.`pay_id` = '".$row1['pay_id']."' ";
                        $query_run1 = mysql_query($query1);

                        if($query_run1)
                           {

                            $pay_name=mysql_fetch_assoc($query_run1);
                
                            echo '
                            <div class="list-group-item">

                            <div class="media">
                            <div class="checkbox pull-left">';
                    
                            echo '</div>
                            <p class="pull-left">
                                <img class="img-thumbnail img-responsive" src="'.$pay_name['thumbnail'].'" alt="Image" style="max-height:100px;float:left;margin-right:10px;">
                            <span><strong>'.$pay_name['pay_name'].'</strong></span>
                            </p>

                            <div class="pull-right" style="text-align: center;
vertical-align: middle;
line-height: 90px;"" >';


                            $pay_id=$row1['pay_id'];
                            if($pay_id==6) echo '<a type="button" href="PayUMoney_form.php?merchant_id='.$merchant_id.'&product_info='.$product_info.'&amount='.$amount.' "class="btn btn-primary">Pay</a>';
                            else if($pay_id==4) echo '<a type="button" href="payname.php?merchant_id='.$merchant_id.'&product_info='.$product_info.'&amount='.$amount.'" class="btn btn-primary">Pay</a>';
                            else   echo '<a type="button" href="#" class="btn btn-primary">Pay</a>';
                            
                                


                         echo'   </div>
                    
                        
                    </div>                  
                    
                </div>    ';
                    
                           }


                    }
                    }  
}
            ?>
    		
		</div>
		<!-- <button type="button" class="btn btn-primary" onclick="passoptions();">Submit</button> -->
		</form>
	</div> 
     <form action="PayUMoney_form.php" name="myForm" method="post">
    <input type="hidden" name="merchant_id" value="<?php echo $merchant_id; ?>"\>
    <input type="hidden" name="product_info" value="<?php echo $product_info; ?>"\>
    <input type="hidden" name="amount" value="<?php echo $amount; ?>"\>
    </form>

        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        
        
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

</html>