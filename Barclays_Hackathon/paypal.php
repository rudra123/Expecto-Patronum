<?php 
include 'connect.inc.php';
session_start();
	$paypal_url='https://www.sandbox.paypal.com/cgi-bin/webscr'; // Test Paypal API URL
	$paypal_id='dalwanisarup-facilitator@gmail.com'; // Business email ID
	$merchant_id=$_POST['merchant_id'];
$product_info=$_POST['product_info'];
$amount=$_POST['amount'];
$name=$_POST['name'];
$_SESSION['name']=$name;
$_SESSION['prod']=$product_info;
?>



    <form>
                                    <fieldset>
                                    Amount : <input type="number" value="<?php echo $amount ?>"><br><br>
                                    Product id : <input type="text" value="<?php echo $product_info ?>"><br><br>
                                    Merchant id : <input type="number" value="<?php echo $merchant_id ?>"><br><br>

                                    </fieldset>
                                </form>

<div class="col-sm-6 col-sm-offset-3">
                        	
                        	<div class="form-box">
                        		
	                            <div class="form-bottom">
				                  <form action="<?php echo $paypal_url; ?>" method="post" name="frmPayPal1">
    <input type="hidden" name="business" value="<?php echo $paypal_id; ?>">
    <input type="hidden" name="cmd" value="_xclick">
    <input type="hidden" name="item_name" value="PHPGang Payment">
    <input type="hidden" name="item_number" value="1">
    <input type="hidden" name="credits" value="510">
    <input type="hidden" name="userid" value="1">
	<input type="hidden" name="amount" value="<?php echo $amount ?>">
    <input type="hidden" name="cpp_header_image" value="http://www.phpgang.com/wp-content/uploads/gang.jpg">
    <input type="hidden" name="no_shipping" value="1">
    <input type="hidden" name="currency_code" value="USD">
    <input type="hidden" name="handling" value="0">
    <input type="hidden" name="cancel_return" value="http://localhost/Barclays_Hackathon/paycancel.php">
    <input type="hidden" name="return" value="http://localhost/Barclays_Hackathon/paysuccess.php">
    <input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
    <img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
    </form>  
                                
			                    </div>
                        	</div>
    
