<?php
  include("action_session.php");
  include("action_connect.php");

  $notification="remove";

  $email = mysqli_real_escape_string($con, $_POST['email']);

  $sql = "DELETE FROM users WHERE email = '$email'";
  $result = mysqli_query($con,$sql);

  if (!$result) {
    die('Error: ' . mysqli_error($con));
    $notification = "error";
  }

  if($notification == "error"){
      echo "
      <script>
        location.href = '../home?notification=$notification';
      </script>";
  }else {
    echo "
    <script>
      location.href = '../home?notification=$notification';
    </script>";
  }

	mysqli_close($con);
 ?>
