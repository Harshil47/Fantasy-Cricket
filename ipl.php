<!DOCTYPE html>
<html lang="en">
<head>
  <title> Harshil Sanghavi TE-3-42</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="dl.css"/>

</head>
<body>

<?php
$pc=0;
$pn=0;
$pr=0;
  $conn= mysqli_connect("localhost", "root", "") or die("Connection failed");

  mysqli_select_db($conn,"project");

  $x=$conn->query("Select * from details  ") or die("FAil");
echo "No. of records present : ". mysqli_num_rows($x);
echo "<br>";
echo "<br>";
$m="l";
$n=0;
$l=$m.$n;
while ($row = mysqli_fetch_assoc($x))
{
    $pn = $row['name'];
    $pc = $row['cost'];
    $pr = $row['role'];

    echo "$pn is a $pr of cost <b>$pc</b> ";
    $n=$n+1;
    $l=$m.$n;
    echo " <form method='post'><input type='checkbox'  name=$l value=$pn></input>";

    echo "<label for=$l> Tick $n $l </label><hr>";

    echo "<br>";
    echo "<br>";

}

?>

  <label for="uname"> Name:</label>
  <input id="uname"  placeholder="Full Name  " type="text" name="uname" /><br><br>
  <input type="submit" value="Check" onclick="button2()" name="che" id="che"><br><br>
<button  id="sub" type="submit" name="sub">Submit</button><br><br>
</form>
<?php
if(array_key_exists('che', $_POST)) {
    button2();
}
  if(array_key_exists('sub', $_POST)) {
        button1();
      }

function button2() {
  $conn= mysqli_connect("localhost", "root", "") or die("Connection failed");
  mysqli_select_db($conn,"project");
  $sa=$conn->query("Select * from details ") or die("FAil");
  $ma="l";
  $na=0;
  $la=$ma.$na;
  $su=0;
  $so=0;
  $np=0;
  while ($rowe = mysqli_fetch_assoc($sa))
  {

      $npn = $rowe['name'];
      $npn = $rowe['cost'];
      $na=$na+1;
      $la=$ma.$na;
      if (isset($_POST[$la]))
      {$ca=$_POST[$la];}
      else{$ca=null;}


      if (isset($c))
         {
           $cou=$conn->query("Select cost,Overseas from details where name='$_POST[$la]'");
           while ($ro = mysqli_fetch_assoc($cou))
           {
          $co=$ro['cost'];
          $os=$ro['Overseas'];
           $su=$su + $co;
           $so=$so + $os;
           $np=$np+1;


         }


  }
}
  echo"$su<br> $so";
  if ($su >100)
  {
    echo"Cost should be less than 100<br>";
  }
  if ($so >4)
  {
    echo"Overseas Player shoud atmost be 4<br>";
  }
  if ($np!=11)
  {
    echo"There should be 11 players in your squad";
  }
}





function button1() {
  $conn= mysqli_connect("localhost", "root", "") or die("Connection failed");

  mysqli_select_db($conn,"project");
  $a = $_POST['uname'];
  $y="create table $a (
      name varchar(20),
      country varchar(20),
      role varchar(20),
      cost numeric(20),
      selected varchar(10),
      Overseas numeric(5) )" or die("FAil");

      if ($conn->query($y) === TRUE) {
        echo "New Table created successfully<br>";
      }


      $z="INSERT INTO $a SELECT * FROM details " or die("FAil");
      if ($conn->query($z) === TRUE) {
        echo " Table Copied successfully<br>";
      }
  $s=$conn->query("Select * from $a ") or die("FAil");
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
      $n=$n+1;
      $l=$m.$n;
      if (isset($_POST[$l]))
      {$c=$_POST[$l];}
      else{$c=null;}

      if (isset($c))
         {
           echo"$c     - ";
       $w="UPDATE $a SET selected ='True' WHERE name = '$_POST[$l]' " or die("FAil");
       if ($conn->query($w) === TRUE) {
         echo "Update Table successfully<br>";
       }
       else{
         echo "Error updating record: " . mysqli_error($conn);
       }
    }


  }
  $d="delete from $a where selected='False' " or die("FAil");
  if ($conn->query($d) === TRUE) {
    echo "Deleted Table records successfully";
  }

}

     ?>
</body>
</html>
