<!DOCTYPE html>
<html>

	<?php

		// Starting the session
		session_start();

		// Including the database file with the class and functions
		include('database/database.php');

		// Making a copy of the database file
		$db = new database();

		// Making a variable where we store our select statement in
		$jongereninfo = $db->select("SELECT * FROM jongere", []); //<- WHERE is a empty string

		// Here we are making a delete statement
		if(isset($_GET['id'])) {
			$db->edit_or_delete("DELETE FROM jongere WHERE id=:id", ['id' =>$_GET['id']], "overzicht_jongeren.php");
		}



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
			<div class="content_overzicht">

				<h1>Jongeren Overzicht</h1>

					<a href="overzicht_jongeren_add.php">
						<button class="button_styling">Voeg Jongere Toe</button>
					</a>

					<a href="overzicht_jongeren_activiteit_koppeling.php">
						<button class="button_styling">Koppel JONGERE aan ACTIVITEIT</button>
					</a>

					<table>

						<tr>
							<th>JongereID</th>
							<th>Jongere Voornaam</th>
							<th>Jongere Tussenvoegsel</th>
							<th>Jongere Achternaam</th>
							<th>Registratie Datum (van 1 individuele jongere)</th>
							<th>Actie: Edit</th>
							<th>Actie: Delete</th>
						</tr>

						<!-- Here we are making a foreach loop to cycle through all jongere data -->

						<!--
							Our variable we made above is: $jongereninfo
							- We used a select statement to select everything
						 -->
						<?php foreach($jongereninfo as $jongere) { ?>
						<tr>
							<td><?php echo $jongere['id'];  ?></td>
							<td><?php echo $jongere['voornaam'];  ?></td>
							<td><?php echo $jongere['tussenvoegsel'];  ?></td>
							<td><?php echo $jongere['achternaam']; ?></td>
							<td><?php echo $jongere['registratiedatum']; ?></td>
							<td><a href="overzicht_jongeren_edit.php?id=<?php echo $jongere['id'] ?>">Edit</a></td>
							<td><a href="overzicht_jongeren.php?id=<?php echo $jongere['id'] ?>">Delete</a></td>
						</tr>
						<?php } ?>

					</table>

			</div>
		</div>

	</body>

</html>