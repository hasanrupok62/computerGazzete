<?php /**
*
*/
class Sort
{
	
	function __construct()
	{
		
	}
function SortByPrice_asc($url,$id){?>
<!-- Single button -->
<div class="btn-group">
	<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	Sort by <span class="caret"></span>
	</button>
	<ul class="dropdown-menu">
		<li><a href="<?php echo $url; ?>?id=<?php echo $id; ?>&sortby=asc">Ascending</a></li>
		<li role="separator" class="divider"></li>
		<li><a href="<?php echo $url; ?>?id=<?php echo $id; ?>&sortby=dsc">Descending</a></li>
	</ul>
</div>
<?php }

function SortedProductByASC($mysqli_conn,$id){
	$sql="SELECT * FROM products_list WHERE cat_id='$id' ORDER BY product_price ASC";
    $result=mysqli_query($mysqli_conn, $sql);
    if ($result->num_rows) {?>
    <ul class='products-wrp'>
  <?php    while ($row=mysqli_fetch_assoc($result)) {?>
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
        </div>

        </div></div></form></li>
    <?php  }
      echo "</ul>";
}
}

function SortedProductByDSC($mysqli_conn,$id){
	$sql="SELECT * FROM products_list WHERE cat_id='$id' ORDER BY product_price DESC";
    $result=mysqli_query($mysqli_conn, $sql);
    if ($result->num_rows) {?>
    <ul class='products-wrp'>
  <?php    while ($row=mysqli_fetch_assoc($result)) {?>
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
        </div>

        </div></div></form></li>
    <?php  }
      echo "</ul>";
}
}
} ?>