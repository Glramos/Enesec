<?php
  include('actions/action_session.php');

  if(!$_SESSION['adm'])
     header("Location: ../home.php");

  include("actions/action_connect.php");

  $id = mysqli_real_escape_string($con, $_GET['id']);

  $sql = "SELECT * FROM users WHERE id = '$id'";
  $result = mysqli_query($con,$sql);
  $atr = mysqli_fetch_array($result,MYSQLI_ASSOC);

  $_SESSION['opt'] = $atr['id'];

 ?>

 <!DOCTYPE html>
 <html>
   <head>
     <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
     <title>EneSec</title>

     <link rel="stylesheet" href="css/edit.css">
     <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
     <script type="text/javascript" src="js/jquery.js" ></script>
 		<script src="js/jquery.js" type="text/javascript"></script>
 		<script src="js/inputmask.js" type="text/javascript"></script>
 		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
   	<script src="js/jquery.maskMoney.js" type="text/javascript"></script>
 		<script src="js/jquery.maskedinput.js" type="text/javascript"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
 	  <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript" charset="utf8" src="/enesec/sweetalert-master/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="/enesec/sweetalert-master/dist/sweetalert.css">


    <script type="text/javascript">
   $(document).ready(function(){
     $("#wage").maskMoney({showSymbol:true, symbol:"R$ ", allowNegative: false, thousands:'.', decimal:',', affixesStay: false});
   });

   $(document).ready(function(){
     $("#cpf").mask("999.999.999-99");
     $("#birthdate").mask("99/99/9999",{placeholder:"dd/mm/yyyy"});
   });

   </script>

   </head>

   <body>

     <div class="top">
       <div class="menu">
         <a href="actions/action_logout.php">Log Out</a>
         <a href="register.php">Register</a>
         <a href="home.php">Home</a>
         <h1 id='logo'>EneSec</h1>
       </div>
     </div>

     <div class="middle">
       <form class="" action="actions/action_edit.php" method="post">
         <div class="container">

           <label><b>Name</b></label>
           <input type="text" placeholder="Enter the name" name="name" <?php echo "value= $atr[name]"?> required>

           <label><b>Last Name</b></label>
           <input type="text" placeholder="Enter the last name" name="lname" <?php echo "value= $atr[lname]"?> required>

           <label><b>CPF</b></label>
           <input id="cpf" type="text" placeholder="Enter the CPF" name="cpf" pattern="^\d{3}.\d{3}.\d{3}-\d{2}$" title="ex.: XXX.XXX.XXX-XX" <?php echo "value= $atr[cpf]"?>  required>

           <label><b>Role</b></label>
           <input type="text" placeholder="Enter the role" name="role" <?php echo "value= $atr[role]"?> required>

           <label><b>Birth Date</b></label>
           <input id="birthdate" type="text" placeholder="Enter the birth date" name="birthdate" <?php echo "value= $atr[birthdate]"?> required>

           <label><b>Wage</b></label>
           <input id="wage" type="text" placeholder="Enter the wage" name="wage" <?php echo "value= $atr[wage]"?> required>

           <label><b>E-Mail</b></label>
           <input type="email" placeholder="Enter E-Mail" name="email" <?php echo "value= $atr[email]"?> required>

           <button type="submit">Change</button>
         </div>
       </form>
     </div>

     <div class="bottom">

     </div>

   </body>

   <footer>
     <h1 id="footer">Made by Gabriel Ramos and João Tribouillet</h1>
   </footer>


 </html>

 <?php
   if (isset($_GET['notification'])) {
     global $notification;
     $notification = $_GET['notification'];
     include('actions/action_notification.php');
   }
 ?>
