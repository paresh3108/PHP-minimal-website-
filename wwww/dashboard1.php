<?php
session_start();
if(!isset($_SESSION['login_user']))
{
    echo '<script language="javascript">';
    echo 'alert("You must login to access this page")';
    echo '</script>';
    die();
}
?>
<html>
<head>
<style>
#table{
    position: relative;
    margin-top: 0%;
    margin-left: 35%;
}
thead {
    background: #e2d736;
    color: #010fff;
    border-radius: .4em;
    overflow-x : auto;
  }
tr {
      border-color: lighten(#34495E, 10%);
      }
td {
     background:#222930; 
     color: #4eb1ba;
      }
#one{
    margin-left:37%;
    color:darkcyan;
    font-size:20px;
}
ul
{
	list-style-type: none;
	float:right;
}
ul li
{
	display: inline-block;
	margin-top:5%;
}
ul li a
{
	text-decoration: none;
	color:#000000;
	padding:5px 20px;
	transition: 0.6s ease;
}
ul li a:hover
{
	background-color:#000;
	color:white; 
	
}  
a {
    Font :23px Charm;
}


</style>
</head>
<body>
<div class="myclass" style="width:100%; height:40vh; margin-top:-10px; background-color: rgba(0, 0, 0, 1);";>
  	<img src="images\image1.png" alt="Trulli" width="400" height="250" style="margin-top: 10px; margin-left: 50px; float: left;">
    <h1 style="margin-top:50px; float: right; margin-right: 370px; color: silver; font-family: 'Aclonica';font-size: 70px; ">Book My <br>    Sports Arena</h1>
   
    </div> 
<div class="main" style="width:100%; height:10%;">
<ul>
<li><a href="home2.php">Home</a></li>
<li><a href="sample3.php">Sign Up</a></li>
<li><a href="sample2.php">Login</a></li>
<li><a href="logout.php">Logout</a></li>
<li><a href="turf.php?var2=turf_football">Book</a></li>
<li><a href="selectsport.php?var2=product1">Buy</a></li>
<li><a href="dashboard.php">Dashboard</a></li>
<li><a href="dashboard1.php">Activities</a></li>
<li><a href="#">About Us</a></li>
</ul>
</div>
</div>
<br>
<br>
<br>
<p id="one"> THIS IS YOUR BOOKINGS FOR THE SLOTS </p>

<div id=table>
<table>
<thead>
<th>Username</th>
<th>Slot Id</th>
<th>Slot Name</th>
<th>Date</th>
<th>Start Time</th>
<th>End Time</th>
<th>Fees</th>
</thead>
<?php 

if(isset($_SESSION['login_user']))
{

$url= 'details.json';
$data=file_get_contents ($url);
$slots= json_decode($data,true);
foreach ($slots as $slot)
{
if ( $slot['name']=$_SESSION['login_user'])
{echo "<tr>";
echo "<td>".$slot['name']."</td>";
echo "<td>".$slot['slot_id']."</td>";
echo "<td>".$slot['slot_name']."</td>";
echo "<td>".$slot['slot_day']."</td>";
echo "<td>".$slot['beg_time']."</td>";
echo "<td>".$slot['end_time']."</td>";
echo "<td>".$slot['fees']."</td>";
echo "</tr>";
}
else 
{
    echo "<p> NO BOOKINGS YET </p>";
}
}
}

?>
</div>
</table>
</body>
</html>