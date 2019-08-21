<?php

//connect to database
date_default_timezone_set('Asia/Bangkok');
$taka=date('Y-m-d H:i:s');
$db=mysqli_connect("localhost","root","","hatbazar");
if(isset($_POST['Insert']))
{
    $Subject=mysql_real_escape_string($_POST['Subject']);
    $Image=mysql_real_escape_string($_POST['Image']);
    $Body=mysql_real_escape_string($_POST['Body']);

    $sql="INSERT INTO news('Subject','Body','Image','Modified_By','Modification Date','Status') VALUES('$Subject','$Body','$Image','".$_SESSION['email']."','$taka','1')";
    mysqli_query($db,$sql);  
    $_SESSION['message']=""; 
    header("insertproduct.php");  //redirect home pageImage
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

<?php require 'inc/header.php'; ?>
<?php include 'adminpanel.php';?>
	<section class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-info">
				  <div class="panel-heading">
				    <h3 class="panel-title"><i class="fa fa-sign-in" aria-hidden="true"></i>Insertion Table</span></h3>
				  </div>
				  <div class="panel-body">
				    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

					  <div class="form-group">
					    <label class="sr-only" for="exampleInputAmount">Amount (in dollars)</label>
					    <div class="input-group">
					      <div class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></div>
					      <input type="Subject" name="Subject" class="form-control" id="Subject" placeholder="Body of the news">
					    </div>
					  </div>

					  <div class="form-group">
					    <label class="sr-only" for="exampleInputAmount">Amount (in dollars)</label>
					    <div class="input-group">
					      <div class="input-group-addon"><i class="fa fa-id-card-o" aria-hidden="true"></i></div>
					      <input type="cat_id" name="cat_id" class="form-control" id="cat_id" placeholder="Subject of the news">
					    </div>
					  </div>
					  <div class="form-group">
					    <label class="sr-only" for="exampleInpphoneutAmount">Amount (in dollars)</label>
					    <div class="input-group">
					      <div class="input-group-addon"><i class="glyphicon glyphicon-picture" aria-hidden="true"></i></div>
					      <input type="" name="Image" class="form-control" id="Image" placeholder="news Image">
					    </div>
					  </div> 
					  <button type="submit" name="Insert" class="btn btn-primary">Insert</button>
					</form>
				  </div>
				</div>
			</div>
		</div>
	</section>
<?php require 'footer.php'; ?>

