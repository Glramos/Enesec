<?php
	include('action_session.php');
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

<html>
   <head>
	  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
	  <script src="js/jquery.maskMoney.js" type="text/javascript"></script>
	  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
	  <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
	</head>
	<body
	<div id='form-right'>
		<form onSubmit="handleValues()" action="/cadastro.php" method="POST">
			<p>First Name</p>
			<input type="text" id="fname" name="firstname" placeholder="Informe seu nome...">

			<p>Last Name</p>
			<input type="text" id="lname" name="lastname" placeholder="">

			<p>Salário</p>
			<input type="text" id="salario" name="salario" />


			<input type="submit" value="Submit">
		</form>
		<table id="myTable" class="compact order-column hover">
			<thead>
				<th>Nome</th>
				<th>Email</th>
			</thead>
			<tbody>
		<?php

		if ($count > 0) {
			// output data of each row
			while($row = mysqli_fetch_assoc($result)) {
				echo "<tr>";
				echo "<td>" . $row["name"]. "</td><td>" . $row["email"]."</td>";
				echo "</tr>";
			}
		} else {
			echo "0 results";
		}

		?>
			</tbody>
		</table>
	  <h2><a href = "action_logout.php">Sign Out</a></h2>
	</body>
	<script type="text/javascript">
	  $(function() {
		$("#salario").maskMoney({prefix:'R$ ', allowNegative: false, thousands:'.', decimal:',', affixesStay: true});
	  })

	  function returnSalary(){
		  return $('#salario').maskMoney('unmasked')[0];
	  }

	  function handleValues(){
		  document.getElementById("salario").value = returnSalary();
	  }

	  $(document).ready(function(){
			$('#myTable').DataTable();
	 });
	</script>
</html>
