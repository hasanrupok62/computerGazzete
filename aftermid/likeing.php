<?php
include ("header.php");
include("cart.php");
include("config.inc.php"); //include config file

   // $commentmail = $_SESSION['email'];
   // echo $commentmail
$db_username        = 'root'; //MySql database username
$db_password        = ''; //MySql dataabse password
$db_name            = 'hatbazar'; //MySql database name
$db_host            = 'localhost'; //MySql hostname or IP

$mysqli_conn3 = new mysqli($db_host, $db_username, $db_password,$db_name); //connect to MySql
if ($mysqli_conn3->connect_error) {//Output any connection error
    die('Error : ('. $mysqli_conn3->connect_errno .') '. $mysqli_conn3->connect_error);
}
?>
<style>
.button_like {
    background-image: url(like.png);
    background-color: hsl(0, 0%, 97%);
    background-repeat: no-repeat; 
    background-position: 2px 0;
    border: none;           
    cursor: pointer;       
    height: 32px;          
    padding-left: 40px;    
    vertical-align: middle;
    color: hsl(0, 0%, 33%);
    border-color: hsl(0, 0%, 60%);
    -webkit-box-shadow: inset 0 1px 0 hsl(0, 100%, 100%),0 1px 0 hsla(0, 0%, 0%, .08);
    box-shadow: inset 0 1px 0 hsl(0, 100%, 100%),0 1px 0 hsla(0, 0%, 0%, .08);
 
}
.button_unlike {
    background-image: url(like.png);
    background-color: hsl(0, 0%, 97%);
    background-repeat: no-repeat; 
    background-position: 2px -31px;
    border: none;           
    cursor: pointer;       
    height: 32px;          
    padding-left: 40px;    
    vertical-align: middle;
    color: hsl(0, 0%, 33%);
    border-color: hsl(0, 0%, 60%);
    -webkit-box-shadow: inset 0 1px 0 hsl(0, 100%, 100%),0 1px 0 hsla(0, 0%, 0%, .08);
    box-shadow: inset 0 1px 0 hsl(0, 100%, 100%),0 1px 0 hsla(0, 0%, 0%, .08);
 
}
.grid
{
    height: 100px;
    width: 450px;
    margin: 0 auto;
    margin-top: 80px;
    text-align:middle;
}
</style>
<?php
mysqli_close($mysqli_conn);
$strSQL_Result  = mysqli_query($mysqli_conn3,"select `c_like`,`dislike` from `like` where c_id=10");
$row            = mysqli_fetch_array($strSQL_Result);
 
$like       = $row['c_like'];
$unlike     = $row['dislike'];
if($_POST)
{
    if(isset($_COOKIE["counter_gang"]))
    {
        echo "-1";
        exit;
    }
    setcookie("counter_gang", "liked", time()+3600*24, "/like-unlike-in-php-mysql/", ".demo.phpgang.com");
    if(mysqli_real_escape_string($mysqli_conn3,$_POST['op']) == 'c_like')
    {
        $update = "`c_like`=`c_like`+1";
    }
    if(mysqli_real_escape_string($mysqli_conn3,$_POST['op']) == 'dislike')
    {
        $update = "`dislike`=`dislike`+1";
    }
    mysqli_query($mysqli_conn3,"update `like` set $update where `c_id`=10");
    echo 1;
    exit; 
    mysqli_close($mysqli_conn3);  
}
?>
<div class="grid">
<span id="status"></span><br>
<input type="button" value="<?php echo $like; ?>" class="button_like" id="linkeBtn" />
<input type="button" value="<?php echo $unlike; ?>" class="button_unlike" id="unlinkeBtn" />
</div>


<script type="text/javascript">

$(document).ready(function() {
$("#linkeBtn").removeAttr("disabled");
$("#unlinkeBtn").removeAttr("disabled");
$('#linkeBtn').click(function(e)
    {
        var val = parseInt($("#linkeBtn").val(), 10);
        $.post("index.php", {op:"like"},function(data)
        {
            if(data==1)
            {
                $("#status").html("Liked Sucessfully!!");
                val = val+1;
                $("#linkeBtn").val(val);
                $("#linkeBtn").attr("disabled", "disabled");
                $("#linkeBtn").css("background-image","url(likebw.png)");
            }
            else
            {
                $("#status").html("Already Liked!!");
            }
        })
    });
    $('#unlinkeBtn').click(function(e)
    {
        var val = parseInt($("#unlinkeBtn").val(), 10);
        $.post("index.php", {op:"un-like"},function(data)
        {
            if(data==1)
            {
                val = val+1;
                $("#unlinkeBtn").val(val);
                $("#unlinkeBtn").attr("disabled", "disabled");
                $("#unlinkeBtn").css("background-image","url(likebw.png)");
                $("#status").html("Un-liked Sucessfully!!");
            }
            else
            {
                $("#status").html("Already Un-liked!!");
            }
        })
    });            
});
</script>