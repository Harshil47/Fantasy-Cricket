<!DOCTYPE html>
<html lang="en">
<head>
  <title> Harshil Sanghavi TE-3-42</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="iplt.css"/>

</head>
<body>

<?php
$pc=0;
$pn=0;
$pr=0;
  $conn= mysqli_connect("localhost", "id15312701_webharshil", "T8<%TgL34y5VlyK]") or die("Connection failed");

  mysqli_select_db($conn,"id15312701_webdata");
echo "<div class='parent'><div class='columnOne'><h2>Batsman</h2><h4>Select 4-6 Batsman</h4>";
  $x=$conn->query("Select * from temp where role = 'Batsman'  ") or die("FAil");
//echo "No. of records present : ". mysqli_num_rows($x);
//echo "<br>";
//echo "<br>";
$m="l";
$n=0;
$l=$m.$n;
while ($row = mysqli_fetch_assoc($x))
{
    $pn = $row['name'];
    $pc = $row['cost'];
    $pr = $row['role'];
    $ps = $row['selected'];

    echo "$pn cost <b>$pc</b> ";
    $n=$n+1;
    $l=$m.$n;
    echo"<form method='post' >";
    if($ps == 'True')
    {

    echo " <input type='checkbox'  name=$l value=$pn checked='yes'</input>";
    }
    else {
        echo"<input type='checkbox'  name=$l value=$pn></input>";

        }

    echo "<br>";
    echo "<br>";

}


echo "</div><div class='columnTwo'><h2>All Rounder</h2><h4>Select 2-3 All Rounders</h4>";
$x1=$conn->query("Select * from temp where role = 'ALL'  ") or die("FAil");

while ($row = mysqli_fetch_assoc($x1))
{
    $pn = $row['name'];
    $pc = $row['cost'];
    $pr = $row['role'];
    $ps = $row['selected'];

    echo "$pn cost <b>$pc</b> ";
    $n=$n+1;
    $l=$m.$n;
    if($ps == 'True')
    {

    echo " <input type='checkbox'  name=$l value=$pn checked='yes'</input>";
    }
    else {
        echo"<input type='checkbox'  name=$l value=$pn></input>";

        }

    echo "<br>";
    echo "<br>";

}
echo "</div><div class='columnThree'><h2>Bowlers</h2><h4>Select 3-5 Bowlers</h4>";
$x2=$conn->query("Select * from temp where role = 'Bowl'  ") or die("FAil");
while ($row = mysqli_fetch_assoc($x2))
{
    $pn = $row['name'];
    $pc = $row['cost'];
    $pr = $row['role'];
    $ps = $row['selected'];

    echo "$pn cost <b>$pc</b> ";
    $n=$n+1;
    $l=$m.$n;
    if($ps == 'True')
    {

    echo " <input type='checkbox'  name=$l value=$pn checked='yes'</input>";
    }
    else {
        echo"<input type='checkbox'  name=$l value=$pn></input>";

        }

    echo "<br>";
    echo "<br>";

}
echo"</div></div>";
?>

<?php
/*
if(array_key_exists('sub', $_POST)) {
      button1();
    }

*/

