

<?php
$p=0;
$fname = $sname =$uname=$anum=$pass=$pass2= $acc = $email = $gender = $desc = $e1 = $e2 = $e3 = $e4 = $e5 = $e6=$events=$phone = "";
$efname = $esname =$euname = $eanum=$epass =$epass2= $eemail =  $egender= $fnameErr=$snameErr= $eevents= $ephone ="";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
/*  $comment = test_input($_SESSION["comment"]);
$gender = test_input($_SESSION["gender"]);*/
if(empty($_SESSION["firstname"]))
{
  $p=1;
  $efname="first name required";
}
else $fname = test_input($_SESSION["firstname"]);

if (!preg_match("/^[a-zA-Z ]*$/",$fname))
{
  $p=1;
  $fnameErr = "Only letters and white space allowed"; 
}

if(empty($_SESSION["lastname"]))
{
  $p=1;
  $esname="second name required";
}
else $sname= test_input($_SESSION["lastname"]);

if (!preg_match("/^[a-zA-Z ]*$/",$sname))
{
  $p=1;
  $snameErr = "Only letters and white space allowed"; 
}

if(empty($_SESSION["aadhar_no"]))
{
  $p=1;
  $eanum="aadhar required";
}
else $anum = test_input($_SESSION["aadhar_no"]);

if(empty($_SESSION["email"]))
{
  $p=1;
  $eemail="email required";
}
else $email = test_input($_SESSION["email"]);

if(empty($_SESSION["password"]))
{
  $p=1;
  $epass="password required";
}
else $pass = test_input($_SESSION["password"]);
if(empty($_SESSION["password2"]))
{
  $p=1;
  $epass2="Confirmation required";
}
else $pass2 = test_input($_SESSION["password2"]);

if($pass != $pass2)
{
 $p=1;
 $epass2="Confirmation failed";
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL))
{
  $p=1;
  $emailErr = "Invalid email format"; 
}

if(empty($_SESSION["user_name"]))
{
  $p=1;
  $euname="username required";

}
else $uname=test_input($_SESSION["user_name"]);

if (empty($_SESSION["gender"]))
{
  $p=1;
  $egender = "Gender is required";
}
else $gender =$_SESSION["gender"];
if (empty($_SESSION["phone"]))
{
  $p=1;
  $ephone = "Phone number is required";
}
else if(strlen($_SESSION["phone"]) != 10)
{
  $p=1;
  $ephone = "Invalid Phone number";
}

else $phone =$_SESSION["phone"];


if (empty($_SESSION["needacc"]))
{}
else $acc =$_SESSION["needacc"];

if (empty($_SESSION["message"]))
{}
else $desc=$_SESSION["message"];
if(isset($_SESSION['event1']))
 {
    $events = $events."e1 " ;
 }
if(isset($_SESSION['event2']))
 {
    $events = $events."e2 " ;
 }
 if(isset($_SESSION['event3']))
 {
    $events = $events."e3 " ;
 }
 if(isset($_SESSION['event4']))
 {
    $events = $events."e4 " ;
 }
 if(isset($_SESSION['event5']))
 {
    $events = $events."e5 " ;
 }
 if(isset($_SESSION['event6']))
 {
    $events = $events."e6 " ;
 }
}


/*error message saved*/
/*securing*/
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
/*end of securing*/

?>
