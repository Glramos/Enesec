<?php
  global $notification;
  if($notification == "error"){
      echo '
      <script>
        swal({
          title: "Error",
          text: "There was not possible to process your data! Please, try again.",
          timer: 2000,
          showConfirmButton: false
        });
      </script>';
  }elseif($notification == "email"){
    echo '
    <script>
      swal({
        title: "Email",
        text: "There is already a user with this email!",
        timer: 2000,
        showConfirmButton: false
      });
    </script>';
  }elseif ($notification == "cpf") {
    echo '
    <script>
      swal({
        title: "CFP",
        text: "This CFP is not valid!",
        timer: 2000,
        showConfirmButton: false
      });
    </script>';
  }else if($notification == "edit"){
    echo '
    <script>
      swal({
        title: "Edit",
        text: "All changes made with success!",
        timer: 2000,
        showConfirmButton: false
      });
    </script>';
  }else if($notification == "register"){
    echo '
    <script>
      swal({
        title: "Register",
        text: "New user registered with success!",
        timer: 2000,
        showConfirmButton: false
      });
    </script>';
  }else if($notification == "remove"){
    echo '
    <script>
      swal({
        title: "Remove",
        text: "User removed successfully!",
        timer: 2000,
        showConfirmButton: false
      });
    </script>';
  }else {

  }

  unset($_GET["notification"]);
?>
