<?php
include ("header.php");
include("cart.php");
include("config.inc.php"); //include config file

   // $commentmail = $_SESSION['email'];
   // echo $commentmail
?>


<link href="css/review-page.css" rel="stylesheet">
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
if(isset($_SESSION['email']) && (isset($_POST['upv']) || isset($_POST['downv']) && isset($_SESSION['email']) )){
    //del prev votes
    $usid = $_SESSION['email'];
    $rvid = $_POST['c_id'];
   // echo $_POST['c_id'];
    $sql = "SELECT * FROM comments WHERE c_id='".$_POST['c_id']."'";
    $res = $mysqli_conn->query($sql);
    $ret = $res->fetch_assoc();
    if($ret['username']!=$_SESSION['email']){
    //del prev post likes/dislikes
    $whoposted = $ret['username'];
    $sql = "SELECT * FROM commentvotes WHERE customer_id='$usid' AND c_id='$rvid'";//email and p_id
    $res = $mysqli_conn->query($sql);
    if($res->num_rows>0){
        $ret = $res->fetch_assoc();
        if($ret['liked']==1){
            $sql = "SELECT * FROM comments WHERE c_id='$rvid'";
            $res = $mysqli_conn->query($sql);
            $ret = $res->fetch_assoc();
            $w = $ret['likes'] - 1;
            $sql = "UPDATE comments SET likes = $w WHERE c_id='$rvid'";
            $mysqli_conn->query($sql);
        }else{
            $sql = "SELECT * FROM comments WHERE c_id='$rvid'";
            $res = $mysqli_conn->query($sql);
            $ret = $res->fetch_assoc();
            $w = $ret['dislikes'] - 1;
            $sql = "UPDATE comments SET dislikes = $w WHERE c_id=$rvid";
            $mysqli_conn->query($sql);
        }
    }



    $sql = "DELETE FROM commentvotes WHERE customer_id='$usid' AND c_id='$rvid'";
    $mysqli_conn->query($sql);
    if(isset($_POST['upv'])){
        $sql = "INSERT INTO commentvotes(customer_id,c_id,liked,disliked) VALUES ('".$_SESSION['email']."','".$_POST['c_id']."','1','0')";
        $res = $mysqli_conn->query($sql);

        $sql = "SELECT * FROM comments WHERE c_id='".$_POST['c_id']."'";
        $res = $mysqli_conn->query($sql);
        $ret = $res->fetch_assoc();
        $w = $ret['likes'] + 1;
        $sql = "UPDATE comments SET likes = $w WHERE c_id='".$_POST['c_id']."'";
        $mysqli_conn->query($sql);

       
    }
    if(isset($_POST['downv'])){
        $sql = "INSERT INTO commentvotes(customer_id,c_id,liked,disliked) VALUES ('".$_SESSION['email']."','".$_POST['c_id']."','0','1')";
        $res = $mysqli_conn->query($sql);

        $sql = "SELECT * FROM comments WHERE c_id='$rvid'";
        $res = $mysqli_conn->query($sql);
        $ret = $res->fetch_assoc();
        $w = $ret['dislikes'] + 1;
        $l = $ret['likes'];
        $sql = "UPDATE comments SET dislikes = $w WHERE c_id=$rvid";
        $mysqli_conn->query($sql);

        //auto removal diff between up and down 100
        
    }
    }
    else
    {
        $sql = "SELECT * FROM commentvotes WHERE customer_id='$usid' AND c_id='$rvid'";//email and p_id
    $res = $mysqli_conn->query($sql);
    if($res->num_rows>0){
        $ret = $res->fetch_assoc();
        if($ret['liked']==1){
            $sql = "SELECT * FROM comments WHERE c_id='$rvid'";
            $res = $mysqli_conn->query($sql);
            $ret = $res->fetch_assoc();
            $w = $ret['likes'] - 1;
            $sql = "UPDATE comments SET likes = $w WHERE c_id='$rvid'";
            $mysqli_conn->query($sql);
        }else{
            $sql = "SELECT * FROM comments WHERE c_id='$rvid'";
            $res = $mysqli_conn->query($sql);
            $ret = $res->fetch_assoc();
            $w = $ret['dislikes'] - 1;
            $sql = "UPDATE comments SET dislikes = $w WHERE c_id=$rvid";
            $mysqli_conn->query($sql);
        }
    }
        if(isset($_POST['upv'])){
        $sql = "INSERT INTO commentvotes(customer_id,c_id,liked,disliked) VALUES ('".$_SESSION['email']."','".$_POST['c_id']."','1','0')";
        $res = $mysqli_conn->query($sql);

        $sql = "SELECT * FROM comments WHERE c_id='".$_POST['c_id']."'";
        $res = $mysqli_conn->query($sql);
        $ret = $res->fetch_assoc();
        $w = $ret['likes'] + 1;
        $sql = "UPDATE comments SET likes = $w WHERE c_id='".$_POST['c_id']."'";
        $mysqli_conn->query($sql);

       
    }
    if(isset($_POST['downv'])){
        $sql = "INSERT INTO commentvotes(customer_id,c_id,liked,disliked) VALUES ('".$_SESSION['email']."','".$_POST['c_id']."','0','1')";
        $res = $mysqli_conn->query($sql);

        $sql = "SELECT * FROM comments WHERE c_id='$rvid'";
        $res = $mysqli_conn->query($sql);
        $ret = $res->fetch_assoc();
        $w = $ret['dislikes'] + 1;
        $l = $ret['likes'];
        $sql = "UPDATE comments SET dislikes = $w WHERE c_id=$rvid";
        $mysqli_conn->query($sql);

        //auto removal diff between up and down 100
        
    }
    }
    
    
}
?>
<?php if (isset($_GET['id'])) {
    date_default_timezone_set('Asia/Bangkok');
    $con= new mysqli('127.0.0.1','root','','hatbazar');
    $id=$_GET['id'];
    $sql="SELECT * FROM products_list WHERE product_code='$id'";
    $result=$con->query($sql);
    if ($result->num_rows) {
        while ($row=$result->fetch_assoc()) { ?>
            
              
 <!-- reviews product view option -->
 <div class="container">
        <div class="card">
            <div class="container-fliud">
                <div class="wrapper row">
                    <div class="preview col-md-6">
                        
                        <div class="preview-pic tab-content">
                          <div class="tab-pane active" id="pic-1"><img src="images/<?php echo $row['product_image']; ?>" alt="Image unavailable"></div>
                          
                        </div>
                        
                    </div>
                    <div class="details col-md-6">
                        <h3 class="product-title"><?php echo $row['product_name']; ?></h3>
                        
                        <p class="product-description"><?php echo $row['product_desc']; ?></p>
                        <h4 class="price"> Price: <span>৳  <?php echo $row['product_price']; ?></span></h4>
                       <!-- <p class="vote"><strong>91%</strong> of buyers enjoyed this product! <strong>(87 commentvotes)</strong></p>-->
                        <h5 class="colors">colors:
                            <span class="color orange not-available" data-toggle="tooltip" title="Not In store"></span>
                            <span class="color green"></span>
                            <span class="color blue"></span>
                        </h5>
                        <div class="form-item">
                            <?php
//echo $_GET['id'];
if(isset($_GET['id']))
{
  $id=$_GET['id'];
}

$results_per_page = 12;
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
    <input name="product_code" type="hidden" value="{$row["product_code"]}">
    <button type="submit" class="huhu" >Add to Cart</button>

</form>
</li>
EOT;
  }
  else
  {
    $products_list .= <<<EOT
<li>
<form class="form-item">
    <input name="product_code" type="hidden" value="{$row["product_code"]}">
    <button type="submit" >Add to Cart</button>

</form>
</li>
EOT;
  }



}
echo $products_list;



?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--product view end-->
    <br>
    <hr>

    <?php }
    }
}
if(!empty($_SESSION['email']))
{
?>    
    <!-- comment reviews section-->
    <div class="container">
        <div class="row">
            <h2>Leave a Comment</h2>
            <BR>
        </div>
        
        <?php
       // echo $_GET['username'];
         /*$red=mysqli_query($mysqli_conn,"SELECT name FROM customer where $commentmail=customer.email");

             $ax=mysqli_fetch_array($red);
             echo $ax['name'];*/
             
        ?>
        <div class="row">
            <div class="post-footer col-md-6">
                        <div class="input-group"> 
                        <?php
                        echo " <form method='POST' action='commentwrite.php'>
                                <input type='hidden'  name='commentdate' value='".date('Y-m-d H:i:s')."'>
                                <input type='hidden' name='productid' value='".$_GET['id']."'>
                                <input type='hidden' name='userid' value='".$_SESSION['email']."'>
                                <input class='form-control' placeholder='Add a comment' type='text' name='commenting'>
                                <span class='input-group-addon' style='margin-left: 20px;' >
                                <button  type='submit'  ><i class='fa fa-edit'></i></button>  
                            </span>
                                 
                        </form>";
}
                        ?>

                            
                            
                        </div>
            </div>
        </div>
    </div>
