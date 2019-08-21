<?php 
include('header.php');
include('theater.php');
	
?>
<?php
if(isset($_SESSION['email']) && (isset($_POST['upv']) || isset($_POST['downv']) && isset($_SESSION['email']) )){
    //del prev votes
    $usid = $_SESSION['email'];
    $rvid = $_POST['c_id'];
   // echo $_POST['c_id'];
    $sql = "SELECT * FROM vvotes WHERE  customer_id='$usid' AND v_id='".$_POST['c_id']."' ";
    $res = $mysqli_conn->query($sql);
    $ret1 = $res->fetch_assoc();
    if($ret1['customer_id']==$_SESSION['email']){
    //del prev post likes/dislikes
    $sql = "SELECT * FROM vvotes WHERE customer_id='$usid' AND v_id='$rvid'";//email and p_id
    $res = $mysqli_conn->query($sql);
    if($res->num_rows>0){
        $ret = $res->fetch_assoc();
        if($ret['liked']==1){
            $sql = "SELECT * FROM video WHERE v_id='$rvid'";
            $res = $mysqli_conn->query($sql);
            $ret = $res->fetch_assoc();
            $w = $ret['vlikes'] - 1;
            $sql = "UPDATE video SET vlikes = $w WHERE v_id='$rvid'";
            $mysqli_conn->query($sql);
        }else{
            $sql = "SELECT * FROM video WHERE v_id='$rvid'";
            $res = $mysqli_conn->query($sql);
            $ret = $res->fetch_assoc();
            $w = $ret['vdislikes'] - 1;
            $sql = "UPDATE video SET vdislikes = $w WHERE v_id=$rvid";
            $mysqli_conn->query($sql);
        }
    }



    $sql = "DELETE FROM vvotes WHERE customer_id='$usid' AND v_id='$rvid'";
    $mysqli_conn->query($sql);
    if(isset($_POST['upv'])){
        $sql = "INSERT INTO vvotes(v_id,customer_id,liked,disliked) VALUES ('".$_POST['c_id']."','".$_SESSION['email']."','1','0')";
        $res = $mysqli_conn->query($sql);

        $sql = "SELECT * FROM video WHERE v_id='".$_POST['c_id']."'";
        $res = $mysqli_conn->query($sql);
        $ret = $res->fetch_assoc();
        $w = $ret['vlikes'] + 1;
        $sql = "UPDATE video SET vlikes = $w WHERE v_id='".$_POST['c_id']."'";
        $mysqli_conn->query($sql);

       
    }
    if(isset($_POST['downv'])){
        $sql = "INSERT INTO vvotes(v_id,customer_id,liked,disliked) VALUES ('".$_POST['c_id']."','".$_SESSION['email']."','0','1')";
        $res = $mysqli_conn->query($sql);

        $sql = "SELECT * FROM video WHERE v_id='$rvid'";
        $res = $mysqli_conn->query($sql);
        $ret = $res->fetch_assoc();
        $w = $ret['vdislikes'] + 1;
        $l = $ret['vlikes'];
        $sql = "UPDATE video SET vdislikes = $w WHERE v_id=$rvid";
        $mysqli_conn->query($sql);

        //auto removal diff between up and down 100
        
    }
    }
    else
    {
        $sql = "SELECT * FROM vvotes WHERE customer_id='$usid' AND v_id='$rvid'";//email and p_id
    $res = $mysqli_conn->query($sql);
    if($res->num_rows>0){
        $ret = $res->fetch_assoc();
        if($ret['liked']==1){
            $sql = "SELECT * FROM video WHERE v_id='$rvid'";
            $res = $mysqli_conn->query($sql);
            $ret = $res->fetch_assoc();
            $w = $ret['vlikes'] - 1;
            $sql = "UPDATE video SET vlikes = $w WHERE v_id='$rvid'";
            $mysqli_conn->query($sql);
        }else{
            $sql = "SELECT * FROM video WHERE v_id='$rvid'";
            $res = $mysqli_conn->query($sql);
            $ret = $res->fetch_assoc();
            $w = $ret['vdislikes'] - 1;
            $sql = "UPDATE video SET vdislikes = $w WHERE v_id=$rvid";
            $mysqli_conn->query($sql);
        }
    }
        if(isset($_POST['upv'])){
        $sql = "INSERT INTO vvotes(v_id,customer_id,liked,disliked) VALUES ('".$_POST['c_id']."','".$_SESSION['email']."','1','0')";
        $res = $mysqli_conn->query($sql);

        $sql = "SELECT * FROM video WHERE v_id='".$_POST['c_id']."'";
        $res = $mysqli_conn->query($sql);
        $ret = $res->fetch_assoc();
        $w = $ret['vlikes'] + 1;
        $sql = "UPDATE video SET vlikes = $w WHERE v_id='".$_POST['c_id']."'";
        $mysqli_conn->query($sql);

       
    }
    if(isset($_POST['downv'])){
        $sql ="INSERT INTO vvotes(v_id,customer_id,liked,disliked) VALUES ('".$_POST['c_id']."','".$_SESSION['email']."','0','1')";
        $res = $mysqli_conn->query($sql);

        $sql = "SELECT * FROM video WHERE v_id='$rvid'";
        $res = $mysqli_conn->query($sql);
        $ret = $res->fetch_assoc();
        $w = $ret['vdislikes'] + 1;
        $l = $ret['vlikes'];
        $sql = "UPDATE video SET vdislikes = $w WHERE v_id=$rvid";
        $mysqli_conn->query($sql);

        //auto removal diff between up and down 100
        
    }
    }
    
    
}
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
			       		 	$upv = $row['vlikes'];
                        	$dwnv = $row['vdislikes'];

			     	?> 
					<div class="col-md-3 portfolio-item">
					 <a href="#">
		                 <div class="col-lg-13">
		                      <iframe class="col-md-11 portfolio-item" src="<?php echo $row["vlink"]; ?>"></iframe>
		                 </div>
	              	</a>
	              	<h4><?php echo $row["vtitle"]; ?></h4>
	              	<h3>Release on: <?php echo $row["vdate"]; ?></h3>
             		 <a class="btn btn-primary" href=""  data-toggle="modal" data-target="#videoModal" data-theVideo="<?php echo $row["vlink"]; ?>">Play In Theater Mode<span class="glyphicon glyphicon-chevron-right"></span>
             		 
             		 </a>
             		 <?php
             		  if(empty($_SESSION['email']))
                                    {
                                     
                                        ?>
                                        
                                        <form method="">
                                        
                                        <button  name="upv"><span class="fa fa-thumbs-up"> <?php echo $upv ?> </span></button>
                                        <button  name="downv"><span class="fa fa-thumbs-down"> <?php echo $dwnv ?></span></button>
                                        </form>
                                        <?php
                                    }
                                

                        else
					      {
					         $sql = "SELECT * FROM vvotes WHERE customer_id = '".$_SESSION['email']."' AND v_id = '".$row['v_id']."'";
                                    $res = $mysqli_conn->query($sql);
                                    if($res->num_rows>0){
                                        $ret = $res->fetch_assoc();
                                        if($ret['liked']==1){
                                        ?>
                                        <form method="POST">
                                        <?php echo "<input type='hidden' name='c_id' value='".$row['v_id']."' >";?>
                                        <button  style="color:#008CBA" name="upv"><span class="fa fa-thumbs-up "> <?php echo $upv; ?> </span></button>
                                        <button formaction="Videos.php" name="downv"><span class="fa fa-thumbs-down"> <?php echo $dwnv ?></span></button>
                                        </form>
                                        <?php
                                        }
                                        else if($ret['disliked']==1){
                                            ?>
                                            <form method="POST">
                                            <?php echo "<input type='hidden' name='c_id' value='".$row['v_id']."' >";?>
                                            <button formaction="Videos.php" name="upv"><span class="fa fa-thumbs-up "> <?php echo $upv ?> </span></button>
                                            
                                            <button  style="color:#008CBA" name="downv"><span class="fa fa-thumbs-down"><?php echo $dwnv  ?></span></button>
                                            </form>
                                            <?php
                                        }
                                        else{
                                            ?>
                                            <form method="POST">
                                            <?php echo "<input type='hidden' name='c_id' value='".$row['v_id']."' >";?>
                                            <button formaction="Videos.php" name="upv"><span class="fa fa-thumbs-up "> <?php echo $upv ?> </span></button>

                                            <button formaction="Videos.php" name="downv"><span class="fa fa-thumbs-down"> <?php echo $dwnv ?></span></button>
                                            </form>
                                            <?php
                                        }
                                        
                                    }
                                    else{
                                        ?>
                                        <form method="POST">
                                         <?php echo "<input type='hidden' name='c_id' value='".$row['v_id']."' >";?>
                                        <button formaction="Videos.php" name="upv"><span class="fa fa-thumbs-up"> <?php echo $upv ?> </span></button>
                                        <button formaction="Videos.php" name="downv"><span class="fa fa-thumbs-down"> <?php echo $dwnv ?></span></button>
                                        </form>
                                        <?php
                                    }
                                }
                                    ?>

					     

             		 </div>
             		 <?php  
			            }  
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
  
			  	     $sql5="SELECT * FROM video ORDER BY vlikes DESC LIMIT 4";
			          $result=mysqli_query($mysqli_conn,$sql5);
			        
			       if(mysqli_num_rows($result) > 0)
			       {
			       		while ($row = mysqli_fetch_array($result))
			       		 {
			       		 	$upv = $row['vlikes'];
                        	$dwnv = $row['vdislikes'];

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
             		  <?php
             		  if(empty($_SESSION['email']))
                                    {
                                     
                                        ?>
                                        
                                        <form method="">
                                        
                                        <button  name="upv"><span class="fa fa-thumbs-up"> <?php echo $upv ?> </span></button>
                                        <button  name="downv"><span class="fa fa-thumbs-down"> <?php echo $dwnv ?></span></button>
                                        </form>
                                        <?php
                                    }
                                

                        else
					      {
					         $sql = "SELECT * FROM vvotes WHERE customer_id = '".$_SESSION['email']."' AND v_id = '".$row['v_id']."'";
                                    $res = $mysqli_conn->query($sql);
                                    if($res->num_rows>0){
                                        $ret = $res->fetch_assoc();
                                        if($ret['liked']==1){
                                        ?>
                                        <form method="POST">
                                        <?php echo "<input type='hidden' name='c_id' value='".$row['v_id']."' >";?>
                                        <button  style="color:#008CBA" name="upv"><span class="fa fa-thumbs-up "> <?php echo $upv; ?> </span></button>
                                        <button formaction="Videos.php" name="downv"><span class="fa fa-thumbs-down"> <?php echo $dwnv ?></span></button>
                                        </form>
                                        <?php
                                        }
                                        else if($ret['disliked']==1){
                                            ?>
                                            <form method="POST">
                                            <?php echo "<input type='hidden' name='c_id' value='".$row['v_id']."' >";?>
                                            <button formaction="Videos.php" name="upv"><span class="fa fa-thumbs-up "> <?php echo $upv ?> </span></button>
                                            
                                            <button  style="color:#008CBA" name="downv"><span class="fa fa-thumbs-down"><?php echo $dwnv  ?></span></button>
                                            </form>
                                            <?php
                                        }
                                        else{
                                            ?>
                                            <form method="POST">
                                            <?php echo "<input type='hidden' name='c_id' value='".$row['v_id']."' >";?>
                                            <button formaction="Videos.php" name="upv"><span class="fa fa-thumbs-up "> <?php echo $upv ?> </span></button>

                                            <button formaction="Videos.php" name="downv"><span class="fa fa-thumbs-down"> <?php echo $dwnv ?></span></button>
                                            </form>
                                            <?php
                                        }
                                        
                                    }
                                    else{
                                        ?>
                                        <form method="POST">
                                         <?php echo "<input type='hidden' name='c_id' value='".$row['v_id']."' >";?>
                                        <button formaction="Videos.php" name="upv"><span class="fa fa-thumbs-up"> <?php echo $upv ?> </span></button>
                                        <button formaction="Videos.php" name="downv"><span class="fa fa-thumbs-down"> <?php echo $dwnv ?></span></button>
                                        </form>
                                        <?php
                                    }
                                }
                                    ?>

					     

             		 </div>
             		 <?php  
			            }  
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
			       		 	$upv = $row['vlikes'];
                        	$dwnv = $row['vdislikes'];

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
             		 
             		 </a><?php
             		  if(empty($_SESSION['email']))
                                    {
                                     
                                        ?>
                                        
                                        <form method="">
                                        
                                        <button  name="upv"><span class="fa fa-thumbs-up"> <?php echo $upv ?> </span></button>
                                        <button  name="downv"><span class="fa fa-thumbs-down"> <?php echo $dwnv ?></span></button>
                                        </form>
                                        <?php
                                    }
                                

                        else
					      {
					         $sql = "SELECT * FROM vvotes WHERE customer_id = '".$_SESSION['email']."' AND v_id = '".$row['v_id']."'";
                                    $res = $mysqli_conn->query($sql);
                                    if($res->num_rows>0){
                                        $ret = $res->fetch_assoc();
                                        if($ret['liked']==1){
                                        ?>
                                        <form method="POST">
                                        <?php echo "<input type='hidden' name='c_id' value='".$row['v_id']."' >";?>
                                        <button  style="color:#008CBA" name="upv"><span class="fa fa-thumbs-up "> <?php echo $upv; ?> </span></button>
                                        <button formaction="Videos.php" name="downv"><span class="fa fa-thumbs-down"> <?php echo $dwnv ?></span></button>
                                        </form>
                                        <?php
                                        }
                                        else if($ret['disliked']==1){
                                            ?>
                                            <form method="POST">
                                            <?php echo "<input type='hidden' name='c_id' value='".$row['v_id']."' >";?>
                                            <button formaction="Videos.php" name="upv"><span class="fa fa-thumbs-up "> <?php echo $upv ?> </span></button>
                                            
                                            <button  style="color:#008CBA" name="downv"><span class="fa fa-thumbs-down"><?php echo $dwnv  ?></span></button>
                                            </form>
                                            <?php
                                        }
                                        else{
                                            ?>
                                            <form method="POST">
                                            <?php echo "<input type='hidden' name='c_id' value='".$row['v_id']."' >";?>
                                            <button formaction="Videos.php" name="upv"><span class="fa fa-thumbs-up "> <?php echo $upv ?> </span></button>

                                            <button formaction="Videos.php" name="downv"><span class="fa fa-thumbs-down"> <?php echo $dwnv ?></span></button>
                                            </form>
                                            <?php
                                        }
                                        
                                    }
                                    else{
                                        ?>
                                        <form method="POST">
                                         <?php echo "<input type='hidden' name='c_id' value='".$row['v_id']."' >";?>
                                        <button formaction="Videos.php" name="upv"><span class="fa fa-thumbs-up"> <?php echo $upv ?> </span></button>
                                        <button formaction="Videos.php" name="downv"><span class="fa fa-thumbs-down"> <?php echo $dwnv ?></span></button>
                                        </form>
                                        <?php
                                    }
                                }
                                    ?>

					     

             		 </div>
             		 <?php  
			            }  
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