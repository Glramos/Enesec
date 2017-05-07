<?php
   include('actions/session.php');
   if($_SESSION['adm'])
      header("Location: home.php");
?>

<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>EneSec</title>

    <link rel="stylesheet" href="css/welcome.css">
  </head>

  <body>

    <div class="top">
      <div class="menu">
        <a href="actions/logout.php">Log Out</a>
        <a href="welcome.php">Home</a>
        <h1 id='logo'>EneSec</h1>
      </div>
    </div>

    <div class="middle">
      <div class="box">
        <?php echo "<h1 id='welcome'>Welcome $_SESSION[name] $_SESSION[lname]!</h1>"; ?>

      </div>
    </div>

    <div class="bottom">

    </div>

  </body>

  <footer>
     <h1 id="footer">Made by Gabriel Ramos and João Tribouillet</h1>
  </footer>
</html>
