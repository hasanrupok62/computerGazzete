
<?php require 'inc/header.php'; 
require 'action/connection.php';
$obj= new Connection;

if (isset($_SESSION['email'])) {
	header('location: index.php');
}
$error=array();
if($_POST)
{
    $email=$_POST['email'];
    $password=$_POST['password'];
    $password=md5($password); //Remember we hashed password before storing last time
    $sql="SELECT * FROM customer WHERE email='$email'";
    $result=mysqli_query($obj->con(),$sql);
    if ($result->num_rows) {
    	$sql="SELECT * FROM customer WHERE email='$email' AND password='$password'";
	    $result=mysqli_query($obj->con(),$sql);
	    if ($result->num_rows) {
	    	while ($row=$result->fetch_assoc()) {
	    		$email=$row['email'];
	    		$_SESSION['email']=$email;
	    		header('location: index.php');
	    	}
	    }else{
	    		$error[]='<div class="alert alert-danger" role="alert">Sorry combination of email and password is incorrect!</div>';
	    	}
    }else{
    	$error[]='<div class="alert alert-danger" role="alert">This email is not registered yet!</div>';
    }
    
}
?>

	<section class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-info">
				  <div class="panel-heading">
				    <h3 class="panel-title"><i class="fa fa-sign-in" aria-hidden="true"></i>Please login</span></h3>
				  </div>
				  <div class="panel-body">
				  <p class="text-center">
				  	<?php foreach ($error as $key => $value) {
					  	echo $value;
					  } ?>
				  </p>
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
					  
					  <button type="submit" class="btn btn-primary">Log in</button>
					</form>
				  </div>
				</div>
			</div>
		</div>
	</section>
<?php require 'inc/footer.php'; ?>