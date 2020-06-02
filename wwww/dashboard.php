<!DOCTYPE html>
<html>
<head>

<style>
* {
  font-family: sans-serif; /* Change your font family */
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
.content-table {
  border-collapse: collapse;
  margin: 25px 0;
  position:absolute;
  top:65%;
  left:35%;
  font-size: 0.9em;
  min-width: 400px;
  border-radius: 5px 5px 0 0;
  overflow: hidden;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
}

.content-table thead tr {
  background-color: #009879;
  color: #ffffff;
  text-align: left;
  font-weight: bold;
}

.content-table th,
.content-table td {
  padding: 12px 15px;
}

.content-table tbody tr {
  border-bottom: 1px solid #dddddd;
}

.content-table tbody tr:nth-of-type(even) {
  background-color: #f3f3f3;
}

.content-table tbody tr:last-of-type {
  border-bottom: 2px solid #009879;
}

.content-table tbody tr.active-row {
  font-weight: bold;
  color: #009879;
}

</style>
</head>
<body>
<div class="myclass" style="width:100%; height:40vh; margin-top:-8px; background-color: rgba(0, 0, 0, 1);";>
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
    <br>
    <br>
    <br>
    <br>
    <br>
<?php
session_start();
if(isset($_SESSION['name']))
{

    $name=$_SESSION['name'];
   // $mail= $_SESSION['email'];
 //echo $name;
$mysqli=new MySQLi('localhost','root','','sportsarena');
$sql="SELECT * from buy where buyername='$name' AND confirm=1 ";
$result = $mysqli->query($sql);
if ($result->num_rows > 0) {
  
  echo'<h1>Your Activities : Orders & Bookings</h1>';
echo'<table class="content-table">';
  echo'<thead>';
    echo'<tr>';
      echo'<th>Product</th>';
      echo'<th>Quantity</th>';
      echo'<th>Total Price</th>';
      echo'<th>Delivery Date</th>';
    echo'</tr>';
  echo'</thead>';
  echo'<tbody>';
    
  while($row = $result->fetch_assoc())
   {
    echo'<tr>';
    echo'<td>'.$row['category'].'</td>';
    echo'<td>'.$row['quantity'].'</td>';
    echo'<td>'.$row['total'].'</td>';
    echo'<td>'.$row['deliverydate'].'</td>';


  echo'</tr>';

   }
 
}
else{
  echo '<br>';
  echo'You have not placed any order yet ';
}
echo'</tbody';
}
else{
  echo'<br>';
  echo'You must login to access these page ';
}
?>

</table>
</body>
</html>