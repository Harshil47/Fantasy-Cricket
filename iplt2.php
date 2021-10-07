<!DOCTYPE html>
<html lang="en">
<head>
  <title> Harshil Sanghavi TE-3-42</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="iplt2.css"/>

</head>
<body>

<?php
$pc=0;
$pn=0;
$pr=0;
  $conn= mysqli_connect("localhost", "id15312701_webharshil", "T8<%TgL34y5VlyK]") or die("Connection failed");

  mysqli_select_db($conn,"id15312701_webdata");


  $tpq=$conn->query("Select count(name) as Total_Record from temp where selected='true'") or die("FAileeee");
  while ($row = mysqli_fetch_assoc($tpq))
  {
    $tp = $row['Total_Record'];
    //echo " $tp <br>";
  }
  $tcq=$conn->query("Select sum(cost) as Total_Cost from temp where selected='true'") or die("FAil");
  while ($row = mysqli_fetch_assoc($tcq))
  {
    $tc = $row['Total_Cost'];
    //echo " $tc <br>";
  }
  $toq=$conn->query("Select sum(Overseas) as Total_Overseas from temp where selected='true'") or die("FAil");
  while ($row = mysqli_fetch_assoc($toq))
  {
    $to = $row['Total_Overseas'];
  //  echo " $to <br>";
  }
  if( $tp!=11 or $tc >100 or $to > 4 )
  {
    echo" No. of players : $tp<br>Total Cost : $tc <br><br>";
    echo "Unbalanced Squad<br> <a href='iplt3.php'>Click here</a> to Make changes to Squad<br><br>";
  }
  else {
    echo" Finalize squad<br><br>";
    echo" Make sure that you enter the same team name that you entered while registering<br><br>";
    if(isset($_POST['sub']))
    {
    $a = $_POST['una'];
    $y="create table $a (
        name varchar(20),
        country varchar(20),
        role varchar(20),
        cost numeric(20),
        selected varchar(10),
        Overseas numeric(5) )" or die("FAilooo");

        if ($conn->query($y) === TRUE) {
          echo "New Table created successfully<br>";
        }
        else{
            echo"Error";
        }


    $z="INSERT INTO $a SELECT * FROM temp where selected ='true' " or die("FAilhaa");
    if ($conn->query($z) === TRUE)
      {
      echo " Table Copied successfully<br>";
      $conn->query('drop table temp');
      echo"Team made Sql Done";
      }
      echo"<script type='text/javascript'>location.href = 'thankyou.html';</script>";
    }
    echo"<form method = 'post'><label for='uname'> Enter your Team Name</label><input id='una'  placeholder='Team Name' type='text' name='una' /><br><br><input type='submit' value='submit' name='sub'> </form><br><br>";

  }



  $x=$conn->query("Select * from temp where selected ='true'  ");
  //echo "No. of records present : ". mysqli_num_rows($x);
  //echo "<br>";

  $m="l";
  $n=0;
  $l=$m.$n;
  $nc=0;
  while ($row = mysqli_fetch_assoc($x))
  {
    $pn = $row['name'];
    $pc = $row['cost'];
    $pr = $row['role'];

    echo "$pn - $pr &nbsp;&nbsp;&nbsp;&nbsp;";
    $n=$n+1;
    $l=$m.$n;
    $nc=$nc+1;
    if($nc==4 or $nc==7)
    {
      echo "<br>";
      echo "<br>";
    }

  }
