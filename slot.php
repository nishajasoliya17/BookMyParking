<?php
include 'connect.php'; 
?>
<html>
  <head>
	 <title>Book my car parking</title>
		<style type="text/css">
			#main{
			background-color:gray;
			height:1400px;
			width:auto;
			}

			#m1{
		    margin-top: 150px;
			background-color:black;
			height:1263Px;
			width:66px;
			border:2px solid gray;
			margin-left:450px;
			float:left;
			}
			
			.a1{
			background-color:lightgrey ;
			height:60px;
			width:60px;
			margin:3px;
			
			}
			
			#m2{
			margin-top: 150px;
			background-color:black;
			height:1263px;
			width:66px;
			border:2px solid gray;
			margin-left:-10px;
			float:left;
			}
			
			#m3{
			margin-top: 150px;
			background-color:black;
			height:1263px;
			width:66px;
			border:2px solid gray;
			margin-left:-10px;
			float:left;
			}
			
			#m4{
			margin-top: 150px;
			background-color:black;
			height:1263px;
			width:66px;
			border:2px solid gray;
			margin-left:-10px;
			float:left;
			}
			
			#m5{
			margin-top: 150px;
			background-color:black;
			height:1263px;
			width:66px;
			border:2px solid gray;
			margin-left:-10px;
			float:left;
			}
			
			#m6{
			margin-top: 150px;
			background-color:black;
			height:1263px;
			width:66px;
			border:2px solid gray;
			margin-left:-10px;
			float:left;
			}
			
			#m7{
			margin-top: 150px;
			background-color:black;
			height:1263px;
			width:66px;
			border:2px solid gray;
			margin-left:-10px;
			float:left;
			}
			
			#m8{
			margin-top: 150px;
			background-color:black;
			height:1263px;
			width:66px;
			border:2px solid gray;
			margin-left:-10px;
			float:left;
			}
			
			#m9{
			margin-top: 150px;
			background-color:black;
			height:1263px;
			width:66px;
			border:2px solid gray;
			margin-left:-10px;
			float:left;
			}
			
			#m10{
			margin-top: 150px;
			background-color:black;
			height:1263px;
			width:66px;
			border:2px solid gray;
			margin-left:-10px;
			float:left;
			}
			
			.a1 button
              {
               border: none;
               outline: none;
               height: 30px;
               width: 50px;
			   
               background: mediumturquoise;
               color: black; 
               font-size:18px;
              border-radius:60px;
             }
			
			
			.a1 button:hover
            {
             cursor: pointer;
             background:#088A85 ;
             color: #000;
            }
            table{
            	border: 2px;
            	border-color: black;
            }
        .n{
        	margin-top: 10px;
        	margin-left: 10px;
        	font-size: 23px;
        	font-family: sans-serif;
        }
        .square {
        	margin-left: 25px;
  			height: 25px;
  			width: 25px;
  			background-color:#F75E5E; 
  			border: 1px solid black;
  			margin-top: 10px; 
		}

		.square1 {
			margin-left: 25px;
  			height: 25px;
  			width: 25px;
  			background-color:lightgray; 
  			border: 2px solid black;
  			margin-top: 10px; 
		}
	   .main1{
	   	align: center;
	   	margin-top: 50px;
       margin-left: 750px;
	   width: 100px;
       height: 50px;
       background: rgba(0, 0, 0, 0.5);
       color: #fff;
       position: absolute;
       transform: translate(-50%, -50%);
       box-sizing: border-box;
		}
		</style>
  </head>

  <script>
			function bookslot(slot_id) {
				//alert(slot_id);

					var book_date = document.getElementById("book_date").value;
					var vno = document.getElementById("vno").value;
					//alert(book_date);

					var r=confirm("Do you want to book your slot?\n(Press OK for booking)");

					if(r == true)
					{
				
			        var xmlhttp = new XMLHttpRequest();
			        xmlhttp.onreadystatechange = function() {
			            if (this.readyState == 4 && this.status == 200) {
			               // document.getElementById("txtHint").innerHTML = this.responseText;
			               //alert(this.responseText);
			               if(this.responseText == "0")
			               {
			               	  document.getElementById(slot_id).setAttribute("style","background-color:#F75E5E;");
			               	  alert("Already Booked");
			               }
			               else
			               {

					               	 document.getElementById(slot_id).setAttribute("style","background-color:#F75E5E;");
					               	 alert("Your slot is Booked");
					               	window.location = 'home.php';
					            			               	
			               }
			            }
			        };
			        xmlhttp.open("GET", "ajax/bookslot.php?slot_id=" + slot_id+"&book_date="+book_date+"&vno="+vno, true);
			        xmlhttp.send();

			    }
			    else
			    {
			    	return false;
			    }
			    
			}
