<!DOCTYPE html>
<html>

	<?php

		// Starting the session
		session_start();

		// Including the database file with the class and functions
		include('database/database.php');

		// Making a copy of the database file
		//$db = new database();

		// New variable with a statement that pulls out 2 different datatypes without a where empty string
		// ->select() refers to the select function in the database class
		//$activiteitinfo = $db->select("SELECT id, activiteit FROM activiteit", []); //<- where is a empty string

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

		<div class="container">
			<div class="medewerker_homepage_notification">
				<?php

					if(isset($_SESSION['gebruikersnaam'])){
						echo '<p><b>You logged in! Hello ' . $_SESSION['gebruikersnaam'] . '</b></p>';
					}

				?>

			</div>
		</div>

 		<!--
 		<p>Dit is alleen een voorbeeld ter illustratie</p>
		<div class="form_form">
			<div class="content">
				<form action="medewerker_homepage.php" method="POST">
					<p>Selecteer de gewenste activiteit</p>

						<select name="activiteitinfo" id="activiteitinfo">

							<?php foreach($activiteitinfo as $activiteit) { ?>
								<option value ="<?php echo $activiteit['id']?>">
									<?php echo $activiteit['activiteit']; ?>
								</option>
							<?php } ?>

						</select>

				</form>
			</div>
		</div>
		-->

	</body>

</html>