function button1() {
  $conn= mysqli_connect("localhost", "id15312701_webharshil", "T8<%TgL34y5VlyK]") or die("Connection failed");

  mysqli_select_db($conn,"id15312701_webdata");
  //$a = $_POST['uname'];
  $s=$conn->query("Select * from temp where role = 'Batsman'") or die("FAil");
  $m="l";
  $n=0;
  $l=$m.$n;
  /*if ($conn->query($s) === TRUE) {
    echo " Table selected successfully<br>";
  }
  else {echo "Fail...<br>";}
*/
  while ($row = mysqli_fetch_assoc($s))
  {

      $npn = $row['name'];
      $tf  = $row['selected'];
      $n=$n+1;
      $l=$m.$n;
      if (isset($_POST[$l]))
      {$c=$_POST[$l];}
      else{$c=null;}

      if (isset($c))
         {
           echo"$c     - ";
       $w="UPDATE temp SET selected ='True' WHERE name = '$_POST[$l]' " or die("FAil");
       if ($conn->query($w) === TRUE) {
         echo "Update Table successfully<br>";
       }
       else{
         echo "Error updating record: " . mysqli_error($conn);
       }
    }
else
   {
         echo"$c     - ";
         if($tf == 'True')
         {
     $v="UPDATE temp SET selected ='false' WHERE name = '$npn' " or die("FAil");
     if ($conn->query($v) === TRUE) {
       echo "$npn Update Table successfullyyyyy<br>";
     }
     else{
       echo "Error updating record: " . mysqli_error($conn);
     }
   }
    }

  }
$s1=$conn->query("Select * from temp where role = 'ALL'") or die("FAil");

while ($row = mysqli_fetch_assoc($s1))
{

    $npn = $row['name'];
    $tf  = $row['selected'];
    $n=$n+1;
    $l=$m.$n;
    if (isset($_POST[$l]))
    {$c=$_POST[$l];}
    else{$c=null;}

    if (isset($c))
       {
         echo"$c     - ";
     $w="UPDATE temp SET selected ='True' WHERE name = '$_POST[$l]' " or die("FAil");
     if ($conn->query($w) === TRUE) {
       echo "Update Table successfully<br>";
     }
     else{
       echo "Error updating record: " . mysqli_error($conn);
     }
  }
else
 {
       echo"$c     - ";
       if($tf == 'True')
       {
   $v="UPDATE temp SET selected ='false' WHERE name = '$npn' " or die("FAil");
   if ($conn->query($v) === TRUE) {
     echo "$npn Update Table successfullyyyyy<br>";
   }
   else{
     echo "Error updating record: " . mysqli_error($conn);
   }
 }
  }
  /*
  $d="delete from temp where selected='False' " or die("FAil");
  if ($conn->query($d) === TRUE) {
    echo "<br>Deleted Table records successfully<br>";
  }*/
/*
  $tp=$conn->query('Select count(name) from temp') or die("FAil");
  $tp=$conn->query('Select sum(cost) from temp') or die("FAil");
  $tp=$conn->query('Select sum(Overseas) from temp') or die("FAil");
*/
}
$s2=$conn->query("Select * from temp where role = 'Bowl'") or die("FAil");

while ($row = mysqli_fetch_assoc($s2))
{

    $npn = $row['name'];
    $tf  = $row['selected'];
    $n=$n+1;
    $l=$m.$n;
    if (isset($_POST[$l]))
    {$c=$_POST[$l];}
    else{$c=null;}

    if (isset($c))
       {
         echo"$c     - ";
     $w="UPDATE temp SET selected ='True' WHERE name = '$_POST[$l]' " or die("FAil");
     if ($conn->query($w) === TRUE) {
       echo "Update Table successfully<br>";
     }
     else{
       echo "Error updating record: " . mysqli_error($conn);
     }
  }
else
 {
       echo"$c     - ";
       if($tf == 'True')
       {
   $v="UPDATE temp SET selected ='false' WHERE name = '$npn' " or die("FAil");
   if ($conn->query($v) === TRUE) {
     echo "$npn Update Table successfullyyyyy<br>";
   }
   else{
     echo "Error updating record: " . mysqli_error($conn);
   }
 }
  }
  /*
  $d="delete from temp where selected='False' " or die("FAil");
  if ($conn->query($d) === TRUE) {
    echo "<br>Deleted Table records successfully<br>";
  }*/
/*
  $tp=$conn->query('Select count(name) from temp') or die("FAil");
  $tp=$conn->query('Select sum(cost) from temp') or die("FAil");
  $tp=$conn->query('Select sum(Overseas) from temp') or die("FAil");
*/
}
}
if(isset($_POST['sub']))/*if($_SERVER['REQUEST_METHOD']=='POST')*/
{
  button1();
   echo"<script type='text/javascript'>location.href = 'iplt2.php';</script>";
   //echo "Uploaded Squad<br> <a href='iplt2.php'>Click here</a> to Finalize Squad<br>";
}

     ?>


 <input type="submit" value="submit" name="sub" id='sub'> <br><br>
</form>
</body>
</html>
