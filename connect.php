<?php 
session_start();
$host="localhost";
$user="root";
$pass="";
$con=mysqli_connect($host,$user,$pass);
if(!$con){
	//echo "Connection failed";
}else{
	//echo"Connection (to server) Successfully";
}
if (!mysqli_select_db($con,'parking')) {
  //echo "Database is not selected";
}

?>