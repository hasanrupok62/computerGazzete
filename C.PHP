<?php require_once 'header.php';
include("cart.php");
require_once "config.inc.php"; //include config file
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Compare</title>
<link href="style/style.css" rel="stylesheet" type="text/css">
<?php   
$pr=array();
$rm=array();
$dis=array();
$p=array();

$n=999999;
$m=0;
$name=array();
if (isset($_SESSION["compare"])) {
	echo "<h1>Compare customize</h1>";
	foreach ($_SESSION['compare'] as $key => $value) {
		echo $value['item'];
	}
} ?>
<h3 style="text-align:center">Your chosen product to compare.</h3>
<div class="container">
<?php
//$product_code="";
if(isset($_SESSION["products"]) && count($_SESSION["products"])>0){
	echo '<div class="row">';
	foreach($_SESSION["products"] as $product){ //Print each item, quantity and price.
		$product_code = $product["product_code"];
		$id=$product_code;
		$sql="SELECT * FROM products_list WHERE product_code='$id'";
		$result=$mysqli_conn->query($sql);
		if ($result->num_rows) { ?>
				
	<?php	while ($row=$result->fetch_assoc()) { ?>
					<div class="col-md-3">
					
						<div>
							<img src="images/<?php echo $row['product_image']; ?>" alt="Image unavailable">
						</div>
						<div >
							<h2><?php echo $name[]=$row['product_name']; ?></h2>
							Price: <?php echo $pr[] =$row['product_price']; ?><br>
							<!--button id="b" class="btn btn-primary">Back</button-->
							Processor: <?php echo $p[]=$row['Processor']; ?><br>
							RAM: <?php echo $rm[]=$row['RAM']; ?>GB<br>
							graficCard: <?php echo $row['graficCard']; ?>GB<br>
							batterylifetime: <?php echo $row['batterylifetime']; ?><br>
							Display size: <?php echo $dis[]=$row['size']; ?> inch<br>
							brand: <?php echo $row['brand']; ?><br>
						</div>
					</div>
	<?php	}
		
		}
	} ?>
		<div class="col-md-3">
			<?php 
		if(isset($_SESSION["products"]) && count($_SESSION["products"])==3){
			if ($pr[0]<$pr[1] && $pr[0]<$pr[2] ) {
				echo "If you want less price then you can cose ".$name[0]."";
			}
			elseif ($pr[1]<$pr[0] && $pr[1]<$pr[2]) {
				echo "If you want less price then you can cose ".$name[1]."";
			}
			else{
				echo "If you want less price then you can cose ".$name[2]."";				
			}


		}
		elseif (isset($_SESSION["products"]) && count($_SESSION["products"])==2) {
			if ( $pr[0]<$pr[1] ) {
				echo "If you want less price then you can cose ".$name[0]."";
			}
			else{
				echo "If you want less price then you can cose ".$name[1]."";				
			}
		}
		foreach ($pr as $key => $value) {
		if ($value <= $n) {
			$n=$value;
			}
		}
		echo " ".$n."<br>";


		if(isset($_SESSION["products"]) && count($_SESSION["products"])==3){
			if ($pr[0]>$pr[1] && $pr[0]>$pr[2] ) {
				echo "If you need high quality then you can chose ".$name[0]."<br>it's RAM ".$rm[0]."";
			}
			elseif ($pr[1]>$pr[0] && $pr[1]>$pr[2]) {
				echo "If you need high quality then you can chose ".$name[1]."<br>it's RAM ".$rm[0]."";
			}
			else{
				echo "If you need high quality then you can chose ".$name[2]."<br>it's RAM ".$rm[0]."";				
			}
		}
		elseif (isset($_SESSION["products"]) && count($_SESSION["products"])==2) {
			if ( $pr[0]>$pr[1] ) {
				echo "If you need high quality then you can chose ".$name[0]."<br>it's RAM ".$rm[0]."";
			}
			else{
				echo "If you need high quality then you can chose ".$name[1]."<br>it's RAM ".$rm[0]."";				
			}
		}

		foreach ($pr as $key => $value) {
		if ($value <= $m) {
			$m=$value;
			}
		}
		echo " ".$m;


	?>
	</div>
	</div>
<?php }
?>
</div>