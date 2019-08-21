<?php require 'header.php'; ?>
<?php require 'sort.php'; ?>
<style>
		ul.products-wrp li img{
	height: 180px!important;
}
ul.products-wrp li{
	float: left;
	display: inline-block;
	width: 24%!important;
}

</style>


<div class="container">
	
	<?php if (isset($_GET['q'])||isset($_GET['filter'])) {
	$q=$_GET['q'];
	$filter=$_GET['filter'];
	$sql='SELECT * FROM products_list WHERE cat_id LIKE "%'.$filter.'%" AND product_name LIKE "%'.$q.'%"';
	$result=mysqli_query($mysqli_conn, $sql);
	if ($result->num_rows):?>
		<div class="row">
			<div class="col-md-6">
				<h3>About <?php echo $result->num_rows; ?> result</h3>
			</div>
			<div class="col-md-6">
				
			</div>
		</div>
		<ul class='products-wrp'>
		<?php while ($row=mysqli_fetch_assoc($result)):?>
			<li>
				<form class="form-item">
				<h4><?php echo $row['product_name']; ?></h4>
				<a href="productDetails.php?id=<?php echo $row['id']; ?>">
				<div><img src="images/<?php echo $row['product_image']; ?>"></div></a>
				<div>Price : Tk. <?php echo $row['product_price']; ?> <div>
				<div class="item-box">
				    <div>
				    Qty :
				    <select name="product_qty">
				    <option value="1">1</option>
				    <option value="2">2</option>
				    <option value="3">3</option>
				    <option value="4">4</option>
				    <option value="5">5</option>
				    </select>
				    </div>
				    
				    <input name="product_code" type="hidden" value="2">
				    <button type="submit">Add to Cart</button>
				    <a href="" >compare</a>
				</div>

				</div></div></form></li>
<?php   endwhile;
		echo "</ul>";
	endif;
} ?>
</div>

<?php require 'footer.php'; ?>