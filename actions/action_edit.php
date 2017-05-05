<?php
  include("action_session.php");
  include("action_connect.php");

  $notification="edit";

  $name = mysqli_real_escape_string($con, $_POST['name']);
  $lname = mysqli_real_escape_string($con, $_POST['lname']);
  $cpf = mysqli_real_escape_string($con, $_POST['cpf']);
  $email = mysqli_real_escape_string($con, $_POST['email']);
  $role = mysqli_real_escape_string($con, $_POST['role']);
  $birthdate = mysqli_real_escape_string($con, $_POST['birthdate']);
  $wage = mysqli_real_escape_string($con, $_POST['wage']);;


  function is_new(){
    include 'action_connect.php';

    $email = mysqli_real_escape_string($con, $_POST['email']);

    $sql = "SELECT * FROM users WHERE email = '$email' and id != '$_SESSION[opt]'";
    $result = mysqli_query($con,$sql);
    $count = mysqli_num_rows($result);

    if($count == 1) {
      global $notification;
      $notification = "email";

      return 0;
    }else{
      return 1;
    }

  }

  function is_true_cpf($cpf = null) {

      // Verifica se um número foi informado
      if(empty($cpf)) {
        global $notification;
        $notification = "cpf";

        return false;
      }

      // Elimina possivel mascara
      $cpf = preg_replace('/[^0-9]/', '', (string) $cpf);
      $cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);

      // Verifica se o numero de digitos informados é igual a 11
      if (strlen($cpf) != 11) {
        global $notification;
        $notification = "cpf";

        return false;
      }
      // Verifica se nenhuma das sequências invalidas abaixo
      // foi digitada. Caso afirmativo, retorna falso
      else if ($cpf == '00000000000' ||
          $cpf == '11111111111' ||
          $cpf == '22222222222' ||
          $cpf == '33333333333' ||
          $cpf == '44444444444' ||
          $cpf == '55555555555' ||
          $cpf == '66666666666' ||
          $cpf == '77777777777' ||
          $cpf == '88888888888' ||
          $cpf == '99999999999') {

            global $notification;
            $notification = "cpf";

            return false;
       // Calcula os digitos verificadores para verificar se o
       // CPF é válido
       } else {

          for ($t = 9; $t < 11; $t++) {

              for ($d = 0, $c = 0; $c < $t; $c++) {
                  $d += $cpf{$c} * (($t + 1) - $c);
              }
              $d = ((10 * $d) % 11) % 10;
              if ($cpf{$c} != $d) {
                global $notification;
                $notification = "cpf";

                return false;
              }
          }

          return true;
      }
  }

  if(is_new() && is_true_cpf($cpf)){
    $sql = "UPDATE users SET name='$name', lname='$lname', cpf='$cpf', email='$email', role='$role', birthdate='$birthdate', wage='$wage' WHERE id='$_SESSION[opt]'";
    $result = mysqli_query($con,$sql);

    if (!$result) {
      die('Error: ' . mysqli_error($con));
      $notification = "error";
    }
  }

  if($notification == "error"){
      echo "
      <script>
        location.href = '../tedit?id=$_SESSION[opt]&notification=$notification';
      </script>";
  }elseif($notification == "email"){
    echo "
    <script>
      location.href = '../tedit?id=$_SESSION[opt]&notification=$notification';
    </script>";
  }elseif ($notification == "cpf") {
    echo "
    <script>
      location.href = '../tedit?id=$_SESSION[opt]&notification=$notification';
    </script>";
  }else {
    echo "
    <script>
      location.href = '../home?id=$_SESSION[opt]&notification=$notification';
    </script>";
  }

	mysqli_close($con);
 ?>
