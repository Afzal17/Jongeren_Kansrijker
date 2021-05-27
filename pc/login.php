<!DOCTYPE html>

<html> <!-- Beginning of HTML tag -->

	<head> <!-- Beginning of HEAD tag -->
		<meta name="description" content="test application">
		<link rel="stylesheet" href="css/style.css">
		<title>Test Application | Home</title>
	</head> <!-- End of HEAD tag -->

	<body> <!-- Beginning of BODY tag -->

		<!-- PHP Land -->
		<?php

			session_start();
			include('database/database.php');

			if(isset($_POST['submit'])){
				$fields = ['gebruikersnaam', 'wachtwoord'];
				$error = false; // if false then it will run

				foreach($fields as $field){
					if (!isset($_POST[$field]) || empty($_POST[$field])){
						$error = true;
					}
				} // foreach statement

				if(!$error) {
					$gebruikersnaam = $_POST['gebruikersnaam'];
					$wachtwoord = $_POST['wachtwoord'];

					$db = new database();

					$db->loginMedewerker($gebruikersnaam, $wachtwoord);
				}




			} // if statement end

		?>
		<!-- End of PHP Land -->

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
			<form action="login.php" method="POST" class="form">
				<!-- <h2>Login Form</h2><br> -->
				<h3>Login Medewerker</h3><br>
				<p>Gebruikersnaam:</p>
				<input type="text" name="gebruikersnaam" required>
				<p>Wachtwoord:</p>
				<input type="password" name="wachtwoord" required>
				<br>
				<input type="submit" name="submit" value="Login" class="button-form">
			</form>
		</div>

	</body> <!-- End of BODY tag -->

</html> <!-- End of HTML tag -->