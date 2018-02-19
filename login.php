<?php

session_start();


?>
<?php 
$uname= $pass = "";
$euname= $epass ="";
$p=0;
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
/*  $comment = test_input($_POST["comment"]);
$gender = test_input($_POST["gender"]);*/
if(empty($_POST["password"]))
{
  $p=1;
  $epass="password name required";
}
else
{
    $pass=test_input($_POST["password"]);
}
if(empty($_POST["uname"]))
{
  $p=1;
  $euname="username name required";
}
else
{
    $uname=test_input($_POST["uname"]);
}
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pulse";
if($p==0)
{
  if ($_SERVER["REQUEST_METHOD"] == "POST") 
  {
// Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    
    $sql = "SELECT password FROM webkriti WHERE username='$uname' ";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    // output data of each row
        while($row = $result->fetch_assoc())
        {
           $password= $row["password"];
           if($pass==$password)
           {
               $_SESSION["usnm"] = $uname;
               $_SESSION["login"]= true;
               echo "<script>window.location.href='regig.php'</script>";
           }
       }

   }


   else {
    echo "0 results";
    $p=1;
}

$conn->close();
}
}
?>
<!Doctype html>
<html>
<head>
    <style>
        body  {
            background-image: url('https://static1.squarespace.com/static/54ab1e85e4b0f3612b2209a0/t/54ab4dc0e4b034981b5f7ed9/1420512707170/Dance_Velocity_Day25336a.JPG?format=2500w') ;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }
    </style>
    <link href="https://fonts.googleapis.com/css?family=Barrio" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="family.css">

</head>
<body id="all">



    <form action="login.php" method="post"><div class="small">
        <fieldset><div class="hp">
            <span style="color: white; font-family: 'Barrio', cursive; text-decoration: underline; font-size: 200%">LOGIN</span><br>
            <span style="color: white; float: left;">USER NAME:</span><br>
            <input type="text" name="uname" size="12" id="usname" required placeholder="User name.."><br><?php echo "*".$euname;?><br>
            <span style="color: white; float: left;">USER PASSWORD:</span><br>
            <input type="password" name="password" maxlength="20" id="upass" required placeholder="Password.."><br><?php echo "*".$euname;?>
            <div class="dell">
                <!--<input type="Reset" value="RESET" id="reset">-->
                <input type="submit" value="SIGNIN" id="submit" name="login"></div></div>
            </fieldset></div>
        </form>

        <div style="margin-top: 5%">

            <div class="social-buttons">
                <a href="[full link to your Twitter]">
                    <img title="Twitter" alt="Twitter" src="https://socialmediawidgets.files.wordpress.com/2014/03/01_twitter.png" width="35" height="35" />
                </a>
                <a href="[full link to your Pinterest]">
                    <img title="Pinterest" alt="Pinterest" src="https://socialmediawidgets.files.wordpress.com/2014/03/13_pinterest.png" width="35" height="35" />
                </a>
                <a href="[full link to your Facebook page]">
                    <img title="Facebook" alt="Facebook" src="https://socialmediawidgets.files.wordpress.com/2014/03/02_facebook.png" width="35" height="35" />
                </a>
                <a href="[full link to your LinkedIn]">
                    <img title="LinkedIn" alt="LinkedIn" src="https://socialmediawidgets.files.wordpress.com/2014/03/07_linkedin.png" width="35" height="35" />
                </a>
                <a href="[full link to your Instagram]">
                    <img title="Instagram" alt="RSS" src="https://socialmediawidgets.files.wordpress.com/2014/03/10_instagram.png" width="35" height="35" />
                </a>
            </div>
        </div>
        
        

    </body>