<?php
include 'header.php';
include("cart.php");
include("config.inc.php"); //include config file
?>

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

<?php include 'footer.php';?>
  </body>
</html>



