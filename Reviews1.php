<?php 
include('header.php');
include('theater.php');
  
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

for($id=4;$id<=8;$id++)
{
  if($id==4){
   ?>
   <div class="center wow fadeInDown">
              <hr>
                <h1 style="color: red;">LAPTOP</h1>
               <hr>
  </div>
<?php
  }
  ?>
  <?php
  if($id==5){
   ?>
   <hr>
  <div class="center wow fadeInDown">
              
                <h1 style="color: red;">DESKTOP</h1>
               <hr>
            </div>
<?php
  }
  if($id==8){
   ?>
<hr>
   <div class="center wow fadeInDown">
   
                <h1 style="color: red;">NOTEBOOK</h1>
               <hr>
    </div>
<?php
  }
  //if($id==7){
   ?>
  <!-- <br>
   <div class="entry-meta"  style="font-size:25px;text-align:center">
    <span  id="publish_date">NETWORKS</span>
    <br>
    <hr>
   </div>-->
<?php
  //}
$results_per_page = 4;
//List products from database
$abc= "SELECT * FROM products_list WHERE cat_id=$id";
$results = mysqli_query($mysqli_conn , $abc);
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
<a href="Reviews.php?id={$row['product_code']}">
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
  {/*important*/
    $products_list .= <<<EOT
<li>
<form class="form-item">
<h4>{$row["product_code"]}-{$row["product_name"]}</h4>
<a href="Reviews.php?id={$row['product_code']}">
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
echo"";
if(empty($products_list))
{
  echo "no results found";
}
echo $products_list;
}

// display the links to the pages
for ($page=1;$page<=$number_of_pages;$page++) {
  echo "<a href='product.php?id=$id&page=$page'>" . $page . "</a> ";
}

?>
    
            
