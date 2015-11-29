<?php
// Merchant key here as provided by Payu
$MERCHANT_KEY = "OwGF14";

// Merchant Salt as provided by Payu
$SALT = "RjWAdXh0";

// End point - change to https://secure.payu.in for LIVE mode
$PAYU_BASE_URL = "https://test.payu.in";

$action = '';
$merchant_id=$_GET['merchant_id'];
$product_info=$_GET['product_info'];
$amount=$_GET['amount'];
$posted = array();
if(!empty($_POST)) {
    //print_r($_POST);
  foreach($_POST as $key => $value) {    
    $posted[$key] = $value; 
	
  }
}

$formError = 0;

if(empty($posted['txnid'])) {
  // Generate random transaction id
  $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
} else {
  $txnid = $posted['txnid'];
}
$hash = '';
// Hash Sequence
$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
if(empty($posted['hash']) && sizeof($posted) > 0) {
  if(
          empty($posted['key'])
          || empty($posted['txnid'])
          || empty($posted['amount'])
          || empty($posted['firstname'])
          || empty($posted['email'])
          || empty($posted['phone'])
          || empty($posted['productinfo'])
          || empty($posted['surl'])
          || empty($posted['furl'])
		  || empty($posted['service_provider'])
  ) {
    $formError = 1;
  } else {
    $posted['productinfo'] = json_encode(json_decode('{"name":"'.$product_info.'","merchant_id":"'.$merchant_id.'","description":"'.$product_info.'","value":"1","isRequired":"false"}'));
	$hashVarsSeq = explode('|', $hashSequence);
    $hash_string = '';	
	foreach($hashVarsSeq as $hash_var) {
      $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
      $hash_string .= '|';
    }

    $hash_string .= $SALT;


    $hash = strtolower(hash('sha512', $hash_string));
    $action = $PAYU_BASE_URL . '/_payment';
  }
} elseif(!empty($posted['hash'])) {
  $hash = $posted['hash'];
  $action = $PAYU_BASE_URL . '/_payment';
}
?>
<html>
  <head>
  <script>
    var hash = '<?php echo $hash ?>';
    function submitPayuForm() {
      if(hash == '') {
        return;
      }
      var payuForm = document.forms.payuForm;
      payuForm.submit();
    }
  </script>
  </head>
  <body onload="submitPayuForm()">
    <h2>PayU Form</h2>
    <br/>
    <?php if($formError) { ?>
	
      <span style="color:red">Please fill all mandatory fields.</span>
      <br/>
      <br/>
    <?php } ?>
    <form action="<?php echo $action; ?>" method="post" name="payuForm">
      <input  name="key" value="<?php echo $MERCHANT_KEY ?>" />
      <input  name="hash" value="<?php echo $hash ?>"/>
      <input  name="txnid" value="<?php echo $txnid ?>" />
      <table>
        <tr>
          <td><b>Mandatory Parameters</b></td>
        </tr>
        <tr>
          <td>Amount: </td>
          <td><input  name="amount" value="<?php echo $amount; ?>" /></td>
          <td>First Name: </td>
          <td><input name="firstname" id="firstname" value="   " /></td>
        </tr>
        <tr>
          <td>Email: </td>
          <td><input  name="email" id="email" value="   " /></td>
          <td>Phone: </td>
          <td><input name="phone" value=" " /></td>
        </tr>
        <tr>
          <td>Product Info: </td>
          <td colspan="3"><textarea name="productinfo"><?php echo $posted['productinfo']; ?></textarea></td>
        </tr>
        <tr>
          <td>Success URI: </td>
          <td colspan="3"><input type="hidden" name="surl" value="http://localhost/Barclays_Hackathon/success.php" size="64" /></td>
        </tr>
        <tr>
          <td>Failure URI: </td>
          <td colspan="3"><input type="hidden" name="furl" value="http://localhost/Barclays_Hackathon/failure.php" size="64" /></td>
        </tr>

        <tr>
          <td colspan="3"><input type="hidden" name="service_provider" value="payu_paisa" size="64" /></td>
        </tr>

        <tr>
          <td><b>Optional Parameters</b></td>
        </tr>
        <tr>
          <td>Last Name: </td>
          <td><input name="lastname" id="lastname" value=" " /></td>
          <td>Cancel URI: </td>
          <td><input name="curl" value=" " /></td>
        </tr>
        <tr>
          <td>Address1: </td>
          <td><input name="address1" value=" " /></td>
          <td>Address2: </td>
          <td><input name="address2" value=" " /></td>
        </tr>
        <tr>
          <td>City: </td>
          <td><input name="city" value=" " /></td>
          <td>State: </td>
          <td><input name="state" value=" " /></td>
        </tr>
        <tr>
          <td>Country: </td>
          <td><input name="country" value=" " /></td>
          <td>Zipcode: </td>
          <td><input name="zipcode" value=" " /></td>
        </tr>
        <tr>
          <td>UDF1: </td>
          <td><input name="udf1" value=" " /></td>
          <td>UDF2: </td>
          <td><input name="udf2" value=" " /></td>
        </tr>
        <tr>
          <td>UDF3: </td>
          <td><input name="udf3" value=" " /></td>
          <td>UDF4: </td>
          <td><input name="udf4" value=" " /></td>
        </tr>
        <tr>
          <td>UDF5: </td>
          <td><input name="udf5" value=" " /></td>
          <td>PG: </td>
          <td><input name="pg" value=" " /></td>
        </tr>
        <tr>
          <?php if(!$hash) { ?>
            <td colspan="4"><input type="submit" value="Submit" /></td>
          <?php } ?>
        </tr>
      </table>
    </form>
  </body>
</html>
