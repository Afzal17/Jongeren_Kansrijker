<!DOCTYPE html>
<html>

	<?php

		// Here we are starting the session
		session_start();
		//echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';

		// Including the database file
		include('database/database.php');

		// Copy of the database
		$db = new database();

		// Display the data (READ) CRUD Functionality
		$instituten = $db->select("SELECT * FROM instituut", []);

		if(isset($_GET['id'])) {
			$db->edit_or_delete("DELETE FROM instituut WHERE id=:id", ['id' =>$_GET['id']], "overzicht_instituten.php");
		}

		// Echo this statement below to catch errors
		// echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';

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

				<h1>Overzicht Instituten</h1>

					<!-- Button Class -->
					<a href="overzicht_instituten_add.php">
						<button class="button_styling">Voeg Instituut Toe</button>
					</a>

					<table>


						<tr>
							<th>InstituutID</th>
							<th>InstituutNaam</th>
							<th>Telefoonnummer</th>
							<th>Actie: Edit</th>
							<th>Actie: Delete</th>
						</tr>

						<?php foreach($instituten as $instituut){ ?>
						<tr>
							<td><?php echo $instituut['id']; ?></td>
							<td><?php echo $instituut['instituut']; ?></td>
							<td><?php echo $instituut['telefoonnummer'] ;?></td>

							<!-- Edit Function -->
							<td><a href="overzicht_instituten_edit.php?id=<?php echo $instituut['id']?>">Edit</a></td>

							<!-- Delete Function -->
							<td><a href="overzicht_instituten.php?id=<?php echo $instituut['id']?>">Delete</a></td>

						</tr>
						<?php } ?>


					</table>

			</div>
		</div>

	</body>

</html>