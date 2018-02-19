<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pulse";
 
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
$sql="SELECT * FROM webkriti WHERE username='$uname'";
$result=mysqli_query($conn ,$sql);
$num_rows=mysqli_num_rows($result);


if($num_rows >=1){
$p=1;
$euname="username already used";
}  
}
?>