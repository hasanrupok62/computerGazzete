<?php
$db_username        = 'root'; //MySql database username
$db_password        = ''; //MySql dataabse password
$db_name            = 'hatbazar'; //MySql database name
$db_host            = 'localhost'; //MySql hostname or IP

$currency			= 'Tk. '; //currency symbol
$shipping_cost		= 50; //shipping cost
$taxes				= array( //List your Taxes percent here.
							'VAT' => 4, 
							'Service Tax' => 5,
							'Other Tax' => 2
							);

$mysqli_conn = new mysqli($db_host, $db_username, $db_password,$db_name); //connect to MySql
if ($mysqli_conn->connect_error) {//Output any connection error
    die('Error : ('. $mysqli_conn->connect_errno .') '. $mysqli_conn->connect_error);
}