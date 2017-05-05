<?php
   include("action_connect.php");
   session_start();

   if($_SERVER["REQUEST_METHOD"] == "POST") {

		// Check connection
		if (mysqli_connect_errno()) {
		  die("Failed to connect to MySQL: " . mysqli_connect_error());
		}

		// escape variables for security
		$email = mysqli_real_escape_string($con, $_POST['uname']);
		$psw = mysqli_real_escape_string($con, $_POST['psw']);
    $psw = MD5($psw);

		$sql = "SELECT * FROM users WHERE email = '$email' and psw = '$psw'";
		$result = mysqli_query($con,$sql);
    $atr = mysqli_fetch_array($result,MYSQLI_ASSOC);

		if (!$result) {
		  die('Error: ' . mysqli_error($con));
		}

		$count = mysqli_num_rows($result);

		// If result matched $email and $psw, table row must be 1 row

		  if($count == 1) {
      $_SESSION = $atr;

        if ($_SESSION[adm] == 1) {
          echo "user valid";
          header("location: ../home.php");
        }else {
          echo "user valid";
          header("location: ../welcome.php");
        }

		  }else {
			 $error = "Your Login Name or Password is invalid";
			 echo $error;
			 header("location: ../index.html");
		  }

		mysqli_close($con);

   }
?>]
