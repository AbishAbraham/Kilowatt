<?php 
require "../private/autoload.php";

if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_SESSION['token']) && isset($_POST['token']) && ($_SESSION['token'] == $_POST['token']))
{
	$name = ($_POST['name']);
    $consumerid = ($_POST['consid']);
    $email = ($_POST['email']);
    $mob = ($_POST['mob']);
    $address = ($_POST['address']);
	
    if($Error == "")
    {
    	$arr['name'] = $name;
    	$arr['consumerid'] = $consumerid;
    	$arr['email'] = $email;
    	$arr['mob'] = $mob;
    	$arr['address'] = $add;
  
	$query = "SELECT * FROM dumbdetail WHERE consumerid = :consumerid limit 1;";
	$query .= "SELECT * FROM payment WHERE consumerid = :consumerid limit 1";
	$stm = $connection->prepare($query);
	$check = $stm->execute($arr);
     
     if($check)
     {
     	$data = $stm->fetchAll(PDO::FETCH_OBJ);
     	if(is_array($data) && count($data)>0)
     	{
     		$data = $data[0];
     		$_SESSION['consumerid'] = $data->consumerid;
     		$_SESSION['url_address'] = $data->url_address;
     		$_SESSION['supply'] = $data->supply;
     		$_SESSION['Name'] = $data->Name;
     		$_SESSION['amount'] = $data->amount;
            $supply=$_SESSION['supply'];

            header("Location: payment.php");
        }
}
}
$Error = "Invalid Credentials!";
}
$_SESSION['token'] = get_random_string(60);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Payment Gateway</title>
	 <link rel="icon" type="image/x-icon" href="images/webicon.ico">
	<link rel="stylesheet" href="paymentform.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100;200;300;400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<section class="pay">
	<form action="payment.php" method="post">
		<h3>Checkout Form</h3>
		<label for="fname">Full Name</label>
		<input type="text" name="name"><br>
		<label for="consid">Consumer ID</label>
		<input type="text" name="consumerid"><br>
		<label for="email">Email</label>
		<input type="email" name="email"><br>
		<input type="hidden" value="<?=$_SESSION['consumerid'];?> " name="orderid">
		<input type="hidden" value="<?php echo 1; ?>" name="amount">
		<label for="mobile">Mobile</label>
		<input type="text" name="mob"><br>
		<label for="add">Address</label>
		<input type="text" name="address"><br>

		<input type="submit" name="Pay now" value="Pay now">
		<button><a href="javascript:history.back()">Go Back</a></button>
		
	</form>
</section>
</body>
</html>