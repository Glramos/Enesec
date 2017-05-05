<?php
  include("action_session.php");
  include("action_connect.php");

  $notification="";

  $id = mysqli_real_escape_string($con, $_GET['id']);

  $sql = "DELETE FROM users WHERE id = '$id'";
  $result = mysqli_query($con,$sql);

  if (!$result) {
    die('Error: ' . mysqli_error($con));
    $notification = "error";
  }

  if($notification == "error"){
      echo "<script>alert('There was not possible to process your data! Try Again!'); location.href = 'home.php';</script>";
  }else {
      echo "<script>alert('Remove made with success!'); location.href = '../home.php';</script>";
  }

	mysqli_close($con);
 ?>
