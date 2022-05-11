<?php  
require "../private/autoload.php";
$apiKey = "rzp_test_xrgVYhoUKlaCk8";
?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<form action="paymentsuccess.php" method="POST">
<script
    src="https://checkout.razorpay.com/v1/checkout.js"
    data-key="<?php echo $apiKey;?>" // Enter the Test API Key ID generated from Dashboard → Settings → API Keys
    data-amount="<?php echo $_POST['amount']*100;?> " // Amount is in currency subunits. Hence, 29935 refers to 29935 paise or ₹299.35.
    data-currency="INR"// You can accept international payments by changing the currency code. Contact our Support Team to enable International for your account
 d by you in the backend.
    data-buttontext="Pay with Razorpay"
    data-name="Kilowatt"
    data-descriagement System = "payment"
    data-image="images/webicon.png"
    data-prefill.name="<?php echo $_POST['name'];?>"
    data-prefill.email="<?php echo $_POST['email'];?>"
    data-prefill.contact="<?php echo $_POST['mob'];?>"
    data-theme.color="#12D6CA"
></script>
<input type="hidden" custom="Hidden Element" name="hidden">
</form>


<style>
   .razorpay-payment-button
   {
      display: none;
   }
</style>

<script>
   $(document).ready(function(){
      $('.razorpay-payment-button').click();
   });
</script>