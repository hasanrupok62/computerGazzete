<?php

require_once "config.inc.php"; //include config file
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php
  
    //include("signf.php");
    //include("loginf.php");
    ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | Computer Gazette</title>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
 <!-- Latest compiled and minified CSS -->
 <link href="css/bootstrap.min.css" rel="stylesheet">
 <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
 
 <link href="styles.css" rel="stylesheet" type="text/css">

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
  <!-- core CSS -->
    
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->
<style>
    body {background-color: #FFFFF;}
  </style>
  <style>
    div.item img{
      max-height: 450px!important;
    }
    .container .jumbotron {
    background: rgb(148, 238, 252) none repeat scroll 0 0;
    padding-left: 60px;
    padding-right: 60px;
}
h5{
      font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
    font-weight: 500;
    line-height: 1.1;
    color: inherit
  }

  </style>


<body class="homepage">

    <header id="header">
        <div class="top-bar">
            <div class="container">
                <div class="row">
                   <div class="col-sm-12 col-xs-8">
                    <div class="collapse navbar-collapse navbar-right">
                          <ul class="nav navbar-nav">
                          <li><a name="signup" type="button" data-toggle="modal" data-target="#myModal" >Signup </a></li> 
                          <li><a type="button" data-toggle="modal" data-target="#yModal">login</a></li>

                         

          
            
      <li><a href="#" class="cart-box" id="cart-info" title="View Cart">
      <?php 
      if(isset($_SESSION["products"])){
        echo count($_SESSION["products"]); 
      }else{
        echo 0; 
      }
      ?>
      </a></li>
      <div class="shopping-cart-box">
      <a href="#" class="close-shopping-cart-box" >Close</a>
      <h3>Your product</h3>
        <div id="shopping-cart-results"></div>
      </div> </div>   





  <!-- Modal -->
  <div class="modal fade" id="yModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Sign In</h4>
        </div>
        <div class="modal-body">

          

    <div class="container-fluid">
   <form action="" method="" class="register-form"> 

      <div class="row">
           <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
              <label for="email">EMAIL</label>
               <input name="email" class="form-control" type="email">             
           </div>            
      </div>
      <div class="row">
           <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
              <label for="password">PASSWORD</label>
               <input name="password" class="form-control" type="password">             
           </div>            
      </div>
      <hr>
            <div class="row">
           <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
           
           <a href="#">Forgot Password</a>

          </div>
          <div class="col-md-3 col-sm-3 col-xs-3 col-lg-3">
           <button class="btn btn-default logbutton">Sign up</button>           
          </div>  

          <div class="col-md-3 col-sm-3 col-xs-3 col-lg-3">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>        
      </div>    
    </form>
  </div>
        </div>
      </div>
        </div>
      </div><!--login-->


       <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Sign Up Now</h4>
        </div>
        <div class="modal-body">

          

    <div class="container-fluid">
   <form action="" method="" class="register-form"> 
      <div class="row">      
           <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
              <label for="firstName">NAME</label>
               <input name="firstName" class="form-control" type="text">    
           </div>            
      </div>
      <div class="row">      
           <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
              <label for="firstName">USER NAME</label>
               <input name="firstName" class="form-control" type="text">    
           </div>            
      </div>
      <div class="row">
           <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
              <label for="email">EMAIL</label>
               <input name="email" class="form-control" type="email">             
           </div>            
      </div>

        <div class="row">
           <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
               <label for="password">PASSWORD</label>
               <input name="password" class="form-control" type="password">

          </div>
          <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
          <img src="images/gmail.jpg" alt="Mountain View" style="width:250px;height:80px;">           
          </div>          
      </div>

      <div class="row">
           <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
              <label for="password">CONFIRM PASSWORD</label>
               <input name="password" class="form-control" type="password">

          </div>
          <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
          <img src="images/facebook.jpg" alt="Mountain View" style="width:250px;height:80px;">           
          </div>          
      </div> 
      <hr>
      <div class="row">
           <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
           
           <a href="#">Forgot Password</a>

          </div>
          <div class="col-md-3 col-sm-3 col-xs-3 col-lg-3">
           <button class="btn btn-default logbutton">Sign up</button>           
          </div>  

          <div class="col-md-3 col-sm-3 col-xs-3 col-lg-3">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div> 


      </div> 

  
    </form>
  </div>
    

      
    </div>
  </div>
  
</div>
</div>

                            <div class="col-xs-6 col-xs-offset-2">
                                <div class="input-group">
                                    <div class="input-group-btn search-panel">
                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                            <span id="search_concept">Filter by</span> <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu" role="menu">
                                          <li><a href="#contains">Desktop</a></li>
                                          <li><a href="#its_equal">Laptop</a></li>
                                          <li><a href="#greather_than">Components</a></li>
                                          <li><a href="#less_than">Gaming </a></li>
                                          <li class="divider"></li>
                                          <li><a href="#all">Anything</a></li>
                                        </ul>
                                    </div>
                                    <input type="hidden" name="search_param" value="all" id="search_param">         
                                    <input type="text" class="form-control" name="x" placeholder="Search term...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span></button>
                                    </span>
                                </div>
                            </div>

                    </div>
                </div>

            </div><!--/.container-->
        </div><!--/.top-bar-->

        <nav class="navbar navbar-inverse" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php"><img src="images/logo.png" alt="logo"></a>
                </div>
        
                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="index.php">Home</a></li>
                        <li><a href="Videos.php">Videos</a></li>
                       
                        <li><a href="Reviews.php">Reviews</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Categories <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <ul class = "dropdown-menu">
                                 <li><a href = "product.php?id=4">Laptop</a></li>
                                 <li><a href = "product.php?id=5">Desktop</a></li>
                                 <li><a href = "product.php?id=8">NoteBook</a></li>
                                 <li><a href = "product.php?id=6">Printer</a></li>
                                 <li><a href = "product.php?id=8">Networking Accessories</a></li>
                                 <li><a href = "product.php?id=7">Fruits</a></li>
                            </ul>                                   
                          </ul>
                       <li><a href="contact-us.php">Contact</a></li> 
                    </ul>   
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->
    
    </header><!--/header-->

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
   <br><br>
   <div class="entry-meta"  style="font-size:25px;text-align:center">
   <br><br>
    <span  id="publish_date">LAPTOP</span>
    <br><br>
    <hr>
   </div>
<?php
  }
  if($id==5){
   ?>
   <br><br>
   <div class="entry-meta"  style="font-size:25px;text-align:center;">
   <br><br>
    <span  id="publish_date">DESKTOP</span>
    <br><br>
    <hr>
   </div>
<?php
  }
  if($id==8){
   ?>
   <br><br>
   <div class="entry-meta"  style="font-size:25px;text-align:center">
   <br><br>
    <span  id="publish_date">NOTEBOOK</span>
    <br><br>
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
echo"<br><br>";
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
    
            
