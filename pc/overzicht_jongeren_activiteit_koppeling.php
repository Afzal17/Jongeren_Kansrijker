<!DOCTYPE html>
<html>

	<head>
		<title>Koppeling Jongeren aan Activiteit</title>
		<link rel="stylesheet" href="css/style.css">
	</head>

	<body>

		<?php

			/*
				Jongere Code
			*/

			// Including the database file for our database class and functions
			include('database/database.php');

			// Making a new database instance/copy
			$db = new database();

			// SQL Statement where we SELECT the data of jongere
			$sql = 'SELECT id, CONCAT(voornaam, " ", tussenvoegsel, " ", achternaam) AS naam
					FROM jongere';

			// New variable with database select function
			$jongeren = $db->select($sql, []); // Here give a empty placeholder we only select

			/*
				Activiteit Code
			*/

			// SQL Statement where we SELECT data of activiteit
			$sql = 'SELECT id, activiteit FROM activiteit';

			// New variable with database select function
			$activiteiten = $db->select($sql, []); // Here give a empty placeholder we  only select

			// If statement form input check
			if($_SERVER['REQUEST_METHOD'] == 'POST'){

				$sql = "INSERT INTO jongereactiviteit VALUES (:id, :activiteit_id, :jongere_id, :datum, :afgerond)";

				$placeholder = [
					'id'=>NULL,
					'jongere_id'=>$_POST['jongeren'],
					'activiteit_id'=>$_POST['activiteiten'],
					'datum'=>$_POST['datum'],
					'afgerond'=>$_POST['afgerond']
				];

				$db->insert($sql, $placeholder, 'overzicht_jongeren_activiteit_koppeling.php');
				// I still need to print a overzicht and redirect to this page
				// This is still a concept project for the upcoming exams

				echo "sum";



			} // End of the if form statement
				// Here comes a else statement if the values are empty


		?>

		<div class="container">
			<div class="content">

				<h1>Koppel hier je jongere aan een activiteit</h1>

				<form action="overzicht_jongeren_activiteit_koppeling.php" method="POST">

					<label for="jongeren">Jongeren</label><br>
						<?php if(is_array($jongeren) && !empty($jongeren)){ ?>
							<select name="jongeren" id="jongeren">
								<?php foreach($jongeren as $jongere) {?>
									<option value="<?php echo $jongere['id']; ?>">
										<?php echo $jongere['naam'];?>
									</option>
								<?php } ?>
							</select><br>
						<?php } ?>

					<label for="activiteiten">Activiteiten</label><br>
						<?php if(is_array($activiteiten) && !empty($activiteiten)){ ?>
							<select name="activiteiten" id="activiteiten">
								<?php foreach($activiteiten as $activiteit) {?>
									<option value="<?php echo $activiteit['id']; ?>">
										<?php echo $activiteit['activiteit'];?>
									</option>
								<?php } ?>
							</select><br>
						<?php } ?>



						<label for="datum">Startdatum</label><br>
						<input type="date" name="datum"><br>
						<label for="datum">Afgerond</label><br>
						<select name="afgerond" id="afgerond">
							<option value="0">Niet Afgerond</option>
							<option value="1">Afgerond</option>
						</select><br>
						<input type="submit" value="Koppel jongere aan activiteit">

				</form>

			</div>
		</div>

	</body>

</html>