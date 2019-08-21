
<?php

//connect to database
$db=mysqli_connect("localhost","root","","hatbazar");
if(isset($_POST['Insert']))
{
    $vtitle=mysql_real_escape_string($_POST['vtitle']);
    $vdate=mysql_real_escape_string($_POST['vdate']);
    $vlink=mysql_real_escape_string($_POST['vlink']);

    $sql="INSERT INTO video(vtitle,vdate,vlink) VALUES('$vtitle','$vdate','$vlink')";
    mysqli_query($db,$sql);  
    $_SESSION['message']=""; 
    header("insertvideo.php");  //redirect home pageproduct_image
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
					      <input type="vtitle" name="vtitle" class="form-control" id="vtitle" placeholder="Product title">
					    </div>
					  </div>

					  <div class="form-group">
					    <label class="sr-only" for="exampleInputAmount">Amount (in dollars)</label>
					    <div class="input-group">
					      <div class="input-group-addon"><i class="fa fa-id-card-o" aria-hidden="true"></i></div>
					      <input type="vdate" name="vdate" class="form-control" id="vdate" placeholder="Date: YYYY-MM-DD">
					    </div>
					  </div>

			    	<div class="form-group">
					    <label class="sr-only" for="exampleInputAmount">Amount (in dollars)</label>
					   <div class="input-group">
					 	 <div class="input-group-addon"><i class="fa fa-audio-description" aria-hidden="true"></i></div>
					  	<input type="vlink" name="vlink" class="forvlinkm-control" id="vlink" placeholder="Video link">
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

