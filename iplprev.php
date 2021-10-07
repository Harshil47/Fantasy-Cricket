<?php
    session_start();
    ?>
<!DOCTYPE html>
<html lang="en">
    
<head>
  <title> Harshil Sanghavi TE-3-42</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="prev.css"/>

</head>
<body>
<?php

$conn= mysqli_connect("localhost", "id15312701_webharshil", "T8<%TgL34y5VlyK]") or die("Connection failed");
mysqli_select_db($conn,"id15312701_webdata");
$e=$_SESSION['usern'];
$t=$_SESSION['teamn'];
echo"<h1>$e     $t</h1><br>";


$y=$conn->query(" select name,points from $t natural join scorecard ") or die("Faillll");
//$x=$conn->query("Select * from scorecard  ") or die("FAil");
$ts=0;
echo"<div class = 'One'>";
echo"<table><tr><th>Player</th><th>Points</th></tr>";
while ($row = mysqli_fetch_assoc($y))
{
    $pn = $row['name'];
    $ps = $row['points'];
    $ts=$ts + $ps;

    //echo "$pn - $ps points<br>";
    echo "<tr><td>$pn</td><td><b>$ps</b></td></tr>";
  }
  echo"</table><br></div><h2>Total Score is $ts</h2>";
  echo"<br><h3><a href='leaderboard.php'>Leaderboard</a></h3>";

?>
</body>
</html>
