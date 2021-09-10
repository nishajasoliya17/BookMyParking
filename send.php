<?php
include 'connect.php';

$fullname=$_POST['fname'];
$phonenumber=$_POST['pnumber'];
//$emailid=$_POST['email'];
$date=$_POST['date'];
$time=$_POST['time'];
$vno=$_POST['vno'];




$sql = "insert into registration (fullname,phonenumber,date,time,vno) values ('$fullname','$phonenumber','$date','$time','$vno')";
if(!mysqli_query($con,$sql))
{
//	echo "Not inserted";

	
}
else
//echo "Inserted";
	$_SESSION['id'] = mysqli_insert_id($con);
	echo "<script>window.location='slot.php?date=".$date."&vno=".$vno."'</script>";  

//header("refresh:1; url=slot.php");
?>