</script>
  <body>
		<div id="main">
			<div class="main1">
				<div class="n"> Screen </div>
                
             </div>   
				<input type="hidden" id="book_date" name="book_date" value="<?php echo $_REQUEST['date']; ?>">
				<input type="hidden" id="vno" name="book_date" value="<?php echo $_REQUEST['vno']; ?>">
			
			<div id="m1">
				<?php 
				$style = "";
				$res = mysqli_query($con,"select * from slot where col_name='1'");
				while($row = mysqli_fetch_array($res))
				{
					$bres = mysqli_query($con,"select * from book where slot_id ='".$row['slot_id']."' AND book_date='".$_REQUEST['date']."'");
					if(mysqli_num_rows($bres) == 1)
					{
						$style = "style='background-color:#F75E5E;'";
					}
					else
					{
						$style = "";
					}
				?>

				<div class="a1" id="<?php echo $row['slot_id']; ?>" onclick="return bookslot(this.id);" <?php echo $style; ?>><center><br><button><?php echo $row['slot_name']; ?></button></center></div>
				<?php } ?>
			</div>
			
			
			<div id="m2">
                
				<?php
				$style = ""; 
				$res = mysqli_query($con,"select * from slot where col_name='2'");
				while($row = mysqli_fetch_array($res))
				{
					$bres = mysqli_query($con,"select * from book where slot_id ='".$row['slot_id']."' AND book_date='".$_REQUEST['date']."'");
					if(mysqli_num_rows($bres) == 1)
					{
						$style = "style='background-color:#F75E5E;'";
					}
					else
					{
						$style = "";
					}
				?>

				<div class="a1" id="<?php echo $row['slot_id']; ?>" onclick="bookslot(this.id);" <?php echo $style; ?>><center><br><button><?php echo $row['slot_name']; ?></button></center></div>
				<?php } ?>
				
			</div>
			
			
			<div id="m3">
               
				<?php
				$style = ""; 
				$res = mysqli_query($con,"select * from slot where col_name='3'");
				while($row = mysqli_fetch_array($res))
				{
					$bres = mysqli_query($con,"select * from book where slot_id ='".$row['slot_id']."' AND book_date='".$_REQUEST['date']."'");
					if(mysqli_num_rows($bres) == 1)
					{
						$style = "style='background-color:#F75E5E;'";
					}
					else
					{
						$style = "";
					}
				?>

				<div class="a1" id="<?php echo $row['slot_id']; ?>" onclick="bookslot(this.id);" <?php echo $style; ?>><center><br><button><?php echo $row['slot_name']; ?></button></center></div>
				<?php } ?>
				
			</div>
			
			<div id="m4">
                
				<?php
				$style = ""; 
				$res = mysqli_query($con,"select * from slot where col_name='4'");
				while($row = mysqli_fetch_array($res))
				{
					$bres = mysqli_query($con,"select * from book where slot_id ='".$row['slot_id']."' AND book_date='".$_REQUEST['date']."'");
					if(mysqli_num_rows($bres) == 1)
					{
						$style = "style='background-color:#F75E5E;'";
					}
					else
					{
						$style = "";
					}
				?>

				<div class="a1" id="<?php echo $row['slot_id']; ?>" onclick="bookslot(this.id);" <?php echo $style; ?>><center><br><button><?php echo $row['slot_name']; ?></button></center></div>
				<?php } ?>
				
			</div>
			
			<div id="m5">
                
				<?php
				$style = ""; 
				$res = mysqli_query($con,"select * from slot where col_name='5'");
				while($row = mysqli_fetch_array($res))
				{
					$bres = mysqli_query($con,"select * from book where slot_id ='".$row['slot_id']."' AND book_date='".$_REQUEST['date']."'");
					if(mysqli_num_rows($bres) == 1)
					{
						$style = "style='background-color:#F75E5E;'";
					}
					else
					{
						$style = "";
					}
				?>

				<div class="a1" id="<?php echo $row['slot_id']; ?>" onclick="bookslot(this.id);" <?php echo $style; ?>><center><br><button><?php echo $row['slot_name']; ?></button></center></div>
				<?php } ?>
				
			</div>

			<div id="m6">
                
				<?php
				$style = ""; 
				$res = mysqli_query($con,"select * from slot where col_name='6'");
				while($row = mysqli_fetch_array($res))
				{
					$bres = mysqli_query($con,"select * from book where slot_id ='".$row['slot_id']."' AND book_date='".$_REQUEST['date']."'");
					if(mysqli_num_rows($bres) == 1)
					{
						$style = "style='background-color:#F75E5E;'";
					}
					else
					{
						$style = "";
					}
				?>

				<div class="a1" id="<?php echo $row['slot_id']; ?>" onclick="bookslot(this.id);" <?php echo $style; ?>><center><br><button><?php echo $row['slot_name']; ?></button></center></div>
				<?php } ?>
				
			</div>
			
			<div id="m7">
                
				<?php
				$style = ""; 
				$res = mysqli_query($con,"select * from slot where col_name='7'");
				while($row = mysqli_fetch_array($res))
				{
					$bres = mysqli_query($con,"select * from book where slot_id ='".$row['slot_id']."' AND book_date='".$_REQUEST['date']."'");
					if(mysqli_num_rows($bres) == 1)
					{
						$style = "style='background-color:#F75E5E;'";
					}
					else
					{
						$style = "";
					}
				?>
				<div class="a1" id="<?php echo $row['slot_id']; ?>" onclick="bookslot(this.id);" <?php echo $style; ?>><center><br><button><?php echo $row['slot_name']; ?></button></center></div>
				<?php } ?>
				
			</div>
			
			<div id="m8">
                
	  			<?php
				$style = ""; 
				$res = mysqli_query($con,"select * from slot where col_name='8'");
				while($row = mysqli_fetch_array($res))
				{
					$bres = mysqli_query($con,"select * from book where slot_id ='".$row['slot_id']."' AND book_date='".$_REQUEST['date']."'");
					if(mysqli_num_rows($bres) == 1)
					{
						$style = "style='background-color:#F75E5E;'";
					}
					else
					{
						$style = "";
					}
				?>

				<div class="a1" id="<?php echo $row['slot_id']; ?>" onclick="bookslot(this.id);" <?php echo $style; ?>><center><br><button><?php echo $row['slot_name']; ?></button></center></div>
				<?php } ?>
				
			</div>
			
			<div id="m9">
                
				<?php
				$style = ""; 
				$res = mysqli_query($con,"select * from slot where col_name='9'");
				while($row = mysqli_fetch_array($res))
				{
					$bres = mysqli_query($con,"select * from book where slot_id ='".$row['slot_id']."' AND book_date='".$_REQUEST['date']."'");
					if(mysqli_num_rows($bres) == 1)
					{
						$style = "style='background-color:#F75E5E;'";
					}
					else
					{
						$style = "";
					}
				?>

				<div class="a1" id="<?php echo $row['slot_id']; ?>" onclick="bookslot(this.id);" <?php echo $style; ?>><center><br><button><?php echo $row['slot_name']; ?></button></center></div>
				<?php } ?>
				
			</div>
			
			<div id="m10">
                
				<?php
				$style = ""; 
				$res = mysqli_query($con,"select * from slot where col_name='10'");
				while($row = mysqli_fetch_array($res))
				{
					$bres = mysqli_query($con,"select * from book where slot_id ='".$row['slot_id']."' AND book_date='".$_REQUEST['date']."'");
					if(mysqli_num_rows($bres) == 1)
					{
						$style = "style='background-color:#F75E5E;'";
					}
					else
					{
						$style = "";
					}
				?>

				<div class="a1" id="<?php echo $row['slot_id']; ?>" onclick="bookslot(this.id);" <?php echo $style; ?>><center><br><button><?php echo $row['slot_name']; ?></button></center></div>
				<?php } ?>
				
			</div>
		
	</div>
  </body>
</html>