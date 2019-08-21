<?php
    
	require_once "config.inc.php";
   
     date_default_timezone_set('Asia/Bangkok');
    $author = $_GET['author'];
    $newsID = $_GET["newsID"];
    $email = $_GET["email"];
    $comment = $_GET["comment"];
    $taka=date('Y-m-d H:i:s');
    $re=mysqli_query($mysqli_conn,"SELECT * FROM customer where email='".$_SESSION['email']."'");
    $b=mysqli_fetch_array($re);


    $sql = "INSERT INTO `comment on news`( `NewsID`,`Comment`,`Email`,`customer_id`, 'modification Date') VALUES ('$newsID','$comment','$email','".$b['id']."','$taka','1' )";

    //mysql_select_db('messmanagement');
    $retval=mysqli_query($mysqli_conn, $sql);
    if(! $retval ) {
    die('Could not enter data: ' . mysql_error());
    }
    echo "Entered data successfully\n";
    mysqli_close($mysqli_conn);
	
	header('location:newsDetails.php?NewsID='.$newsID.'#'.$author);


?>