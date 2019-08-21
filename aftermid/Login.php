
<?php
ob_start();
 require_once 'header.php';?>
<?php 
if (isset($_SESSION['email'])) {
	header('location: index.php');
}
?>


 <div>
<?php
//connect to database
ob_start();
$db=mysqli_connect("localhost","root","","hatbazar");
$msg=array();
if($_POST)
{
    $email=$_POST['email'];
    $password=$_POST['password'];
    
    $sql="SELECT * FROM customer WHERE email='$email'";
    $rst=mysqli_query($db,$sql);
    if ($rst->num_rows) {
    	$password=md5($password); //Remember we hashed password before storing last time
	    $sql="SELECT * FROM customer WHERE email='$email' AND password='$password'";
	    $adm="SELECT * FROM customer WHERE email='$email' AND password='$password' AND id=1";
		
	    $result=mysqli_query($db,$sql);
	    $result1=mysqli_query($db,$adm);
	    
	    if ($result1->num_rows) 
	    {
	    	while ($row=$result1->fetch_assoc())
	    	{
	    		$_SESSION['email']=$row['email'];
	    		header('location: adminpanel.php');
	    	}
	    }
	    elseif($result->num_rows)
	    {
	       while ($row=$result->fetch_assoc()) {
	        	$_SESSION['email']=$row['email'];
	        	header('location: index - Copy.php');
	       }
	    }
	   else
	   {
	   	$msg[]="Incorrect email or password";
	    }
    }else{
    	$msg[]="No user found with this email";
    }
}
ob_end_flush();
?>

	<section class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-info">
				  <div class="panel-heading">
				    <h3 class="panel-title"><i class="fa fa-sign-in" aria-hidden="true"></i>Please login</span></h3>
				  </div>
				    <div class="panel-body">
				    <?php foreach ($msg as $key => $value) {
				    	echo $value;
				    } ?>
				    	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
					  <div class="form-group">
					    <label class="sr-only" for="exampleInputAmount">Amount (in dollars)</label>
					    <div class="input-group">
					      <div class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></div>
					      <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email">
					    </div>
					  </div>
					  <div class="form-group">
					    <label class="sr-only" for="exampleInputAmount">Amount (in dollars)</label>
					    <div class="input-group">
					      <div class="input-group-addon"><i class="fa fa-lock" aria-hidden="true"></i></div>
					      <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password">
					    </div>
					  </div>
					  
					  <button type="submit" name="login-in" class="btn btn-primary">Log in</button>
					</form>
				    </div>
				  </div>
				</div>
			</div>
		</div>
	</section>
</body>
</html>
</div>
