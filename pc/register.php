<!DOCTYPE html>

<html> <!-- Beginning of HTML tag -->

	<head> <!-- Beginning of HEAD tag -->
		<meta name="description" content="test application">
		<link rel="stylesheet" href="css/style.css">
		<title>Test Application | Home</title>
	</head> <!-- End of HEAD tag -->

	<body> <!-- Beginning of BODY tag -->

		<?php

			// Here we are starting a new session
			session_start();
			// Here we are including our database file/script to request a copy of every function
			include 'database/database.php';

			// If we want to make a new object we first need to make the statement prepared
			// if the statement is prepared we can call upon a new object making a copy
			// of that particular class that we need with the desired functions

			// Checking what the form contains using a POST method
			if($_SERVER['REQUEST_METHOD'] == "POST"){

				// Here we are checking if the 'gebruikersnaam' & 'wachtwoord' are passed into the form
				$gebruikersnaam = $_POST['gebruikersnaam'];
				$wachtwoord = $_POST['wachtwoord'];

				// Here we are making a sql statement to push these variables into the database
				$sql = "INSERT INTO medewerker (gebruikersnaam, wachtwoord) VALUES (:gebruikersnaam, :wachtwoord)";

				$placeholder = [
					'gebruikersnaam'=>$gebruikersnaam,
					'wachtwoord'=>password_hash($wachtwoord, PASSWORD_DEFAULT )
					// PASSWORD_DEFAULT is a crypting algorithm used to store passwords
				];

				$db = new database();
				$db->insert($sql, $placeholder, 'login.php'); // Here we still need to add a location to redirect

			} // End of the if statement


		?>

		<header>
			<div class="container">

				<div class="logo">
					<h1><a href="index.php">Jongeren Kansrijker</a></h1>
				</div>

				<nav>
					<ul>
						<li><a href="login.php">Login</a></li>
						<li><a href="register.php">Register</a></li>
						<li><a href="contact.php">Contact</a></li>
					</ul>
				</nav>

			</div>
		</header>

		<div class="content">
			<form action="register.php" method="POST" class="form"> <!-- FORM contains POST method -->
				<h3>Register Medewerker</h3><br>
				<p>Gebruikersnaam:</p>
				<input type="text" name="gebruikersnaam" required> <!-- Gebruikernaam -->
				<p>Wachtwoord:</p>
				<input type="password" name="wachtwoord" required> <!-- Wachtwoord -->
				<br>
				<input type="submit" value="Register" class="button-form">

			</form>
		</div>

	</body> <!-- End of BODY tag -->

</html> <!-- End of HTML tag -->