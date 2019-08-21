<?php

//connect to database
$db=mysqli_connect("localhost","root","","hatbazar");
if(isset($_POST['delete']))
{
    
    $product_code=mysql_real_escape_string($_POST['product_code']);

    $sql="DELETE FROM products_list where product_code='$product_code'";
    mysqli_query($db,$sql); 
    echo " $sql"; 
    $_SESSION['message']=""; 
    header("delete.php");  //redirect home pageproduct_image
}
?>
<html>
	<head>
		<title>delete product</title>
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

<?php require 'inc/header.php'; ?>
<?php include 'adminpanel.php';?>
	<section class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-info">
				  <div class="panel-heading">
				    <h3 class="panel-title"><i class="fa fa-sign-in" aria-hidden="true"></i>Delete Form</span></h3>
				  </div>
				  <div class="panel-body">
				    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">


					  <div class="form-group">
					    <label class="sr-only" for="exampleInpphoneutAmount">Amount (in dollars)</label>
					    <div class="input-group">
					      <div class="input-group-addon"><i class="fa fa-id-badge" aria-hidden="true"></i></div>
					      <input type="product_code" name="product_code" class="form-control" id="product_code" placeholder="product_code">
					    </div>
					  </div>
					  
					  <button type="submit" name="delete" class="btn btn-primary">delete</button>
					</form>
				  </div>
				</div>
			</div>
		</div>
	</section>
<?php require 'footer.php'; ?>

