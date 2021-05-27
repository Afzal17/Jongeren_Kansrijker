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

		<?php

			// If statement check
			if($_SERVER['REQUEST_METHOD'] == "POST") {

				$voornaam = $_POST['voornaam'];
				$tussenvoegsel = $_POST['tussenvoegsel'];
				$achternaam = $_POST['achternaam'];
				$registratiedatum = $_POST['registratiedatum'];

				$sql = "INSERT INTO jongere (voornaam, tussenvoegsel, achternaam, registratiedatum) VALUES (:voornaam, :tussenvoegsel, :achternaam, :registratiedatum)";

				$placeholder = [
					'voornaam'=>$voornaam,
					'tussenvoegsel'=>$tussenvoegsel,
					'achternaam'=>$achternaam,
					'registratiedatum'=>$registratiedatum

				];

				$db = new database();
				$db->insert($sql, $placeholder, 'overzicht_jongeren.php');

			}


		?>

		<div class="content">
			<form action="overzicht_jongeren_add.php" method="POST" class="form">
				<h3>Voeg Jongere Toe</h3><br>
				<p>Voornaam</p>
				<input type="text" name="voornaam" required><br>
				<p>Tussenvoegsel</p>
				<input type="text" name="tussenvoegsel">
				<p>Achternaam</p>
				<input type="text" name="achternaam" required>
				<p>Registratie Datum</p>
				<input type="date" name="registratiedatum" required>

				<input type="submit" value="Toevoegen" class="button-form">
			</form>
		</div>

	</body>

</html>