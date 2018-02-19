<?php
session_start();
?>
<?php
if($_SESSION["login"]==true)
{
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pulse";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$usnm = $_SESSION["usnm"];
$sql = "SELECT id,regdate, firstname, secondname,events,accomodation,description,amount  FROM webkriti WHERE username='$usnm' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $id= $row["id"];
         $regdate= $row["regdate"];
          $firstname= $row["firstname"];
           $secondname= $row["secondname"];
            $events= $row["events"];
            $accomodation=$row["accomodation"];
             $description= $row["description"];
              $amount= $row["amount"];
        
    }
} else {
    echo "0 results";
}
$conn->close();
}
else header("location: login.php")
?>

<!Doctype>
<html>
<head>
<link rel="stylesheet" type="text/css" href="family.css">
</head>
<body>
<form><div class="sma">
<fieldset><div class="h" style="background-color: white">
<legend><span>INVOICE</span></legend><a href="destroy.php" >Logout</a> <strong>PULSE</strong><span class="left"><strong>AIIMS</strong></span><br><br>
  <span style="float: left;">REGISTRATION ID NO :</span> <span style="float: left;" ><strong>PULSE_2k17_</strong></span> <span id="idnum1"><?php echo $id;?></span><br><br>
   <span style="float: left;">DATE : </span><span id="idnum2"><?php echo $regdate ?></span><br><br>
  <!--  <span style="float: left;">TIME :</span> <span id="idnum3"></span><br><br -->
   <span style="float: left;">NAME :</span>
      <span id="idnum4"><?php echo $firstname." ".$secondname ?></span><br><br>
   <span style="float: left;">USER NAME :</span>
      <span id="idnum5"><?php echo $_SESSION["usnm"];?></span><br><br>
   <span style="float: left;">EVENTS :</span>
      <span id="idnum6"><?php echo $events ?></span><br><br>
   <span style="float: left;">ACCOMODATION :</span><br>
      <span id="idnum7"><?php echo $accomodation ?></span><br><br>
    <span style="float: left;">DESCRIPTION :</span><br>
      <span id="idnum11"><?php echo $description ?></span><br><br>
   <span style="float: left;">AMOUNT TO BE PAYED :</span>
      <span id="idnum8"><?php echo $amount ?></span><br><br>
   <span style="float: left;"><strong>NOTE :</strong></span><br><br>
  PLEASE BRING THIS RECEIPT WHILE VISITING THE CAMPUS...THANK YOU<br><br>
  <span style="float: left;"> DESK NO : 1</span>
  <span style="float: right;" class="left">
  HELPLINE NO :<br>
  Yash Chaudhary:  84392-88896<br>
  Yatharth Saxena: 97558-62100<br>
  Khushal Bisani: 93039-36009<br></span>
  <div class="de"><button onClick="window.print()">Print this page</button></div></div>

</fieldset></div>
</form>
</body>
</html>