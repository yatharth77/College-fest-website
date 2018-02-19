<!-- error messages -->
<?php
// Start the session
session_start();

$p=0;
$fname = $sname =$uname=$anum=$pass=$pass2= $acc = $email = $gender = $desc = $e1 = $e2 = $e3 = $e4 = $e5 = $e6=$events=$phone = "";
$efname = $esname =$euname = $eanum=$epass =$epass2= $eemail =  $egender= $fnameErr=$snameErr= $eevents= $ephone ="";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
/*  $comment = test_input($_POST["comment"]);
$gender = test_input($_POST["gender"]);*/
if(empty($_POST["firstname"]))
{
  $p=1;
  $efname="first name required";
}
else $fname = test_input($_POST["firstname"]);

if (!preg_match("/^[a-zA-Z ]*$/",$fname))
{
  $p=1;
  $fnameErr = "Only letters and white space allowed"; 
}

if(empty($_POST["lastname"]))
{
  $p=1;
  $esname="second name required";
}
else $sname= test_input($_POST["lastname"]);

if (!preg_match("/^[a-zA-Z ]*$/",$sname))
{
  $p=1;
  $snameErr = "Only letters and white space allowed"; 
}

if(empty($_POST["aadhar_no"]))
{
  $p=1;
  $eanum="aadhar required";
}
else $anum = test_input($_POST["aadhar_no"]);

if(empty($_POST["email"]))
{
  $p=1;
  $eemail="email required";
}
else $email = test_input($_POST["email"]);

if(empty($_POST["password"]))
{
  $p=1;
  $epass="password required";
}
else $pass = test_input($_POST["password"]);
if(empty($_POST["password2"]))
{
  $p=1;
  $epass2="Confirmation required";
}
else $pass2 = test_input($_POST["password2"]);

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

if(empty($_POST["user_name"]))
{
  $p=1;
  $euname="username required";

}
else $uname=test_input($_POST["user_name"]);

if (empty($_POST["gender"]))
{
  $p=1;
  $egender = "Gender is required";
}
else $gender =$_POST["gender"];
if (empty($_POST["phone"]))
{
  $p=1;
  $ephone = "Phone number is required";
}
else if(strlen($_POST["phone"]) != 10)
{
  $p=1;
  $ephone = "Invalid Phone number";
}

else $phone =$_POST["phone"];


if (empty($_POST["needacc"]))
{}
else $acc =$_POST["needacc"];

if (empty($_POST["message"]))
{}
else $desc=$_POST["message"];
if(isset($_POST['event1']))
 {
    $events = $events."e1 " ;
    $sum+=1000;
 }
