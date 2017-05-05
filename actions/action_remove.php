<?php
  include("action_session.php");
  include("action_connect.php");

  $notification="";

  $email = mysqli_real_escape_string($con, $_POST['email']);

  $sql = "DELETE FROM users WHERE email = '$email'";
  $result = mysqli_query($con,$sql);

  if (!$result) {
    die('Error: ' . mysqli_error($con));
    $notification = "error";
  }

  if($notification == "error"){
      echo "<script>alert('There was not possible to process your data! Try Again!'); location.href = '../tedit.php';</script>";
  }else {
      echo "<script>alert('Remove made with success!'); location.href = '../tedit.php';</script>";
  }

	mysqli_close($con);
 ?>
