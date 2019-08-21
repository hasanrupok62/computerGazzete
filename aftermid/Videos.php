<?php 
include('header.php');
include('theater.php');
	
	?>
	<div >
		<div class="container" background="//images/item3.png">
			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header">
					 
						<img src="images/ico/videoico.png" class="avatar-xs">
						 LATEST VIDEOS
						
					</h1>
				</div>
			</div>
			<!-- Projects Row first part -->
			<div class="row">
			<?php 
  
			  	     $sql5="SELECT * FROM video ORDER BY v_id DESC LIMIT 4";
			          $result=mysqli_query($mysqli_conn,$sql5);
			        
			       if(mysqli_num_rows($result) > 0)
			       {
			       		while ($row = mysqli_fetch_array($result))
			       		 {
			     	?> 
					<div class="col-md-3 portfolio-item">
					 <a href="#">
		                 <div class="col-lg-13">
		                      <iframe class="col-md-11 portfolio-item" src="<?php echo $row["vlink"]; ?>"></iframe>
		                 </div>
	              	</a>
	              	<h4><?php echo $row["vtitle"]; ?></h4>
	              	<h3>Release on: <?php echo $row["vdate"]; ?></h3>
             		 <a class="btn btn-primary" href="#"  data-toggle="modal" data-target="#videoModal" data-theVideo="<?php echo $row["vlink"]; ?>">Play In Theater Mode<span class="glyphicon glyphicon-chevron-right"></span>
             		 
             		 </a>
             		 </div>
             		 <?php  
			            }  
			        }  

			      else
			      {
			        echo "Something Wrong";
			      }
			      ?>
			</div>
			 
			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header">
						<img src="images/ico/videoico.png" class="avatar-xs">
						 TOP VIDEOS
					</h1>
				</div><!-- Projects Row 2nd part -->
			</div>
			<!-- Projects Row second part-->
			<div class="row">
			<?php 
  
			  	     $sql5="SELECT * FROM video ORDER BY v_id ASC LIMIT 4";
			          $result=mysqli_query($mysqli_conn,$sql5);
			        
			       if(mysqli_num_rows($result) > 0)
			       {
			       		while ($row = mysqli_fetch_array($result))
			       		 {
			     	?> 
					<div class="col-md-3 portfolio-item">
					 <a href="#">
		                 <div class="col-lg-13">
		                      <iframe class="col-md-11 portfolio-item" src="<?php echo $row["vlink"]; ?>"></iframe>
		                 </div>
	              	</a>
	              	<h4><?php echo $row["vtitle"]; ?></h4>
	              	<h3>Release on: <?php echo $row["vdate"]; ?></h3>
             		 <a class="btn btn-primary" href="#"  data-toggle="modal" data-target="#videoModal" data-theVideo="<?php echo $row["vlink"]; ?>">Play In Theater Mode<span class="glyphicon glyphicon-chevron-right"></span>
             		 
             		 </a>
             		 </div>
             		 <?php  
			            }  
			        }  

			      else
			      {
			        echo "Something Wrong";
			      }
			      ?>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header">
						<img src="images/ico/videoico.png" class="avatar-xs">
						 SUGGESTED VIDEOS
					
					</h1>
				</div>
			</div>
			<!-- Projects Row third part-->
			<div class="row">
			<?php 
  
			  	     $sql5="SELECT * FROM video  LIMIT 6";
			          $result=mysqli_query($mysqli_conn,$sql5);
			        
			       if(mysqli_num_rows($result) > 0)
			       {
			       		while ($row = mysqli_fetch_array($result))
			       		 {
			     	?> 
					<div class="col-md-3 portfolio-item">
					 <a href="#">
		                 <div class="col-lg-13">
		                      <iframe class="col-md-11 portfolio-item" src="<?php echo $row["vlink"]; ?>"></iframe>
		                 </div>
	              	</a>
	              	<h4><?php echo $row["vtitle"]; ?></h4>
	              	<h3>Release on: <?php echo $row["vdate"]; ?></h3>
             		 <a class="btn btn-primary" href="#"  data-toggle="modal" data-target="#videoModal" data-theVideo="<?php echo $row["vlink"]; ?>">Play In Theater Mode<span class="glyphicon glyphicon-chevron-right"></span>
             		 
             		 </a>
             		 </div>
             		 <?php  
			            }  
			        }  

			      else
			      {
			        echo "Something Wrong";
			      }
			      ?>
			</div>
		</div>
	</body>
</html>

<style>


/*! * Start Bootstrap - Simple Sidebar (http://startbootstrap.com/) * Copyright 2013-2016 Start Bootstrap * Licensed under MIT (https://github.com/BlackrockDigital/startbootstrap/blob/gh-pages/LICENSE) */

/* Toggle Styles */


/* Sidebar Styles */


li a.activer
{
	color: #18bc9c;
}

.point
{
	cursor: pointer;
}

.text-decoration
{
	text-decoration: none;
}

.avatar-md
{
	border-radius: 100%;
	height: 100px;
	width: 100px;
}

.avatar-xs
{
	border-radius: 100%;
	height: 25px;
	width: 25px;
}

.slide-image
{
	width: 100%;
}

.carousel-holder
{
	margin-bottom: 30px;
}

.carousel-control,.item
{
	border-radius: 4px;
}

.caption
{
	height: 130px;
	overflow: hidden;
}

.caption h4
{
	white-space: nowrap;
}

.thumbnail img
{
	width: 100%;
}

.ratings
{
	padding-right: 10px;
	padding-left: 10px;
	color: #d17581;
}

h1.page-header {
    font-size: 36px;
    color: #000000;
}


.thumbnail
{
	padding: 0;
}

.thumbnail .caption-full
{
	padding: 9px;
	color: #333;
}

footer
{
	margin: 50px 0;
}

.portfolio-item
{
	margin-bottom: 25px;
}
</style>
	</div>

<?php 
	include('footer.php');
	?>