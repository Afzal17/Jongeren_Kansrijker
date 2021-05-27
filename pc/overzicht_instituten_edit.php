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
			$instituut = $_POST["instituut"];
			$telefoonnummer = $_POST["telefoonnummer"];

			$db = new database();

			$sql = "UPDATE instituut SET instituut=:instituut, telefoonnummer=:telefoonnummer WHERE id=:id";

			$placeholder = [
				'instituut'=>$instituut,
				'telefoonnummer'=>$telefoonnummer,
				'id' =>$_POST['id']];
			$db->edit_or_delete($sql, $placeholder, 'overzicht_instituten.php');

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
			<form action="overzicht_instituten_edit.php" method="POST" class="form">
				<h3>Wijzig Instituut Naam</h3><br>
				<p>Instituut Naam</p>
				<input type="hidden" name="id" value="<?php echo($_GET["id"]) ?>">
				<input type="text" name="instituut" value="<?php echo isset($_POST["instituut"]) ? htmlentities($_POST["instituut"]) : ''; ?>" required /><br>
				<p>Telefoonnummer</p>
				<input type="text" name="telefoonnummer" value="<?php echo isset($_POST["telefoonnummer"]) ? htmlentities($_POST["telefoonnummer"]) : ''; ?>" required /><br>
				<input type="submit" value="Submit" class="button-form">
			</form>
		</div>

	</body>

</html>