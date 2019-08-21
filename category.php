<?php require 'header.php'; ?>
<style>
	h3.filter-title {
    font-size: 16px;
    color: #787878;
    font-weight: 400;
    line-height: 24px;
    background: black;
    padding: 10px;
    margin-bottom: 0px;
}
li.list-group-item:hover {
    background: aliceblue;
}
ul.products-wrp{
	width: auto;
}
ul.products-wrp li {
    display: inline-block;
    border: 1px solid #ECECEC;
    margin: 5px;
    background: #fff;
    text-align: center;
    width: 31%;
}
span.badge{
	left: 0;
	top: 0;
	float: right;
}
</style>
<section class="container">
	<div class="row">
		<div class="col-md-3">
			<h3 class="filter-title">Filter By Category</h3>
			<?php $sql="SELECT * FROM category";
			if ($result=mysqli_query($mysqli_conn,$sql)) { ?>
				<ul class="list-group">
		<?php	while ($row=mysqli_fetch_assoc($result)) { ?>
					<li class="list-group-item">
						<a href="category.php?filterby=category&name=<?php echo $row['cat_name']; ?>">
							<?php echo $row['cat_name']; ?>
							<span class="badge">
							<?php
							$cat_id=$row['cat_id'];
							 $sqlCount="SELECT * FROM products_list WHERE cat_id='$cat_id'";
							 if ($count=mysqli_query($mysqli_conn,$sqlCount)) {
							 	echo $count->num_rows;
							  }else{
							  	echo "0";
							  	} ?>	
							</span>
						</a>
					</li>
		<?php	} ?>
				</ul>
	<?php	} ?>
		<h3 class="filter-title">Filter By Price</h3>
		<ul class="list-group">
			<li class="list-group-item">
				<a href="category.php?filterby=price&from=10000&to=50000">10k-50k</a>
			</li>
			<li class="list-group-item">
				<a href="category.php?filterby=price&from=50000&to=100000">50k-100k</a>
			</li>
			<li class="list-group-item">
				<a href="category.php?filterby=price&from=100000&to=150000">100k-150k</a>
			</li>
			<li class="list-group-item">
				<a href="category.php?filterby=price&from=150000&to=200000">150k-200k</a>
			</li>
		</ul>

		<h3 class="filter-title">Filter By Brand</h3>
			<?php $sql="SELECT * FROM brand";
			if ($result=mysqli_query($mysqli_conn,$sql)) { ?>
				<ul class="list-group">
		<?php	while ($row=mysqli_fetch_assoc($result)) { ?>
					<li class="list-group-item">
						<a href="category.php?filterby=brand&name=<?php echo $row['brand_name']; ?>">
							<?php echo $row['brand_name']; ?>
						</a>
					</li>
		<?php	} ?>
				</ul>
	<?php	} ?>
		</div>
		<div class="col-md-9">
		<?php 
		if (isset($_GET['filterby'])) {
			if ($_GET['filterby']=='price') {
				if (isset($_GET['from'])||isset($_GET['to'])) {
					$from	=$_GET['from'];
					$to		=$_GET['to'];
					$sql="SELECT * FROM products_list WHERE product_price > '$from' AND product_price < '$to'";
					if ($result=mysqli_query($mysqli_conn,$sql)) { ?>
					<ul class="products-wrp">
				<?php	while ($row=mysqli_fetch_assoc($result)) { ?>
						<li>
							<form class="form-item">
							<h4><?php echo $row["product_code"]."-".$row["product_name"]; ?></h4>
							<a href="productDetails.php?id=<?php echo $row['product_code']; ?>">
							<div><img src="images/<?php echo $row['product_image']; ?>"></div></a>
							<div>Price : Tk. <?php echo $row["product_price"]; ?> <div>
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
							    
							    <input name="product_code" type="hidden" value="<?php echo $row["product_code"]; ?>">
							    <button type="submit" class="huhu" >Add to Cart</button>
							</div>
							</form>
						</li>
				<?php	} ?>
					</ul>
			<?php	}
				}
			}elseif ($_GET['filterby']=='category') {
				$cat=$_GET['name'];
				$sql="SELECT * FROM products_list NATURAL JOIN category WHERE cat_name='$cat'";
				if ($result=mysqli_query($mysqli_conn,$sql)) { ?>
				<ul class="products-wrp">
			<?php	while ($row=mysqli_fetch_assoc($result)) { ?>
					<li>
						<form class="form-item">
						<h4><?php echo $row["product_code"]."-".$row["product_name"]; ?></h4>
						<a href="productDetails.php?id=<?php echo $row['product_code']; ?>">
						<div><img src="images/<?php echo $row['product_image']; ?>"></div></a>
						<div>Price : Tk. <?php echo $row["product_price"]; ?> <div>
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
						    
						    <input name="product_code" type="hidden" value="<?php echo $row["product_code"]; ?>">
						    <button type="submit" class="huhu" >Add to Cart</button>
						</div>
						</form>
					</li>
			<?php	} ?>
				</ul>
		<?php	}else{

				}
			}elseif ($_GET['filterby']=='brand') {
				$name=$_GET['name'];
				$sql="SELECT * FROM products_list  WHERE product_name LIKE '%".$name."%' OR product_desc LIKE '%".$name."%'";
				if ($result=mysqli_query($mysqli_conn,$sql)) { ?>
				<ul class="products-wrp">
			<?php	while ($row=mysqli_fetch_assoc($result)) { ?>
					<li>
						<form class="form-item">
						<h4><?php echo $row["product_code"]."-".$row["product_name"]; ?></h4>
						<a href="productDetails.php?id=<?php echo $row['product_code']; ?>">
						<div><img src="images/<?php echo $row['product_image']; ?>"></div></a>
						<div>Price : Tk. <?php echo $row["product_price"]; ?> <div>
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
						    
						    <input name="product_code" type="hidden" value="<?php echo $row["product_code"]; ?>">
						    <button type="submit" class="huhu" >Add to Cart</button>
						</div>
						</form>
					</li>
			<?php	} ?>
				</ul>
		<?php	}else{

				}
			}
		}else{
			$sql="SELECT * FROM products_list";
			if ($result=mysqli_query($mysqli_conn,$sql)) { ?>
			<ul class="products-wrp">
		<?php	while ($row=mysqli_fetch_assoc($result)) { ?>
				<li>
					<form class="form-item">
						<h4><?php echo $row["product_code"]."-".$row["product_name"]; ?></h4>
						<a href="productDetails.php?id=<?php echo $row['product_code']; ?>">
						<div><img src="images/<?php echo $row['product_image']; ?>"></div></a>
						<div>Price : Tk. <?php echo $row["product_price"]; ?> </div>
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
						    
						    <input name="product_code" type="hidden" value="<?php echo $row["product_code"]; ?>">
						    <button type="submit" class="huhu" >Add to Cart</button>
						</div>
					</form>
				</li>
		<?php	} ?>
			</ul>
	<?php	}
		}
		 ?>
		</div>
	</div>
</section>
<?php require 'footer.php'; ?>