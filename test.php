<?php
include 'header.php';
include("cart.php");
include("config.inc.php"); //include config file
?>


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


<?php

if(isset($_GET['id']))
{
  $id=$_GET['id'];
}
$results_per_page = 12;
//List products from database
$results = $mysqli_conn->query("SELECT * FROM products_list WHERE cat_id=$id");
//Display fetched records as you please
$products_list =  '<ul class="products-wrp">';
$number_of_results = mysqli_num_rows($results);

// determine number of total pages available
$number_of_pages = ceil($number_of_results/$results_per_page);
// determine which page number visitor is currently on
if (!isset($_GET['page'])) {
  $page = 1;
} else {
  $page = $_GET['page'];
}
// determine the sql LIMIT starting number for the results on the displaying page
$this_page_first_result = ($page-1)*$results_per_page;

// retrieve selected results from database and display them on page
$sql="SELECT * FROM products_list WHERE cat_id=$id LIMIT " . $this_page_first_result . "," .  $results_per_page;
$result = mysqli_query($mysqli_conn , $sql);


while($row = mysqli_fetch_array($result))  
{

  $ase=false;
    if(isset($_SESSION['products']))
    {
      foreach($_SESSION["products"] as $product)
      {
          if($row['product_code']==$product["product_code"])
          {
            $ase=true;
          }
      }
    }
  if($ase)
  {
    $products_list .= <<<EOT
<li>
<form class="form-item">
<h4>{$row["product_code"]}-{$row["product_name"]}</h4>
<a href="product.php?id={$row['product_code']}">
<div><img src="images/{$row["product_image"]}"></div></a>
<div>Price : Tk. {$row["product_price"]} <div>
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
    
    <input name="product_code" type="hidden" value="{$row["product_code"]}">
    <button type="submit" class="huhu" >Add to Cart</button>
</div>
</form>
</li>
EOT;
  }
  else
  {
    $products_list .= <<<EOT
<li>
<form class="form-item">
<h4>{$row["product_code"]}-{$row["product_name"]}</h4>
<a href="product.php?id={$row['product_code']}">
<div><img src="images/{$row["product_image"]}"></div></a>
<div>Price : Tk. {$row["product_price"]} <div>
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
    
    <input name="product_code" type="hidden" value="{$row["product_code"]}">
    <button type="submit" >Add to Cart</button>
</div>
</form>
</li>
EOT;
  }



}
echo $products_list;

// display the links to the pages
for ($page=1;$page<=$number_of_pages;$page++) {
  echo "<a href='test.php?id=$id&page=$page'>" . $page . "</a> ";
}

?>


<?php include 'footer.php';?>
  </body>
</html>



