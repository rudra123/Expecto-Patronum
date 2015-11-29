<?php 
	include 'connect.inc.php';
	session_start();
	$merchant_id=$_GET['merchant_id'];
	$product_info=$_GET['product_info'];
	$amount=$_GET['amount'];

?>
<img src="images/paypal.png" />
<form action="paypal.php" method="post">
                                	<fieldset>
                                	Amount : <input type="number" name="amount" value="<?php echo $amount ?>"><br><br>
                                	Product id : <input type="text" name="product_info" value="<?php echo $product_info ?>"><br><br>
                                	Merchant id : <input type="number" name="merchant_id" value="<?php echo $merchant_id ?>"><br><br>
                                	Name : <input type="text" name="name">
                                	<input type="submit" value="Submit">
                                	</fieldset>
</form>