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
    <link href="styles.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/font-awesome.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
    <!-- core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link href="login.css" rel="stylesheet">
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
    .col-xs-5 {
    width: 45.667%;
    padding-top: 20px;
}
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
    </style>
    <body class="homepage">
      <header id="header">
        <div class="top-bar">
          <div class="container">
            <div class="row">
              <div class="col-sm-12 col-xs-8">
                <div class="collapse navbar-collapse navbar-right">
                  <ul class="nav navbar-nav">
                    <?php if (isset($_SESSION['email'])) { ?>
                    <li><a href="logout.php">Log out</a></li>
                    <?php }else{
                    echo '<li><a href = "login.php">Login</a></li>
                    <li><a href="signup.php">Registration</a></li>';
                    } ?>
                    <li><a href="c.php" class="compare" title="Compare">Compare <span id="compare"></span>
                      
                    </a></li>                    <li><a href="#" class="cart-box" id="cart-info" title="View Cart">
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
                    <div class="col-xs-5 col-xs-offset-1">
                      <form action="search.php" method="get">
                        <div class="input-group">
                          <div class="input-group-btn search-panel">
                            <select name="filter" class="btn btn-default dropdown-toggle" data-toggle="dropdown" style="height: 34px;">
                              <option value="">Filter</option>
                              <?php $sql="SELECT * FROM category";
                              $result=mysqli_query($mysqli_conn, $sql);
                              if ($result->num_rows):
                              while ($row=mysqli_fetch_assoc($result)):
                              echo '<option value="'.$row['cat_id'].'">'.$row['cat_name'].'</option>';
                              endwhile;
                              else:
                              
                              endif; ?>
                            </select>
                            
                          </div>
                          <input type="text" class="form-control" name="q" placeholder="Search term...">
                          <span class="input-group-btn">
                            <button class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
                          </span>
                        </div>
                      </form>
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
                        <li><a href="index.php">Home</a></li>
                        <li><a href="Videos.php">Videos</a></li>
                        <li><a href="news.php">News</a></li>
                        <li><a href="Reviews1.php">Reviews</a></li>
                        <li><a href="category.php">Shop</a></li>
                        <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Categories <i class="fa fa-angle-down"></i></a>
                          <ul class="dropdown-menu">
                            <ul class = "dropdown-menu">
                              <li><a href = "product.php?id=4">Laptop</a></li>
                              <li><a href = "product.php?id=5">Desktop</a></li>
                              <li><a href = "product.php?id=8">NoteBook</a></li>
                              <li><a href = "product.php?id=6">Printer</a></li>
                              <li><a href = "product.php?id=8">Networking Accessories</a></li>
                            </ul>
                          </ul>
                          <li><a href="contact-us.php">Contact</a></li>
                        </ul>
                      </div>
                      </div><!--/.container-->
            </nav><!--/nav-->
       </header><!--/header-->



<!--top-->
  <style>
#myBtn {
  display: none;
  position: fixed;
  bottom: 20px;
  right: 30px;
  z-index: 99;
  border: none;
  outline: none;
  background-color: red;
  color: white;
  cursor: pointer;
  padding: 15px;
  border-radius: 10px;
}

#myBtn:hover {
  background-color: #555;
}
</style>

<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>


<script>
// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("myBtn").style.display = "block";
    } else {
        document.getElementById("myBtn").style.display = "none";
    }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}
</script>