<br>

<?php
        
   // echo $_GET['id'];
   $sqlseepost = " SELECT * FROM `comments`  WHERE p_id='".$_GET['id']."'  ORDER BY c_date DESC ";
                    //echo $_GET['tid'];
                    $result =mysqli_query($mysqli_conn,$sqlseepost);
                    while($row1=mysqli_fetch_array($result))
                    {
                         $upv = $row1['likes'];
                        $dwnv = $row1['dislikes'];
//comment show section of each post
         ?> 

<div class="container">
    <div class="row">
        <div class="col-sm-8">
            <div class="panel panel-white post panel-shadow">
                <div class="post-heading">
                    <div class="pull-left image">
                        <img src="http://bootdey.com/img/Content/user_1.jpg" class="img-circle avatar" alt="user profile image">
                    </div>
                    <div class="pull-left meta">
                        <div class="title h5">
                           <?php
                           
                           $db_username        = 'root'; //MySql database username
                            $db_password        = ''; //MySql dataabse password
                            $db_name            = 'hatbazar'; //MySql database name
                            $db_host            = 'localhost';
                           $mysqli_conn2 = new mysqli($db_host, $db_username, $db_password,$db_name); //connect to MySql
                            if ($mysqli_conn2->connect_error) {//Output any connection error
                                die('Error : ('. $mysqli_conn2->connect_errno .') '. $mysqli_conn2->connect_error);
                            } 
                           $re=mysqli_query($mysqli_conn2,"SELECT * FROM customer where email='".$row1['username']."'");
                           $a=mysqli_fetch_array($re);
                                            
                                            ?>
                            <a href="#"><b><?php echo $a['name'];?></b></a>
                            made a comment.
                        </div>
                        <h6 class="text-muted time"><?php echo $row1['c_date'];?></h6>
                    </div>
                </div> 
                <div class="post-description"> 
                    <p><?php echo $row1['message'];?></p>
                    <div class="stats">
                                            <?php
                                    //dekhte hobe current user like or dislike dise naki
                                    $x=$row1['c_id'];
                                    if(!empty($_SESSION['email']))
                                    {
                                     $sql = "SELECT * FROM commentvotes WHERE customer_id = '".$_SESSION['email']."' AND c_id = '".$row1['c_id']."'";
                                    $res = $mysqli_conn->query($sql);
                                    if($res->num_rows>0){
                                        $ret = $res->fetch_assoc();
                                        if($ret['liked']==1){
                                        ?>
                                        <form method="POST">
                                        <?php echo "<input type='hidden' name='c_id' value='".$row1['c_id']."' >";?>
                                        <button  style="color:#008CBA" name="upv"><span class="fa fa-thumbs-up "> <?php echo $upv; ?> </span></button>
                                        <button formaction="Reviews.php?id=<?php echo $_GET['id'] ?>" name="downv"><span class="fa fa-thumbs-down"> <?php echo $dwnv ?></span></button>
                                        </form>
                                        <?php
                                        }
                                        else if($ret['disliked']==1){
                                            ?>
                                            <form method="POST">
                                            <?php echo "<input type='hidden' name='c_id' value='".$row1['c_id']."' >";?>
                                            <button formaction="Reviews.php?id=<?php echo $_GET['id'] ?>" name="upv"><span class="fa fa-thumbs-up "> <?php echo $upv ?> </span></button>
                                            
                                            <button  style="color:#008CBA" name="downv"><span class="fa fa-thumbs-down"> <?php echo $dwnv ?></span></button>
                                            </form>
                                            <?php
                                        }
                                        else{
                                            ?>
                                            <form method="POST">
                                            <?php echo "<input type='hidden' name='c_id' value='".$row1['c_id']."' >";?>
                                            <button formaction="Reviews.php?id=<?php echo $_GET['id'] ?>" name="upv"><span class="fa fa-thumbs-up "> <?php echo $upv ?> </span></button>

                                            <button formaction="Reviews.php?id=<?php echo $_GET['id'] ?>" name="downv"><span class="fa fa-thumbs-down"> <?php echo $dwnv ?></span></button>
                                            </form>
                                            <?php
                                        }
                                        
                                    }
                                    else{
                                        ?>
                                        <form method="POST">
                                         <?php echo "<input type='hidden' name='c_id' value='".$row1['c_id']."' >";?>
                                        <button formaction="Reviews.php?id=<?php echo $_GET['id'] ?>" name="upv"><span class="fa fa-thumbs-up"> <?php echo $upv ?> </span></button>
                                        <button formaction="Reviews.php?id=<?php echo $_GET['id'] ?>" name="downv"><span class="fa fa-thumbs-down"> <?php echo $dwnv ?></span></button>
                                        </form>
                                        <?php
                                    }
                                }
                                    ?>
                    </div>
                </div>
            </div>
        </div>
        
    </div> <!-- reviews comment section-->

</div>
<?php }
?>
<!-- comment reviews section end-->
<hr>
<br>
<div class="card">
<h2>Suggested products</h2>

            <div class="row">
                <div class="portfolio-items">
                    <div class="portfolio-item apps col-xs-12 col-sm-4 col-md-3">
                        <div class="recent-work-wrap">
                        <?php
                        
                        $sql="SELECT * FROM products_list ORDER BY id DESC LIMIT 4 ";
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
<a href="productDetails.php?id={$row['product_code']}">
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
<a href="productDetails.php?id={$row['product_code']}">
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
echo $products_list;?>
                    </div>
                        </div>
                    </div><!--/.portfolio-item-->

                    </div>
            </div>
        
    </section><!--/#portfolio-item-->
    


    <?php include 'footer.php';?>