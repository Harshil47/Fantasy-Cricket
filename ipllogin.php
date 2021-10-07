<?php

session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Members Page</title>
    <link rel="stylesheet" href="style3.css">
</head>
    
</html>
<?php
$un=$_POST['uname'];
$pass=$_POST['pass'];

if($un && $pass)
{
  $conn= mysqli_connect("localhost", "id15312701_webharshil", "T8<%TgL34y5VlyK]") or die("Connection failed");
  mysqli_select_db($conn,"id15312701_webdata");

  $x=$conn->query("Select * from login where name= '$un'  ") or die("FAil");


  $rows=mysqli_num_rows($x);

  if($rows != 0)
  {
    while ($row = mysqli_fetch_assoc($x))
    {
        $undb = $row['name'];
        $passdb = $row['pass'];
        $teamdb = $row['team'];

    }
    if($undb==$un && $passdb ==$pass)
    {
      $_SESSION['usern']=$un;
      $_SESSION['teamn']=$teamdb;

      echo("You are in ! <div class='One'><br><br><a href='ipltd.php'><h1>Ind vs Aus</h1></a><br><br><a href='iplprev.php'><h1>Results page</h1></a><br><br><h1><a href='leaderboard.php'>Leaderboard</a></h1><br><br><h1><a href='rules.html'>Rules</a></h1></div>");

    }
    else {
      echo("Incorrect Password");
  }
}
  else {
    die('user doesnt exist');
  }
}
else {
  (die("Please Enter User name and Password"));
}


?>