if(isset($_POST['event2']))
 {
    $events = $events."e2 " ;
    $sum+=800;
 }
 if(isset($_POST['event3']))
 {
    $events = $events."e3 " ;
    $sum+=400;
 }
 if(isset($_POST['event4']))
 {
    $events = $events."e4 " ;
    $sum+=200;
 }
 if(isset($_POST['event5']))
 {
    $events = $events."e5 " ;
    $sum+=500;
 }
 if(isset($_POST['event6']))
 {
    $events = $events."e6 " ;
    $sum+=200;
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
<?php include 'uniqueuname.php';?>
<!Doctype html>
<html>
<head>
  <style type="text/css">.error {color: #FF0000;}</style>
  <link rel="stylesheet" type="text/css" href="style.css">
  <style>
    body  {
      background-image: url('https://static1.squarespace.com/static/54ab1e85e4b0f3612b2209a0/t/54ab4dc0e4b034981b5f7ed9/1420512707170/Dance_Velocity_Day25336a.JPG?format=2500w') ;
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-size: cover;
    }
  </style>
</head>
<body id="clr">

  <form action="form.php" method="post" enctype="multipart/form-data" >
    <fieldset>
      <legend style="color: white">SIGNIN FORM:</legend><div class="large">
      <span style="color: white" >FIRST NAME:</span><span class="error">*</span><br>
      <input type="text" name="firstname" size="10" id="fname"  placeholder="Your name.."> <span class="error"><?php echo $efname;?></span>    <span class="error"><?php echo $fnameErr;?></span><br><br><br>
      <span style="color: white" >LAST NAME:</span><span class="error">*</span><br><br>
      <input type="text" name="lastname" size="10" id="lname"  placeholder="Your last name.."> <span class="error"><?php echo $esname
      ;?></span> <span class="error"><?php echo $snameErr;?></span><br><br><br>
      <span style="color: white" >USER NAME:</span><span class="error">*</span><br><br>
      <input type="text" name="user_name" size="12" id="user" placeholder="User name.."><span class="error"><?php echo $euname;?></span><br><br><br>
      <span style="color: white" >PHONE NUMBER:</span><span class="error">*</span><br><br>
      <input type="text" name="phone" size="12" id="user" placeholder="Phone Number.."><span class="error"><?php echo $ephone;?></span><br><br><br>
      <span style="color: white" >AADHAR NO(Bring aadhar card on entry for verification):</span><span class="error">*</span><br><br>
      <input type="text" name="aadhar_no" size="8" id="aadhar"  placeholder="Your aadhar no.."> <span class="error"><?php echo $eanum;?></span><br><br><br>
      <span style="color: white" >USER EMAIL-ID:</span><span class="error">*</span><br><br>
      <input type="email" name="email" id="email"  placeholder="Email-ID.."> <span class="error"><?php echo $eemail;?></span><br><br><br>
      <span style="color: white" >USER PASSWORD:</span><span class="error">*</span><br><br>
      <input type="password" name="password" maxlength="30" id="upass" placeholder="Password.."> <span class="error"><?php echo $epass;?> </span><br><br><br>
      <span style="color: white" >RE-ENTER PASSWORD:</span><span class="error">*</span><br><br>
      <input type="password" name="password2" maxlength="30" id="upass" placeholder="Re-enter Password.."> <span class="error"><?php echo $epass2;?> </span><br><br><br>
      <span style="color: white" >GENDER:</span><span class="error">*</span><br><br>
      <input type="radio" name="gender" value="male" id="male"><span style="color: white" > Male</span>
      <input type="radio" name="gender" value="female" id="female"><span style="color: white" > Female</span>
      <input type="radio" name="gender" value="other" id="other"><span style="color: white" > Other </span><br><span class="error"><?php echo $egender;?> </span><br><br><br>
      <span style="color: white" >NEED OF ACCOMODATION:</span><br>
      <input type="radio" name="needacc" value="yes" id="yes" onclick="functy(this)"><span style="color: white" > yes</span>
      <input type="radio" name="needacc" value="no" id="no" onclick="functn(this)" ><span style="color: white" > no</span><br><br><br><br>
      <span style="color: white" >your requirements: </span> <br>
      <textarea name="message" rows="6" cols="45" id="ta" disabled></textarea><br><br><br><br>
      <h2 style="color: white">Select the event in which you want to participate..</h2>

      <table>
        <tr>
          <th></th>
          <th style="width: 150px; color: white"> EVENT </th>
          <th style="width: 250px; color: white"> SCHEDULE </th>
          <th style="width: 100px; color: white"> MEMBERS NO. </th>
          <th style="width: 100px; color: white"> FEE </th>
          <th style="width: 100px; color: white"> PRIZE </th>

        </tr>
        <tr>
          <th><input type="checkbox" name="event1" value="event1" id="one" onchange="e1()"></th>
          <td id="event1" style="color:white">Socult</td>
          <td id="time1" style="color:white">12:00 p.m - 06:00 p.m , 25 March</td>
          <td id="mn1" style="color:white">4 - 8</td>
          <td id="fee1" style="color:white">1000</td>
          <td id="prize1" style="color:white">5500</td>

        </tr>
        <tr>
          <th><input type="checkbox" name="event2" value="event2" id="two"  onchange="e1()"></th>
          <td id="event2" style="color:white">Fashion</td>
          <td id="time2" style="color:white">08:00 p.m - 12:00 a.m , 25 March</td>
          <td id="mn2" style="color:white">6 - 10</td>
          <td id="fee2" style="color:white">800</td>
          <td id="prize2" style="color:white">3000</td>

        </tr>
        <tr>
          <th><input type="checkbox" name="event3" value="event3" id="three"  onchange="e1()"></th>
          <td id="event3" style="color:white">Fine Art</td>
          <td id="time3" style="color:white">12:00 p.m - 06:00 p.m , 26 March</td>
          <td id="mn3" style="color:white">4 - 6</td>
          <td id="fee3" style="color:white">400</td>
          <td id="prize3" style="color:white">4000</td>

        </tr>
        <tr>
          <th><input type="checkbox" name="event4" value="event4" id="four"  onchange="e1()"></th>
          <td id="event4" style="color:white">Literary</td>
          <td id="time4" style="color:white">08:00 p.m - 10:00 p.m , 26 March</td>
          <td id="mn4" style="color:white">1</td>
          <td id="fee4" style="color:white">200</td>   
          <td id="prize4" style="color:white">2500</td>

        </tr>
        <tr>
          <th><input type="checkbox" name="event5" value="event5" id="five"  onchange="e1()" ></th>
          <td id="event5" style="color:white">Standup Comedy</td>
          <td id="time5" style="color:white">12:00 p.m - 04:00 p.m , 27 March</td>
          <td id="mn5" style="color:white">1</td>
          <td id="fee5" style="color:white">500</td>
          <td id="prize5" style="color:white">3000</td>

        </tr>
        <tr>
          <th><input type="checkbox" name="event6" value="event6" id="six"  onchange="e1()" ></th>
          <td id="event6" style="color:white">Informal</td>
          <td id="time6" style="color:white">08:00 p.m - 12:00 a.m , 27 March</td>
          <td id="mn6" style="color:white">1</td>
          <td id="fee6" style="color:white">200</td>
          <td id="prize6" style="color:white"> - - </td>

        </table></br>
        <span class="error"><?php echo $eevents;?> </span>
        <span style="color: white" >** Informal Events are free for participants. ** </span><br><br>
        <span style="color: white" >TOTAL AMOUNT TO BE PAID:</span>
        <h3 id="amount" style="color: white"></h3>
        <input type="submit" value="Submit" class="btn btn-primary" ></div>
      </fieldset>
    </form>
  </body>
  </html>
  <!-- accomodation -->
  <script type="text/javascript">

    function functy(e)
    {
      var x = document.getElementById("ta");
      x.disabled=e.checked ? false : true;
      if(!x.disabled)
        x.focus();

    }
    function functn(e)
    {
      var x = document.getElementById("ta");
      x.disabled=e.checked ? true : false;
    }
    function e1()

    { var sum=0;
      var chk1 , chk2 ,chk3,chk4 , chk5 ,chk6;
      chk1 = document.getElementById("one");
      chk2 = document.getElementById("two");
      chk3 = document.getElementById("three");
      chk4 = document.getElementById("four");
      chk5 = document.getElementById("five");
      chk6 = document.getElementById("six");
      if(chk1.checked)
        sum=sum+1000;
      if(chk2.checked)
        sum=sum+800;
      if(chk3.checked)
        sum=sum+400;
      if(chk4.checked)
        sum=sum+200;
      if(chk5.checked)
        sum=sum+500;
      if(chk6.checked)
        sum=sum+200;
      document.getElementById("amount").innerHTML=sum;
    }
  </script>
  <!-- end of accomodation -->

  

  <?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "pulse";

/*if($fname == ""|| $sname=="" || $uname==""||$anum=="" ||$pass==""  || $email=="" || $gender=="" )
{
  $p==1;
}*/

if($p==0)
{
  if ($_SERVER["REQUEST_METHOD"] == "POST") 
  {
// Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "INSERT INTO webkriti (firstname, secondname,username,phone,aadharnum,email,password,gender,accomodation,description,events,regdate,amount) VALUES ('$fname', '$sname', '$uname','$phone' , '$anum','$email', '$pass' ,'$gender' ,'$acc' , '$desc' , '$events' , now() , '$sum')";

    if (mysqli_query($conn, $sql)) {
      echo "New record created successfully";
       $_SESSION["usnm"] = $uname;
       $_SESSION["login"] = true;
      echo "<script>window.location.href='regig.php'</script>";
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
  }
}
else{
  echo  "fill details correctly";
}
?>