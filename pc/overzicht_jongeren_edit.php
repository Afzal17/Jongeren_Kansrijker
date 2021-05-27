<!DOCTYPE html>
<html>

	<?php

		// Starting the session
		session_start();

		// Including the database file with the class and functions
		include('database/database.php');

		// Copy of the database
		$db = new database();

		// If statement
		if($_SERVER['REQUEST_METHOD'] == "POST"){
			$voornaam = $_POST["voornaam"];
			$tussenvoegsel = $_POST["tussenvoegsel"];
			$achternaam = $_POST["achternaam"];
			$registratiedatum = $_POST["registratiedatum"];


			$db = new database();

			$sql = "UPDATE jongere SET voornaam=:voornaam, tussenvoegsel=:tussenvoegsel, achternaam=:achternaam, registratiedatum=:registratiedatum WHERE id=:id";

			$placeholder = [
				'voornaam'=>$voornaam,
				'tussenvoegsel'=>$tussenvoegsel,
				'achternaam'=>$achternaam,
				'registratiedatum'=>$registratiedatum,
				'id' =>$_POST['id']];
			$db->edit_or_delete($sql, $placeholder, 'overzicht_jongeren.php');

			//var_dump($placeholder); //<- Alleen als je wilt debuggen

		} // End of the if statement


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

		<div class="content">
			<form action="overzicht_jongeren_edit.php" method="POST" class="form">
				<h3>Wijzig Instituut Naam</h3><br>
				<input type="hidden" name="id" value="<?php echo($_GET["id"]) ?>">
				<p>Voornaam</p>
				<input type="text" name="voornaam" value="<?php echo isset($_POST["voornaam"]) ? htmlentities($_POST["voornaam"]) : ''; ?>" required /><br>
				<p>Tussenvoegsel</p>
				<input type="text" name="tussenvoegsel" value="<?php echo isset($_POST["tussenvoegsel"]) ? htmlentities($_POST["tussenvoegsel"]) : ''; ?>" required /><br>
				<p>Achternaam</p>
				<input type="text" name="achternaam" value="<?php echo isset($_POST["achternaam"]) ? htmlentities($_POST["achternaam"]) : ''; ?>" required /><br>
				<input type="date" name="registratiedatum" value="<?php echo isset($_POST["registratiedatum"]) ? htmlentities($_POST["registratiedatum"]) : ''; ?>" required /><br>

				<input type="submit" value="Submit" class="button-form">
			</form>
		</div>

	</body>

</html>