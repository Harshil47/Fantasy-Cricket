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
  $conn= mysqli_connect("localhost", "root", "") or die("Connection failed");

  mysqli_select_db($conn,"project");

  $x=$conn->query("Select * from details  ") or die("FAil");
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

    echo "$pn is a $pr of cost <b>$pc</b> ";
    $n=$n+1;
    $l=$m.$n;
    echo " <form method='post' ><input type='checkbox'  name=$l value=$pn></input>";

    //echo "<label for=$l> Tick $n $l </label><hr>";

    echo "<br>";
    echo "<br>";

}

?>

<?php
/*
if(array_key_exists('sub', $_POST)) {
      button1();
    }

*/

function button1() {
  $conn= mysqli_connect("localhost", "root", "") or die("Connection failed");

  mysqli_select_db($conn,"project");
  //$a = $_POST['uname'];
  $conn->query(DROP TABLE [IF EXISTS] temp);
  $y="create table temp (
      name varchar(20),
      country varchar(20),
      role varchar(20),
      cost numeric(20),
      selected varchar(10),
      Overseas numeric(5) )" or die("FAil");

      if ($conn->query($y) === TRUE) {
        echo "New Table created successfully<br>";
      }


      $z="INSERT INTO temp SELECT * FROM details " or die("FAil");
      if ($conn->query($z) === TRUE) {
        echo " Table Copied successfully<br>";
      }
  $s=$conn->query("Select * from temp ") or die("FAil");
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
       $w="UPDATE temp SET selected ='True' WHERE name = '$_POST[$l]' " or die("FAil");
       if ($conn->query($w) === TRUE) {
         echo "Update Table successfully<br>";
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
  }
  */
/*
  $tp=$conn->query('Select count(name) from temp') or die("FAil");
  $tp=$conn->query('Select sum(cost) from temp') or die("FAil");
  $tp=$conn->query('Select sum(Overseas) from temp') or die("FAil");
  <label for="uname"> Name:</label>
  <input id="uname"  placeholder="Full Name  " type="text" name="uname" /><br><br>

*/
}

if(isset($_POST['sub']))/*if($_SERVER['REQUEST_METHOD']=='POST')*/
{
  button1();
   echo "Uploaded Squad<br> <a href='iplt2.php'>Click here</a> to Finalize Squad<br>";
}

     ?>

 <input type="submit" value="Proceed" name="sub" id="sub"> <br><br>
</form>
</body>
</html>
