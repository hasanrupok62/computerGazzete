<?php

//connect to database
$db=mysqli_connect("localhost","root","","hatbazar");
if(isset($_POST['Sign-Up']))
{
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $password=$_POST['password'];
    $password2=$_POST['password2']; 	
     if($password==$password2 && $password!='')
     {           //Create User
            $password=md5($password); //hash password before storing for security purposes
            $sql="INSERT INTO customer(name,email,password,phone) VALUES('$name','$email','$password','$phone')";
            mysqli_query($db,$sql);  
            $_SESSION['message']="You are now logged in"; 
            $_SESSION['email']=$email;
            header("location:index.php");  //redirect home page
    }
}
?>
<html>
	<head>
		<title>Sign-Up</title>
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
<?php include 'header.php';?>
	<section class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-info">
				  <div class="panel-heading">
				    <h3 class="panel-title"><i class="fa fa-sign-in" aria-hidden="true"></i>Registration Form</span></h3>
				  </div>
				  <div class="panel-body">
				    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

					  <div class="form-group">
					    <label class="sr-only" for="exampleInputAmount">Amount (in dollars)</label>
					    <div class="input-group">
					      <div class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></div>
					      <input type="name" name="name" class="form-control" id="name" placeholder="Name">
					    </div>
					  </div>

					  <div class="form-group">
					    <label class="sr-only" for="exampleInputAmount">Amount (in dollars)</label>
					    <div class="input-group">
					      <div class="input-group-addon"><i class="fa fa-envelope" aria-hidden="true"></i></div>
					      <input type="email" name="email" class="form-control" id="email" placeholder="Email">
					    </div>
					  </div>

			    	 <div class="form-group">
					    <label class="sr-only" for="exampleInputAmount">Amount (in dollars)</label>
					   <div class="input-group">
					 	 <div class="input-group-addon"><i class="fa fa-phone-square" aria-hidden="true"></i></div>
					  	<input type="phone" name="phone" class="form-control" id="phone" placeholder="Phone number">
					  </div>
					 </div>

					  <div class="form-group">
					    <label class="sr-only" for="exampleInpphoneutAmount">Amount (in dollars)</label>
					    <div class="input-group">
					      <div class="input-group-addon"><i class="fa fa-lock" aria-hidden="true"></i></div>
					      <input type="password" name="password" class="form-control" id="password" placeholder="password">
					    </div>
					  </div>
					  <div class="form-group">
					    <label class="sr-only" for="exampleInpphoneutAmount">Amount (in dollars)</label>
					    <div class="input-group">
					      <div class="input-group-addon"><i class="fa fa-lock" aria-hidden="true"></i></div>
					      <input type="password" name="password2" class="form-control" id="password" placeholder="Confirm Password">
					    </div>
					  </div>
					  
					  <button type="submit" name="Sign-Up" class="btn btn-primary">Sign up</button>
					</form>
				  </div>
				</div>
			</div>
		</div>
	</section>
<?php require 'footer.php'; ?>

