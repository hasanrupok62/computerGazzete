<?php
ob_start();
 require_once 'header.php';
include("cart.php");
require_once "config.inc.php";
 ?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Review Your Cart Before Buying</title>
<link href="style/style.css" rel="stylesheet" type="text/css">



<h3 style="text-align:center">Review Your Cart Before Buying</h3>

<?php
//$product_code="";
if(isset($_SESSION["products"]) && count($_SESSION["products"])>0){
	$total 			= 0;
	$list_tax 		= '';
	$cart_box 		= '<ul class="view-cart">';

	foreach($_SESSION["products"] as $product){ //Print each item, quantity and price.
		$product_name = $product["product_name"];
		$product_qty = $product["product_qty"];
		$product_price = $product["product_price"];
		$product_code = $product["product_code"];echo " ";
	
		
		//$item_price 	= sprintf("%01.2f",($product_price * $product_qty));  // price x qty = total item price
		$item_price 	= round($product_price*$product_qty,2);

		
		$cart_box 		.=  "<li> $product_code &ndash;  $product_name (Qty : $product_qty) <span> $currency. $item_price </span></li>";
		
		$subtotal 		= ($product_price * $product_qty); //Multiply item quantity * price
		$total 			= ($total + $subtotal); //Add up to total price
	}
	
	$grand_total = $total + $shipping_cost; //grand total
	
	foreach($taxes as $key => $value){ //list and calculate all taxes in array
			$tax_amount 	= round($total * ($value / 100));
			$tax_item[$key] = $tax_amount;
			$grand_total 	= $grand_total + $tax_amount; 
	}
	
	foreach($tax_item as $key => $value){ //taxes List
		$list_tax .= $key. ' '. $currency. sprintf("%01.2f", $value).'<br />';
	}	

	
	$shipping_cost = ($shipping_cost)?'Shipping Cost : '.$currency. sprintf("%01.2f", $shipping_cost).'<br />':'';
	//Print Shipping, VAT and Total
	$cart_box .= "<li class=\"view-cart-total\">$shipping_cost  $list_tax <hr>Payable Amount : $currency ".sprintf("%01.2f", $grand_total)."</li>";
	$cart_box .= "</ul>";
	echo $cart_box;



}
else{
	echo "Your Cart is empty";
}


//connect to database
$db=mysqli_connect("localhost","root","","hatbazar");
if(isset($_POST['check-out']))
{	
	if(isset($_SESSION['email'])){

		$email=$_SESSION['email'];
	   $sql  = "INSERT INTO payment(email,total) VALUES('$email','$grand_total')";
	   //echo $sql;

	    mysqli_query($db,$sql);  
	   
	    //header("admin.php");  //redirect home pageproduct_image

	    if(isset($_SESSION["products"]) && count($_SESSION["products"])>0){

			foreach($_SESSION["products"] as $product){ //Print each item, quantity and price.
				$product_code = $product["product_code"];
				$product_qty = $product["product_qty"];
				$product_name = $product["product_name"];
				 $sql  = "INSERT INTO order_list(email,product_code,product_qty,product_name) VALUES('$email','$product_code','$product_qty','$product_name')";
				 //echo $sql;
				   
					mysqli_query($db,$sql);

			}
		}
		header('location: index.php');
	}
	else {
	    // the user is not logged in. you can do whatever you want here.
	    // for demonstration purposes, we simply show the "you are if (isset($_SESSION['email'])) {
		header('location: login.php');
	}
}
?>
<html>
	<head>
		<title>Insert product</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
<body id="body-color">

<?php
    if(isset($_SESSION['message']))
    {
         echo "<div id='error_msg'>".$_SESSION['message']."</div>";
         unset($_SESSION['message']);
    }
?>

<a href="index.php"><form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

<button type="submit" name="check-out" class="btn btn-primary">Check out</button>
</form></a>
<style>
.btn-primary {
  background: rgb(118, 215, 196) none repeat scroll 0 0;
    margin-left: 600px;
    width: 100px;
}
  </style>