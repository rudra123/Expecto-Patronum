<?php
require "connect.inc.php";


if(isset($_POST['orgname']) &&isset($_POST['password']) && isset($_POST['email']) && isset($_POST['cpassword']))
{ 
 
 if($_POST['password']==$_POST['cpassword'])
  {  
      
$orgname=$_POST['orgname'];
$email=$_POST['email'];
$password=$_POST['password'];
//$password_md5=md5($password);
if(!empty($orgname) && !empty($email) && !empty($password))
{
    $query_reg="SELECT * FROM merchant_reg WHERE org_name='".$orgname."'";
    if(mysql_query($query_reg))
    {
     $query2=mysql_query($query_reg);
     if(mysql_num_rows($query2)==1)
      {$flag3=1;$msg3="Organisation has Registered already";}  
    else{

         
    $query="INSERT INTO merchant_reg VALUES('','".$orgname."','".$email."','".md5($password)."')";
    if($query_run=mysql_query($query))
    {  $query_reg="SELECT * FROM merchant_reg WHERE org_name='".$orgname."'";
       $query_run=mysql_query($query_reg);
        $query_rows=mysql_num_rows($query_run);
        
         if($query_rows==1)
            {
                $user_name=mysql_result($query_run,0,'org_id');
                $email=mysql_result($query_run,0,'email');
                $_SESSION['org_id']=$user_name;
                $email=''.$email;
                $body='This is your user id : '.$user_name;          
                if(mail($email,'Merchant ID',$body))
                	header('Location: index.php');
            }
    }
    else {echo mysql_error(); }
   }

   }
   else {echo mysql_error(); die();}

}


}
else
{
    $flag1=1;
 $msg="Password fields doesnt match. Please re-enter fields ";

}
}
else{
    $flag2=1;
    $msg2="Fill all the fields";

}

?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Merchant Integration</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">

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

    <body>

        <!-- Top content -->
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                	
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <div class="page-header">
                                <h1><strong>PayEasy</strong></h1>
                            </div>
                                <div class="description">
                                    (Now, Paying Is Easy!)
                                </div>
                        </div>
                    </div>
                    
                        <div class="col-sm-6 col-sm-offset-3">
                        	
                        	<div class="form-box">
                        		<div class="form-top">
	                        		<div class="form-top-left">
	                        			<h3>Sign up now</h3>
	                            		<p>Fill in the form below to get instant access:</p>
	                        		</div>
	                        		<div class="form-top-right">
	                        			<i class="fa fa-pencil"></i>
	                        		</div>
	                            </div>
	                            <div class="form-bottom">
				                    <form role="form" action="signup.php" method="POST" class="registration-form">
				                    	<div class="form-group">
				                    		<label class="sr-only" for="orgname">First name</label>
				                        	<input type="text" name="orgname" placeholder="Organization name..." class="form-first-name form-control" id="orgname">
				                        </div>
				                        <div class="form-group">
				                        	<label class="sr-only" for="email">Email</label>
				                        	<input type="text" name="email" placeholder="Email..." class="form-email form-control" id="email">
				                        </div>
				                        <div class="form-group">
                                            <label class="sr-only" for="password">Password</label>
                                            <input type="password" name="password" placeholder="Password..." class="form-last-name form-control" id="password">
                                        </div>
                                        <div class="form-group">
                                            <label class="sr-only" for="cpassword">Confirm Password</label>
                                            <input type="password" name="cpassword" placeholder="Re-enter password..." class="form-last-name form-control" id="cpassword">
                                        </div>
                                        <button type="submit" class="btn">Sign me up!</button>
				                    </form>
                                    <div><?php if(isset($flag1) && $flag1==1) echo $msg;  if(isset($flag2) && $flag2==1) echo $msg2; if(isset($flag3) && $flag3==1) echo $msg3;?></div>
                                    <p>Already Resistered?<a href="index.php">Sign In!</a></p>
			                    </div>
                        	</div>
                        	
                        </div>
                    </div>
                    
                </div>
            </div>
            
        </div>

        <!-- Footer -->
        <footer>
        	<div class="container">
        		<div class="row">
        			
        			<div class="col-sm-8 col-sm-offset-2">
        				<div class="footer-border"></div>
        				<p>  </p>
        			</div>
        			
        		</div>
        	</div>
        </footer>

        <!-- Javascript -->
        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/scripts.js"></script>
        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>