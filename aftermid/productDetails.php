<?php
include 'header.php';
include("cart.php");
include("config.inc.php"); //include config file
?>
<?php if (isset($_GET['id'])) {
	$con= new mysqli('127.0.0.1','root','','hatbazar');
	$id=$_GET['id'];
	$sql="SELECT * FROM products_list WHERE product_code='$id'";
	$result=$con->query($sql);
	if ($result->num_rows) {
		while ($row=$result->fetch_assoc()) { ?>
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<img src="images/<?php echo $row['product_image']; ?>" alt="Image unavailable">
					</div>	
					<div class="col-md-6">
						<h2><?php echo $row['product_name']; ?></h2>
						Price: <?php echo $row['product_price']; ?><br>
						<!--button id="b" class="btn btn-primary">Back</button-->



						<hr>

						<strong>Description: </strong><span>
							<?php echo $row['product_desc']; ?>
						</span>
					</div>
				</div>
				<div class="col-md-6">
				</div>
				<div class="col-md-6">
				  	<button id="bb" class="btn btn-primary" onclick="goBack()">Go Back</button>
				</div>
				</div>
			
		<?php }
	}
}

?>


<script>
function goBack() {
    window.history.back();
}
</script>


<?php require 'footer.php'; ?>


