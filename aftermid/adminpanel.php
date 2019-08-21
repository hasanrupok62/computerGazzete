<?php require_once 'header.php';?>
<?php
require_once "config.inc.php"; //include config file
?>
<div class="grey">
	<div class="container">
		<div class="btn-group-vertical" role="group" aria-label="btn">
	  	<a href="admin.php"><button type="submit" name="Insert" class="btn btn-primary">Insert</button></a>
	  	<a href="update.php"><button type="submit" name="Insert" class="btn btn-primary">Update</button></a>
	  	<a href="delete.php"><button type="submit" name="Insert" class="btn btn-primary">Delete</button></a>
		</div>
	</div>
</div>

<table align="center" border="1" width="100%">
<tr>
<th>Email</th>
<th>Product name</th>
<th>Product_code</th>
<th>Quantity</th>
<th>Total price</th>
</tr>
<?php
mysql_connect("localhost","root");
mysql_select_db("hatbazar");
$res=mysql_query("SELECT c.* , p.* FROM payment c INNER JOIN order_list p ON c.email=p.email");
while($row=mysql_fetch_array($res))
{
	?>
    <tr>
	<td><p><?php echo $row['email']; ?></p></td> 
    <td><p><?php echo $row['product_name']; ?></p></td>
	<td><p><?php echo $row['product_code']; ?></p></td>
	<td><p><?php echo $row['product_qty']; ?></p></td>
	<td><p><?php echo $row['total']; ?></p></td>

    </tr>
    <?php
}
?>
</table>


 <script>
$(document).ready(function(){	
		$(".form-item").submit(function(e){
			var form_data = $(this).serialize();
			var button_content = $(this).find('button[type=submit]');
			button_content.html('Adding...'); //Loading button text 

			$.ajax({ //make ajax request to cart_process.php
				url: "cart_process.php",
				type: "POST",
				dataType:"json", //expect json value from server
				data: form_data
			}).done(function(data){ //on Ajax success
				$("#cart-info").html(data.items); //total items in cart-info element
				button_content.html('Add to Cart'); //reset button text to original tex
				if($(".shopping-cart-box").css("display") == "block"){ //if cart box is still visible
					$(".cart-box").trigger( "click" ); //trigger click to update the cart box.
				}
			})
			e.preventDefault();
		});

	//Show Items in Cart
	$( ".cart-box").click(function(e) { //when user clicks on cart box
		e.preventDefault(); 
		$(".shopping-cart-box").fadeIn(); //display cart box
		$("#shopping-cart-results").html('<img src="images/ajax-loader.gif">'); //show loading image
		$("#shopping-cart-results" ).load( "cart_process.php", {"load_cart":"1"}); //Make ajax request using jQuery Load() & update results
	});
	
	//Close Cart
	$( ".close-shopping-cart-box").click(function(e){ //user click on cart box close link
		e.preventDefault(); 
		$(".shopping-cart-box").fadeOut(); //close cart-box
	});
	
	//Remove items from cart
	$("#shopping-cart-results").on('click', 'a.remove-item', function(e) {
		e.preventDefault(); 
		var pcode = $(this).attr("data-code"); //get product code
		$(this).parent().fadeOut(); //remove item element from box
		$.getJSON( "cart_process.php", {"remove_code":pcode} , function(data){ //get Item count from Server
			$("#cart-info").html(data.items); //update Item count in cart-info
			$(".cart-box").trigger( "click" ); //trigger click on cart-box to update the items list
		});
	});
});
</script>
