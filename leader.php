<?php
$conn= mysqli_connect("localhost", "id15312701_webharshil", "T8<%TgL34y5VlyK]") or die("Connection failed");

mysqli_select_db($conn,"id15312701_webdata");
$conn->query("DROP TABLE leader") or die("fail");
$conn->query("Create table leader (
    team varchar(20),
    score numeric(5),
    primary key(team) )
    ") or die("fail");
$a=$conn->query("Select * from login ") or die("FAil1");
while ($row = mysqli_fetch_assoc($a))
{
  $tn = $row['team'];
  $ts=0;
  $b=$conn->query("Select * from $tn natural join scorecard") or die("FAil2");
  while ($row = mysqli_fetch_assoc($b))
  {
      
    $pn = $row['name'];
    $ps = $row['points'];
    $ts=$ts + $ps;

  }
  $conn->query("INSERT INTO leader VALUES ('$tn',$ts) ") or die("FAil3");
  
}
echo "<h1>LeaderBoard Insertion Done</h2>";

$c=$conn->query("Select * from leader where score > 0") or die("FAil4");
while ($row = mysqli_fetch_assoc($c))
{
    $tpn = $row['team'];
    $tps = $row['score'];

    echo "$tpn  <b>$tps</b> ";
    echo "<br>";

}
?>
