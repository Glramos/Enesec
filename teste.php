<?php
	include('action_session.php');
	if(!$_SESSION['adm'])
		 header("Location: home.php");

	include("action_connect.php");

  if (mysqli_connect_errno()) {
    die("Failed to connect to MySQL: " . mysqli_connect_error());
  }

$sql = "SELECT name, email FROM users";
$result = mysqli_query($con,$sql);

if (!$result) {
  die('Error: ' . mysqli_error($con));
}

$count = mysqli_num_rows($result);


?>

<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>EneSec</title>

    <link rel="stylesheet" href="home.css">
    <script src="js/jquery.maskMoney.js" type="text/javascript"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>


		<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.css">

		<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.js"></script>

  </head>

  <body>

    <div class="top">
      <div class="menu">
        <a href="action_logout.php">Log Out</a>
        <a href="register.php">Register</a>
        <a href="about.html">About</a>
        <a href="home.php">Home</a>
        <h1 id='logo'>EneSec</h1>
      </div>
    </div>

    <div class="middle">
      <div class="box">
        <table id="myTable" class="compact order-column hover">
    			<thead>
    				<th>Nome</th>
    				<th>Email</th>
						<th>Edit/ Remove</th>
    			</thead>
    			<tbody>

    		<?php

    		if ($count > 0) {
    			// output data of each row
    			while($row = mysqli_fetch_assoc($result)) {

    				echo "<tr>";
    				echo "<td>" . $row["name"]. "</td><td data-email='" . $row["email"] . "'>" . $row["email"]."</td> <td><button class='btn-edit'>Edit</button>" . "  " . "<button class='btn-rmv'>Remove</button></td>";
    				echo "</tr>";
    			}
    		} else {
    			echo "0 results";
    		}

        mysqli_close($con);
    		?>
    			</tbody>
    		</table>

      </div>
    </div>

    <div class="bottom">

    </div>

  </body>

  <footer>
    <h1 id="footer">Made by Gabriel Lucena Ramos</h1>
  </footer>

  <script type="text/javascript">
	  $(document).ready(function(){
			$('#myTable').DataTable();
	 });
	</script>

	<script type="text/javascript">
	$(function(){
		$(document).on('click', '.btn-edit', function(e) {
				e.preventDefault;
				var url = "action_edit.php";
				var email = $(this).closest('tr').find('td[data-email]').data('email');

				location.href=" action_edit.php"
		});
	});


	</script>
</html>
