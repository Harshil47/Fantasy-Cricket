<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fantasy Cricket</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section>
        <div class="container">
            <div class="user signinBx">
                <div class="imgBx">
                    <img src="img1.png" alt="">
                </div>
                <div class="formBx">
                    <form action="ipllogin.php" method = 'POST'>
                        <h2>Sign In</h2>
                        <input type="email" name="uname" placeholder="Email" id="">
                        <input type="password" name="pass" placeholder="Password" id="">
                        <input type="submit" name ='submite' id='submite' value="Login">
                        <p class="signup">don't have an account ? <a href="#" onclick="javascript:doToggle();">Sign Up</a></p>
                    </form>
                </div>
            </div>
            <div class="user signupBx">
                <div class="formBx">
                    <form method = 'POST'>
                        <h2>Create An Account</h2>
                        <input type="email" name="uid" placeholder="User ID" id="uid">
                        <input type="text" name="unam" placeholder="Team Name" id="unam">
                        <input type="password" name="password" placeholder="Create Password" id="password">
                        <input type="submit" name ='sub' id='sub' value="Sign Up">
                    
                        <p class="signup">Already have an Account? <a href="#" onclick="javascript:doToggle();">Sign In</a></p>
                    </form>
                </div>
                <div class="imgBx"><img src="img2.png" alt=""></div>
            </div>
        </div>
    </section>
    <script type="text/javascript">
        function doToggle(){
            var container = document.querySelector('.container');
                container.classList.toggle('active')
        }
    </script>
    <?php
    if(isset($_POST['sub']))
    {
    $un=$_POST['uid'];
    $pass=$_POST['password'];
    $tm=$_POST['unam'];
    $conn= mysqli_connect("localhost", "id15312701_webharshil", "T8<%TgL34y5VlyK]") or die("Connection failed");

    mysqli_select_db($conn,"id15312701_webdata");
    $z="INSERT INTO login values('$un','$pass','$tm') " or die("FAil");
    if ($conn->query($z) === TRUE) {
      //echo " Table Copied successfully<br> <a href='ipltd.php'>click here</a> to make your <b>fantasy cricket team</b>";
      
    }
    else{echo"failll";}
    echo"<script type='text/javascript'>location.href = 'ipltd.php';</script>";
  }
  if(isset($_POST['submite']))
  {
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

          echo("You are in !   <a href='ipltd.php'>Click here</a> to get redirected to selection page<br><a href='iplprev.php'>Click here</a> to get redirected to Results page<br>");

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

  }
     ?>
</body>
</html>
