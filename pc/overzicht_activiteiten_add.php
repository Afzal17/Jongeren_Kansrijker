<!DOCTYPE html>
<html>

	<?php

		// Include database file
		include('database/database.php');

		// Starting the session
		session_start();

	?>

	<head>
		<title>Medewerker Homepage</title>
		<link rel="stylesheet" href="css/style.css">
		<meta charset="UTF-8">
	</head>

	<body>

		<?php

				// making a if statement to control if there is something given with the post method
				if($_SERVER['REQUEST_METHOD'] == "POST"){

					// checking if the form is filled in
					$activiteit = $_POST['activiteit'];

					$sql = "INSERT INTO activiteit (activiteit) VALUES (:activiteit)";

					$placeholder = [
						'activiteit'=>$activiteit
					];

					$db = new database();
					$db->insert($sql, $placeholder, 'overzicht_activiteiten.php');

				}

		?>

		<header>
			<div class="container">

				<div class="logo">
					<h1><a href="medewerker_homepage.php">Jongeren Kansrijker</a></h1>
				</div>

				<nav>
					<ul class="medewerker_homepage_header">
						<li><a href="overzicht_activiteiten.php">Overzicht Activiteiten</a></li>
						<li><a href="overzicht_medewerkers.php">Overzicht Medewerkers</a></li>
						<li><a href="overzicht_instituten.php">Overzicht Instituten</a></li>
						<li><a href="overzicht_jongeren.php">Overzicht Jongeren</a></li>
						<li><a href="logout.php">Uitloggen</a></li>
						<li>

						<?php
							if(isset($_SESSION['gebruikersnaam'])){
								echo '<p class="AdminAccountNav">' . $_SESSION['gebruikersnaam'] . '</p>';
							}
						?>
						</li>
					</ul>
				</nav>

			</div>
		</header>

		<div class="content">
			<form action="overzicht_activiteiten_add.php" method="POST" class="form">
				<h3>Voeg Activiteit Toe</h3><br>
				<p>Activiteit Naam</p>
				<input type="text" name="activiteit" required>
				<input type="submit" value="Toevoegen" class="button-form">
			</form>
		</div>

	</body>

</html>