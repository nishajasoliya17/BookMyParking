<?php
include 'connect.php'; 
?>
<html>
<head>                  
<title>HomePage</title>
<link rel="stylesheet" type="text/css" href="home.css">
</head>
<body>
	<header>
		<div class="main">
		
		<div style='float: left;'>
			<a href="home.php">
			<img src="logo.png" alt="Logo" style="width:200px;height:200px";>
		</a>
		</div>
		
		<h1 align="center">BOOK MY PARKING</h1>
			<nav>
				<a href="home.php"><font size="5" color="navy"><b>Home</b></font></a>
				<a href="registration.html"><font size="5" color="navy"><b>Registration</b></font></a>
				<a href="parkingview.png"><font size="5" color="navy"><b>Parking View</b></font></a>
				<a href="abt.html"><font size="5" color="navy"><b>About Us</b></font></a>
				<a href="contactus.html"><font size="5" color="navy"><b>Contact Us</b></font></a>
				<a href="http://localhost/Book_My_Parking/admin/admin.html"><font size="5" color="navy"><b>Admin</b></font></a>
			</nav>
			<!--</div>-->
			
		</div>
		
		<div class="box">
			<h2 align="center">GENERATE YOUR RECEIPT</h2>
			<form>
						Vehicle Number:
						<input type="text" name="vno" style="padding:10px" style="align:center" required><br>
						<input type="submit" name="s" value="view">
		   </form>

		</div>
		<?php 
		if(isset($_REQUEST['s']))
		{
			$res = mysqli_query($con,"select * from book where vno = '".$_REQUEST['vno']."'");

			if(mysqli_num_rows($res) != 0)
			{
			while($row = mysqli_fetch_array($res))
			{
		?>
		<div class="box">
			<label> Date Of Slot Booking:<?php echo $row['book_date'] ?></label><br/>
			<label>Vehicle Number:<?php echo $row['vno'] ?></label>
			
		</div>
	<?php } } 
		else
		{
			?>

			<div class="box">
			<label>Sorry! No Record Found.....</label><br/>
			
		</div>

			<?php 
		}
}?>
		<div class="icon" id="icon1">
			
			<table cellspacing="10px" cellpadding="10px">
				

				<tr>
				<td width="500px">
				<img src="note.svg"  alt="Logo" style="width:70px;height:70px"></td>
			    <td width="500px">
				<img src="fuel.svg"  alt="Logo" style="width:70px;height:70px"></td>
				</tr>
				<tr>
				<td valign="top" height="50px"><h3 class="l2">Advance Booking </h3></td>
			    <td valign="top" height="50px"><h3 class="l7">save Fuel</h3></td></tr>
				
				<tr>
				<td width="500px">
				<img src="smily.svg"  alt="Logo" style="width:70px;height:70px"></td>
				<td>
				<img src="time.svg"  alt="Logo" style="width:70px;height:70px"></td></tr>
				<tr>
				<td valign="top" height="50px"><h3 class="l5">No Frustration</h3></td>
				<td valign="top" height="50px"><h3 class="l6">save time </h3></td></tr>


            </table>
			</div>


	</header>
</body>
</html>