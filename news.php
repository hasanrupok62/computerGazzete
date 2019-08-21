<?php

include 'header.php';
include("cart.php");
include("config.inc.php"); //include config file
?>
<head>
<title>News | Computer Gazette</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<link href="newsjs/style.css" rel="stylesheet" type="text/css" media="all" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Graphic Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
<style type="text/css">

h1.page-header {
    font-size: 26px;
    color: #000000;
}
h4.page-header {
    font-size: 16px;
    color: #FFF;
}
.thumbnail .caption-full
{
    padding: 9px;
    color: #333;
}
.avatar-xs {
    border-radius: 100%;
    height: 25px;
    width: 25px;
}
</style>
<script src="newsjs/jquery.min.js"></script>
<script>//for news
    $(document).ready(function () {
        size_li = $("#myList li").size();
        x=1;
        $('#myList li').not(':lt('+x+')').hide();
        $('#myList li:lt('+x+')').show();
        $('#loadMore').click(function () {
            x= (x+1 <= size_li) ? x+1 : size_li;
            $('#myList li:lt('+x+')').show();
        });
        $('#showLess').click(function () {
            x=(x-1<0) ? 1 : x-1;
            $('#myList li').not(':lt('+x+')').hide();
        });
    });
</script>

<div class="content">
  <div class="container">
    <div class="load_more"> 
       <ul id="myList">
        <!-- These are our grid blocks -->

        <?php
        
        
        //Return a substring of news to crop the body of news into a short part to fit into the box | START//
        function truncate($string,$length=150,$append="&hellip;")
        {
          $string = trim($string);
          if(strlen($string) > $length)
          {
          $string = wordwrap($string, $length);
          $string = explode("\n", $string, 2);
          $string = $string[0] . $append;
          }
          return $string;
        }
        //Return a substring of news to crop the body of news into a short part to fit into the box | END//
        
        
//News Posts | START//        
          $allNews = array();
          $allNewsDatabase = mysqli_query($mysqli_conn,"Select * FROM `news` WHERE Status=1 ORDER BY `Modification Date` ASC");
          while ($record = mysqli_fetch_array($allNewsDatabase))
          {
            $allNews[] = $record;
          }

          for ($x = 0; $x < count($allNews); $x++)
          {
            if($x%4==0)
              echo "<li style='display: list-item;'><div class='l_g'>";

        ?>
            <div class="col-md-3 praesent">
              <div class="l_g_r">
                <div class="dapibus">
                  <?php echo "<h2>" . $allNews[$x]['Subject'] . "<h2>"; ?>
                  <?php echo "<p class='adm'>". $allNews[$x]['Modification Date'] ."</p>"; ?>
                  <?php echo "<a href='newsDetails.php?NewsID=" . $allNews[$x]['NewsID'] . "' target='_blank'><img src='" . $allNews[$x]['Image'] . "' class='img-responsive' alt=''></a>"; ?>
                  <?php echo "<p>" . truncate($allNews[$x]['Body'],$length=100) . "</p>"; ?>
                  <?php echo "<a href='newsDetails.php?NewsID=" . $allNews[$x]['NewsID'] . "' target='_blank' class='link'>Read More</a>"; ?>
                </div>
              </div>
            </div>

        <?php
            if(($x+1)%4==0)
              echo "</div></li><div class='clearfix'></div><br>";
          }
//News Posts | END//        
        ?>
      </ul>

      <div class="clearfix"></div>
      <br></br>
      <div id="loadMore">Load more</div>
      <div id="showLess">Show less</div>

    </div>
  </div>
</div>
<!-- content -->





<section id="main-slider" class="no-margin">
     <h1 class="page-header"><img src="images/services/services1.png" class="avatar-xs"> New Arrival Products </h1>
    <?php

    $x=0;
    $sql = "SELECT * FROM products_list Order BY id DESC LIMIT 5";
    $result = mysqli_query($mysqli_conn , $sql);
    while($row = mysqli_fetch_array($result))
    {
                

            ?>
    <div class="mySlides1">
        <div class="carousel slide">
            <div class="item active" style="background-image: url(images/slider/bg3.jpg)">
                <div class="container">
                
                    <div class="row slide-margin">
                        <div class="col-sm-6">
                            <div class="carousel-content">
                                <h1 class="animation animated-item-1"><?php echo $row['product_name']; ?></h1>

                                <a class="btn-slide animation animated-item-3" href="Reviews.php?id=<?php echo $row['id'] ?>">Read More</a>
                               
                            </div>
                        </div>

                        <div class="col-sm-6 hidden-xs animation animated-item-4">
                            <div class="slider-img">
                                <img src="images/<?php echo $row['product_image']; ?>" class="img-responsive" alt="Cinque Terre" width="500" height="550">
                            </div>
                        </div>

                    </div>
                </div>
            </div><!--/.item-->

        </div><!--/.carousel-inner-->
    </div><!--/.carousel-->
     <?php
     
    }

     ?>
     <a class="prev hidden-xs" href="#main-slider" data-slide="prev" onclick="plusDivs1(-1)">
        <i class="fa fa-chevron-left">
            
        </i>
    </a>
    <a class="next hidden-xs" href="#main-slider" data-slide="next" onclick="plusDivs1(1)">
        <i class="fa fa-chevron-right">
        </i>
    </a>
                
</section><!--/#main-slider-->



    </div>


<?php 
include("footer.php");

?>
<script>
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  if (n > x.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";  
  }
  x[slideIndex-1].style.display = "block";  
}
</script>
<script>
var slideIndex1 = 1;
showDivs(slideIndex1);

function plusDivs1(n) {
  showDivs(slideIndex1 += n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides1");
  if (n > x.length) {slideIndex1 = 1}    
  if (n < 1) {slideIndex1 = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";  
  }
  x[slideIndex1-1].style.display = "block";  
}
</script>