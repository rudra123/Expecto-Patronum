<?php
session_start();
?>

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
    <script>
  function mySubmit() {
    var form = document.forms.myForm1;
    form.submit();
  }
   function mySubmit2() {
    var form = document.forms.myForm2;
    form.submit();
  }
  function mySubmit3() {
    var form = document.forms.myForm3;
    form.submit();
  }

</script>
     <form action="merchant_gateways.php" name="myForm1" method="post">
    <input type="hidden" name="merchant_id" value="7"\>
    <input type="hidden" name="product_info" value="Samsung Galaxy S5"\>
	<input type="hidden" name="amount" value="649.99"\>
	</form>
	<form action="merchant_gateways.php" name="myForm2" method="post">
    <input type="hidden" name="merchant_id" value="7"\>
    <input type="hidden" name="product_info" value="iPhone6"\>
	<input type="hidden" name="amount" value="749.99"\>
	</form>
	<form action="merchant_gateways.php" name="myForm3" method="post">
    <input type="hidden" name="merchant_id" value="7"\>
    <input type="hidden" name="product_info" value="Nokia Lumia"\>
	<input type="hidden" name="amount" value="749.00"\>
	</form>
<div class = "page-header">
        	<h2>Payment Gateways</h2>
        	<p>(Select payment options)</p>
    	</div>

<div class="container">
    <div class="row">
    	<div class="col-md-12">
			<div class="col-sm-6 col-md-4">
				<div class="thumbnail" >
					<h4 class="text-center"><span class="label label-info">Samsung</span></h4>
					<img src="http://placehold.it/650x450&text=Galaxy S5" class="img-responsive">
					<div class="caption">
						<div class="row">
							<div class="col-md-6 col-xs-6">
								<h3>Galaxy S5</h3>
							</div>
							<div class="col-md-6 col-xs-6 price">
								<h3>
								<label>$649.99</label></h3>
							</div>
						</div>
						<p>32GB, 2GB Ram, 1080HD, 5.1 inches, Android</p>
						<div class="row">
							<div class="col-md-6">
								<a class="btn btn-primary btn-product"><span class="glyphicon glyphicon-thumbs-up"></span>Like</a> 
							</div>
							<div class="col-md-6">
								<a href="#" onclick='mySubmit();'class="btn btn-success btn-product"><span class="glyphicon glyphicon-shopping-cart"></span>Buy</a></div>
						</div>

						<p> </p>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-md-4">
				<div class="thumbnail" >
					<h4 class="text-center"><span class="label label-info">Apple</span></h4>
					<img src="http://placehold.it/650x450&text=iPhone 6" class="img-responsive">
					<div class="caption">
						<div class="row">
							<div class="col-md-6 col-xs-6">
								<h3>iPhone 6</h3>
							</div>
							<div class="col-md-6 col-xs-6 price">
								<h3>
								<label>$749.99</label></h3>
							</div>
						</div>
						<p>32GB, 64Bit, 1080HD, 4.7 inches, iOS 8</p>
						<div class="row">
							<div class="col-md-6">
								<a class="btn btn-primary btn-product"><span class="glyphicon glyphicon-thumbs-up"></span>Like</a> 
							</div>
							<div class="col-md-6">
								<a href="#" onclick='mySubmit2();' class="btn btn-success btn-product" class="btn btn-success btn-product"><span class="glyphicon glyphicon-shopping-cart"></span>Buy</a></div>
						</div>

						<p> </p>
					</div>
				</div>
			</div>
            <div class="col-sm-6 col-md-4">
				<div class="thumbnail" >
					<h4 class="text-center"><span class="label label-info">Nokia</span></h4>
					<img src="http://placehold.it/650x450&text=Lumia 1520" class="img-responsive">
					<div class="caption">
						<div class="row">
							<div class="col-md-6 col-xs-6">
								<h3>Lumia 1520</h3>
							</div>
							<div class="col-md-6 col-xs-6 price">
								<h3>
								<label>$749.00</label></h3>
							</div>
						</div>
						<p>32GB, 4GB Ram, 1080HD, 6.3 inches, WP 8</p>
						<div class="row">
							<div class="col-md-6">
								<a class="btn btn-primary btn-product"><span class="glyphicon glyphicon-thumbs-up"></span> Like</a> 
							</div>
							<div class="col-md-6">
								<a href="#" onclick='mySubmit3();'  class="btn btn-success btn-product" class="btn btn-success btn-product"><span class="glyphicon glyphicon-shopping-cart"></span>Buy</a></div>
						</div>

						<p> </p>
					</div>
				</div>
			</div>
            
        </div> 

	</div>
</div>