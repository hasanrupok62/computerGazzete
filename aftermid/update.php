<?php

//connect to database
$db=mysqli_connect("localhost","root","","hatbazar");
if(isset($_POST['update']))
{
    $product_name=mysql_real_escape_string($_POST['product_name']);
    $cat_id=mysql_real_escape_string($_POST['cat_id']);
    $product_desc=mysql_real_escape_string($_POST['product_desc']);
    $product_code=mysql_real_escape_string($_POST['product_code']);
    $product_image=mysql_real_escape_string($_POST['product_image']);
    $product_price=mysql_real_escape_string($_POST['product_price']);

    $sql="UPDATE products_list SET product_name='$product_name',product_desc='$product_desc',product_image='$product_image',product_price='$product_price' WHERE product_code='$product_code'";
    mysqli_query($db,$sql);  
    $_SESSION['message']="";
    header("update.php");  //redirect home pageproduct_image
}
?>
<html>
	<head>
		<title>update product</title>
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
				    <h3 class="panel-title"><i class="fa fa-sign-in" aria-hidden="true"></i>Update Table</span></h3>
				  </div>
				  <div class="panel-body">
				    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

					  <div class="form-group">
					    <label class="sr-only" for="exampleInputAmount">Amount (in dollars)</label>
					    <div class="input-group">
					      <div class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></div>
					      <input type="product_name" name="product_name" class="form-control" id="product_name" placeholder="Product Name">
					    </div>
					  </div>

					  <div class="form-group">
					    <label class="sr-only" for="exampleInputAmount">Amount (in dollars)</label>
					    <div class="input-group">
					      <div class="input-group-addon"><i class="fa fa-id-card-o" aria-hidden="true"></i></div>
					      <input type="cat_id" name="cat_id" class="form-control" id="cat_id" placeholder="Category Id">
					    </div>
					  </div>

			    	 <div class="form-group">
					    <label class="sr-only" for="exampleInputAmount">Amount (in dollars)</label>
					   <div class="input-group">
					 	 <div class="input-group-addon"><i class="fa fa-audio-description" aria-hidden="true"></i></div>
					  	<input type="product_desc" name="product_desc" class="form-control" id="product_desc" placeholder="Product description">
					  </div>
					 </div>

					  <div class="form-group">
					    <label class="sr-only" for="exampleInpphoneutAmount">Amount (in dollars)</label>
					    <div class="input-group">
					      <div class="input-group-addon"><i class="fa fa-id-badge" aria-hidden="true"></i></div>
					      <input type="product_code" name="product_code" class="form-control" id="product_code" placeholder="product_code">
					    </div>
					  </div>
					  <div class="form-group">
					    <label class="sr-only" for="exampleInpphoneutAmount">Amount (in dollars)</label>
					    <div class="input-group">
					      <div class="input-group-addon"><i class="glyphicon glyphicon-picture" aria-hidden="true"></i></div>
					      <input type="product_image" name="product_image" class="form-control" id="product_image" placeholder="Product Image">
					    </div>
					  </div>
					  <div class="form-group">
					    <label class="sr-only" for="exampleInpphoneutAmount">Amount (in dollars)</label>
					    <div class="input-group">
					      <div class="input-group-addon">&#2547<i class="" aria-hidden="true"></i></div>
					      <input type="product_price" name="product_price" class="form-control" id="product_price" placeholder="Product price">
					    </div>
					  </div>
					  
					  <button type="submit" name="update" class="btn btn-primary">Update</button>
					</form>
				  </div>
				</div>
			</div>
		</div>
	</section>
<?php require 'footer.php'; ?>

