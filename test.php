<?php
	include('action_session.php');
	if(!$_SESSION['adm'])
		 header("Location: home.php");

	include("action_connect.php");

  if (mysqli_connect_errno()) {
    die("Failed to connect to MySQL: " . mysqli_connect_error());
  }

$sql = "SELECT * FROM users";
$result = mysqli_query($con,$sql);

if (!$result) {
  die('Error: ' . mysqli_error($con));
}

$count = mysqli_num_rows($result);

unset($_POST[''])
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
        <a href="home.php">Home</a>
        <h1 id='logo'>EneSec</h1>
      </div>
    </div>

    <div class="middle">
      <div class="box">
        <table id="myTable" class="compact order-column hover">
    			<thead>
    				<th>Name</th>
						<th>Lastname</th>
						<th>CPF</th>
    				<th>Email</th>
						<th>Role</th>
						<th>Birthdate</th>
						<th>Wage</th>
						<th>Edit/ Remove</th>
    			</thead>
    			<tbody>

    		<?php

    		if ($count > 0) {
    			// output data of each row
    			while($row = mysqli_fetch_assoc($result)) {

    				echo "<tr>";
    				echo "<td>" . $row["name"]. "</td>".
					 "<td>" . $row["lname"]. "</td>".
						"<td>" . $row["cpf"]. "</td>".
						"<td data-email='" . $row["email"] . "'>". $row["email"]."</td>".
						"<td>" . $row["role"]. "</td>".
						"<td>" . $row["birthdate"]. "</td>".
						"<td>" . $row["wage"]. "</td>".
					 	"<td><a title='Edit' href='tedit?id=" . $row["id"] . " '>Edit</a>" . "  " . "<a title='Remove' href='taction_remove?id=" . $row["id"] . " '>Remove</a></td>";
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
     <h1 id="footer">Made by Gabriel Ramos and João Tribouillet</h1>
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
				var url = "edit.php";
				var email = $(this).closest('tr').find('td[data-email]').data('email');
				$.post( "edit.php", { email: email } );

				location.href=" edit.php"
		});
	});

	</script>

	<script type="text/javascript">
	$(function(){
		$(document).on('click', '.btn-rmv', function(e) {
				e.preventDefault;

				if (confirm('Do you realy want to remove this user?')){
					var email = $(this).closest('tr').find('td[data-email]').data('email');
					$.post( "action_remove.php", { email: email } );
									location.href=" home.php"
				}

		});
	});

	</script>
</html>
