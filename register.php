<?php
   include('actions/action_session.php');
   if(!$_SESSION['adm'])
      header("Location: home.php");
?>
<script src="https://code.angularjs.org/1.2.16/angular.js"></script>
<script src="http://aguirrel.github.io/ng-currency/dist/ng-currency.js"></script>

<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>EneSec</title>

    <link rel="stylesheet" href="css/register.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>

    <script type="text/javascript" src="js/jquery.js" ></script>
    <script src="js/jquery.maskMoney.js" type="text/javascript"></script>
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
		function checkPss(){
			if(document.getElementById('psw').value != "" && document.getElementById('cpsw').value != "")
			if(document.getElementById('psw').value == document.getElementById('cpsw').value){
        document.getElementById("cpsw").style.backgroundColor = "rgba(0,130,46,0.2)";
        document.getElementById("cpsw").style.borderColor = "rgb(0,130,46)";
        document.getElementById("cpsw").style.borderWidth = "0.30em";
				 $('#subButton').prop('disabled', false);
			 }
			else{
        document.getElementById("cpsw").style.backgroundColor = "rgba(255,0,0,0.5)";
        document.getElementById("cpsw").style.borderColor = "rgb(255,0,0)";
        document.getElementById("cpsw").style.borderWidth = "0.30em";
				 $('button').prop('disabled', true);
			 }
		 }
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
      <form class="" action="actions/action_register.php" method="post">
        <div class="container">

          <label><b>Name</b></label>
          <input type="text" placeholder="Enter the name" name="name" required>

          <label><b>Last Name</b></label>
          <input type="text" placeholder="Enter the last name" name="lname" required>

					<form name="form1">
          <label><b>CPF</b></label>
          <input id="cpf" type="text" placeholder="Enter the CPF" name="cpf" required>
					</form>

          <label><b>Role</b></label>
          <input type="text" placeholder="Enter the role" name="role" required>

          <label><b>Birth Date</b></label>
          <input id="birthdate"type="text" placeholder="Enter the birth date" name="birthdate" required>

          <label><b>Wage</b></label>
          <input id="wage" type="text" placeholder="Enter the wage" name="wage" data-prefix="R$ " required>

          <label><b>E-Mail</b></label>
          <input type="email" placeholder="Enter E-Mail" name="email" required>

          <label><b>Password</b></label>
          <input id="psw" type="password" placeholder="Enter Password" name="psw" onkeyup="checkPss()" required>

          <label><b>Confirm Password</b></label>
          <input id="cpsw" type="password" placeholder="Confirm Password" name="cpsw" onkeyup="checkPss()" required>

          <button id="subButton" type="submit" disabled="true">Add</button>
        </div>
      </form>
    </div>

    <div class="bottom">

    </div>

  </body>

  <footer>
		<h1 id="footer" >Made by Gabriel Ramos and João Tribouillet</h1>
  </footer>


</html>

<?php
  if (isset($_GET['notification'])) {
    global $notification;
    $notification = $_GET['notification'];
    include('actions/action_notification.php');
  }
?>
