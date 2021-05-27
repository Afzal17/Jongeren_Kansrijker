<!DOCTYPE html>
<html>

	<?php

		// Include database file
		include('database/database.php');

		// Starting the session
		session_start();

		// copy of the database
		$db = new database();
		$activiteiten = $db->select("SELECT * FROM activiteit", []);

		if(isset($_GET['id'])) {
			$db->edit_or_delete("DELETE FROM activiteit WHERE id=:id", ['id'=>$_GET['id']], "overzicht_activiteiten.php");
			// if fucked up, backup
			$loginError = $db->edit_or_delete($sql,
				$placeholder, "overzicht_activiteiten.php");
		}

		//echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';

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

				<h1>Overzicht Activiteiten</h1>

					<!-- Button Class -->
					<a href="overzicht_activiteiten_add.php">
						<button class="button_styling">Voeg Activiteit Toe</button>
					</a>

					<a href="overzicht_activiteiten_deelnemer.php">
						<button class="button_styling">Overzicht Activiteiten Deelnemer</button>
					</a>

					<a href="">
						<button>XML Import</button>
					</a>

					<table>


						<tr>
							<th>ActiviteitID</th>
							<th>ActiviteitNaam</th>
							<th>Actie: Edit</th>
							<th>Actie: Delete</th>
						</tr>

						<?php foreach($activiteiten as $activiteit){ ?>
						<tr>
							<td><?php echo $activiteit['id']; ?></td>
							<td><?php echo $activiteit['activiteit']; ?></td>

							<!-- Edit Function -->
							<td><a href="overzicht_activiteiten_edit.php?id=<?php echo $activiteit['id']?>">Edit</a></td>

							<!-- Delete Function -->
							<td><a href="overzicht_activiteiten.php?id=<?php echo $activiteit['id'] ?>">Delete</a></td>
						</tr>
						<?php } ?>


					</table>

			</div>
		</div>

	</body>

</html>