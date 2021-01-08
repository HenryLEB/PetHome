<?php
ini_set("display_errors", 0);

error_reporting(E_ALL ^ E_NOTICE);

error_reporting(E_ALL ^ E_WARNING);

if (!isset ($_SESSION)) {
	ob_start();
	session_start();
}
 $hostname="localhost"; 
 $basename="root"; 
 $basepass="1205543030"; 
 $database="pethome"; 

 $conn=mysqli_connect($hostname,$basename,$basepass,$database)or die("error!"); //连接mysql              
//  mysqli_select_db($database,$conn); //选择mysql数据库
//  mysqli_query("set names 'utf8'");//mysql编码
  header("Content-type: text/html; charset=utf-8"); 


?>