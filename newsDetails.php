<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php

require_once "config.inc.php"; //include config file
include('header.php');
include('theater.php');
$NewsID = $_GET["NewsID"];
$query = mysqli_query($mysqli_conn,"Select * FROM `news` WHERE Status=1 AND NewsID='".$NewsID."'");
$singleNews = mysqli_fetch_array($query);
$totalComments=mysqli_fetch_array(mysqli_query($mysqli_conn,"Select COUNT(`CommentID`) FROM `comment on news` WHERE Status=1 AND NewsID='".$NewsID."'"))['COUNT(`CommentID`)'] ;


    $db_username        = 'root'; //MySql database username
                            $db_password        = ''; //MySql dataabse password
                            $db_name            = 'hatbazar'; //MySql database name
                            $db_host            = 'localhost';
                           $mysqli_conn4 = new mysqli($db_host, $db_username, $db_password,$db_name); //connect to MySql
                            if ($mysqli_conn4->connect_error) {//Output any connection error
                                die('Error : ('. $mysqli_conn4->connect_errno .') '. $mysqli_conn4->connect_error);
                            } 


?>



<!DOCTYPE HTML>
<html>
<head>
<?php echo "<title>" . $singleNews['Subject'] . " | Computer Gazette</title>"; ?>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<link href="newsjs/style.css" rel="stylesheet" type="text/css" media="all" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Graphic Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ } </script>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
<script src="newsjs/jquery.min.js"></script>
</head>
<body>

	<div class="details">
		<div class="container">
			<?php echo "<div class='det_pic'><img src='" . $singleNews['Image'] . "' class='img-responsive' alt=''>"; ?>
			</div>
			<div class="det_text">
			<?php echo "<p>" . $singleNews['Body'] . "</p>"; ?>
			</div>
			<ul class="links">
				  		 <?php echo "<li><i class='date'> </i><span class='icon_text'>" . $singleNews['Modification Date'] . "</span></li>"; ?>
				  		 <?php echo "<li><a href='userDetails.php?username=". $singleNews['Modified_By'] ."' target='_blank'><i class='admin'> </i><span class='icon_text'>" . $singleNews['Modified_By'] . "</span></a></li>"; ?>
				  		<!-- <li class="last"><a href="#"><i class="permalink"> </i><span class="icon_text">Permalink</span></a></li>-->
				    </ul>
					<ul class="links_middle">
			  		     <li><a href="#"><i class="title-icon"> </i><span class="icon_text">Computer Gazette</span></a></li>
		  		    </ul>-
					<ul class="links_bottom">
		  		    	<li><a href="#"><i class="comments"> </i><span class="icon_text"><?php echo $totalComments ?> Comments</span></a></li>
			  		
		  		    </ul>
					
					
					
<!-- Show Comments section | START-->					
			 <div class="comments1">
				<h4>COMMENTS</h4>

				<?php
				$allComments = array();
				$allCommentsDatabase = mysqli_query($mysqli_conn4,"Select * FROM `comment on news` WHERE Status=1 AND NewsID='".$NewsID."' ORDER BY `Modification Date` DESC");
				while ($record = mysqli_fetch_array($allCommentsDatabase))
				{
					$allComments[] = $record;
				}
				
				if(count($allComments)==0)
				{
					echo "No one has commented yet. Be the first person to comment on this post!";
				}

				for ($x = 0; $x < count($allComments); $x++)
				{
							$db_username        = 'root'; //MySql database username
                            $db_password        = ''; //MySql dataabse password
                            $db_name            = 'hatbazar'; //MySql database name
                            $db_host            = 'localhost';
                           $mysqli_conn2 = new mysqli($db_host, $db_username, $db_password,$db_name); //connect to MySql
                            if ($mysqli_conn2->connect_error) {//Output any connection error
                                die('Error : ('. $mysqli_conn2->connect_errno .') '. $mysqli_conn2->connect_error);
                            } 
                           $re=mysqli_query($mysqli_conn2,"SELECT * FROM customer where id='".$allComments[$x]['customer_id']."'");
                           $a=mysqli_fetch_array($re);
				?>

					<?php echo "<div class='comments-main' id='".$allComments[$x]['customer_id']."'>";?>
							<div class="col-md-2 cmts-main-left">
								<img src="images/avatar.png" alt="">
							</div>
							<div class="col-md-10 cmts-main-right">
								<?php echo "<h5>".$a['name']."</h5>";?>
								<?php echo "<p>".$allComments[$x]['Comment']."</p>";?>
								<div class="cmts">
									<div class="cmnts-left">
										<?php echo "<p>On ".$allComments[$x]['Modification Date']."</p>";?>
									</div>
									
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="clearfix"></div>
						</div>
			<?php
				}
			?>
			</div>

<!-- Show Comments section | END-->					




<!-- Leave Comment section | START-->					
			<div class="lev">
			<div class="leave">
				<h4>Leave a comment</h4>
				</div>
				<form action="commentEntry.php" id="commentform">
				    <label for="author">Name</label>
						<?php echo "<input id='newsID' name='newsID' type='hidden' value='".$NewsID."'>";?>
						<input id="author" name="author" type="text" value="" size="30" aria-required="true">
						<label for="email">Email</label>
						<input id="email" name="email" type="text" value="" size="30" aria-required="true">
						<label for="comment">Comment</label>
						<textarea id="comment" name="comment"></textarea>
					 <div class="clearfix"></div>
			           <input name="submit" type="submit" id="submit" value="Send">
					<div class="clearfix"></div>
				   </form>
			</div>
<!-- Leave Comment section | END-->					
		
				  
		</div>
	</div>
	
</body>
</html>