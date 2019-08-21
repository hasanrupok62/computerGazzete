<?php session_start();?>
<?php
include("config.inc.php"); //include config file
echo $_POST['commenting'];
if(empty($_SESSION['email']))
{
	Header('location: login.php');
}
else
{

if(isset($_POST['commenting']))
		{
			$comment_date = $_POST['commentdate'];
			$comment_insert = $_POST['commenting'];
			echo $_POST['productid'];
			$sqlcommentpost = "INSERT INTO comments (c_date,p_id,username,message,likes,dislikes) VALUES ('$comment_date','".$_POST['productid']."','".$_POST['userid']."','$comment_insert','0','0')";
			$resultcomment =mysqli_query($mysqli_conn,$sqlcommentpost);
			//$comment_insert = $_POST['commenting'];
			
		}
		header("Location: Reviews.php?id=".$_POST['productid']."");

	}
			?>

