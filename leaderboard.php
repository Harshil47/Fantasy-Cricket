<html>
    <head><link rel="stylesheet" href="style3.css"></head>
</html>

<?php
$conn= mysqli_connect("localhost", "id15312701_webharshil", "T8<%TgL34y5VlyK]") or die("Connection failed");

mysqli_select_db($conn,"id15312701_webdata");

$c=$conn->query("Select * from leader where score > 0 order by score desc") or die("FAil4");
echo"<table><tr><th>Team</th><th>Score</th></tr>";
while ($row = mysqli_fetch_assoc($c))
{
    $tpn = $row['team'];
    $tps = $row['score'];

    echo "<tr><td>$tpn</td><td><b>$tps</b></td></tr>";
    //echo "<br>";

}
echo"</table>";
?>
