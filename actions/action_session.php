<?php
   session_start();

	if (!isset($_SESSION['email'])) {
		 echo "not logged!";
		 header("Location: ../index.html");
	}
?>
