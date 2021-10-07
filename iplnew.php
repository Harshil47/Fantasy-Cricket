<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.js"></script>
<script src="val.js"></script>

<link rel="stylesheet" href="jq.css"/>


</head>

<html>
<body>
		<form onsubmit=" return validate()"  method="post" name='registration'>
			<label for="uid"> User ID:</label>
			<input id="uid"  placeholder="Lenght: 5 to 12 " type="text" name ="uid" ></input><br><br>

			<label for="pass">Password :</label>
	    <input type="password" id="password" name="password" placeholder="7 to 12 Characters" ></input><br><br>

			<label for="uname"> Name:</label>
	    <input id="uname"  placeholder="Alphabates only  " type="text" name="uname" /><br><br>

			<button  type="submit" id='sub' name='sub'>Submit</button>
		</form>
    <?php
    if(isset($_POST['sub']))
    {
    $un=$_POST['uid'];
    $pass=$_POST['password'];
    $tm=$_POST['uname'];
    $conn= mysqli_connect("localhost", "id15312701_webharshil", "T8<%TgL34y5VlyK]") or die("Connection failed");

    mysqli_select_db($conn,"id15312701_webdata");
    $z="INSERT INTO login values('$un','$pass','$tm') " or die("FAil");
    if ($conn->query($z) === TRUE) {
      echo " Table Copied successfully<br> <a href='ipltd.php'>click here</a> to make your <b>fantasy cricket team</b>";
    }
    else{echo"failll";}
  }
     ?>
		</body>
    </html>
