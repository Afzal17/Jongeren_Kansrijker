<!DOCTYPE html>
<html>

	<head>
		<title>Overzicht Activiteiten Deelnemer</title>
		<link rel="stylesheet" href="css/styles.css">
	</head>

	<body>
			<?php

				// Starting a new session
				session_start();

				// Including the database file
				include('database/database.php');


				// Making a new select statement | all from jongere activiteit
				$jongereactiviteitloop = 'SELECT id, CONCAT(voornaam, " ",tussenvoegsel, " ",achternaam) AS naam FROM jongere';
				$db = new database();
				$jongere = $db->select($jongereactiviteitloop, []);

				//print_r($jongere); <- Check given values

				// Stappenplan
				// 1: echo de dropdown met alle jongere
				// 2: check if form submitted
				// 3: if so, select with a inner join
				// 4: expand innerjoin with a where claus ->jongere code matched met id van gebruiker

				// Check if form is submitted selected jongere
				if($_SERVER['REQUEST_METHOD'] == "POST") {

					// SQL statement
					$sql =
					'
					SELECT ja.jongere_id, CONCAT(j.voornaam, " ",j.tussenvoegsel, " ",j.achternaam) AS naam, a.activiteit, ja.startdatum, ja.afgerond
					FROM jongereactiviteit AS ja
					INNER JOIN jongere as j -- j = alias for jongere
					ON ja.jongere_id = j.id
					INNER JOIN activiteit AS a -- a = alias for activiteit
					ON ja.activiteit_id = a.id
					-- Below Where Clausule
					WHERE ja.jongere_id = :id -- named placeholder for id
					';

					$placeholder = [
						'id'=>$_POST['jongere']
					];

					// Copy of the database
					$db = new database();

					// Select statement of database copy
					//$db->select($sql, $placeholder);
					$result_set = $db->select($sql, $placeholder);

					// print_r $result_set
					print_r($result_set);

					// Array Keys
					$columns = array_keys($result_set[0]);
					// Array Values
					$row_data = array_values($result_set);

					//$columns = array_keys($result_set[0]);
					//$row_data = array_values($result_set);



				} // End of the if statement

			?>


			<form action="overzicht_activiteiten_deelnemer.php" method="POST">

				<h2>Selecteer een jongere om de bijbehorende activiteiten op te halen</h2>
					<select name="jongere" id="jongere">

						<?php foreach($jongere as $jk) { ?>

							<option value="<?php echo $jk['id']; ?>">
								<?php echo $jk['naam']; ?>
							</option>

						<?php } ?>

					</select>
					<input type="submit" value="submit">
			</form>

			<table>
				<tr>
					<th>Jonger_Id</th>
					<th>Naam</th>
					<th>Activiteit</th>
					<th>Startdatum</th>
					<th>Afgerond</th>
				</tr>
				<tr>
						<!-- Nilu vragen of hierbij een edit delete moet ivm met paths die mis kunnen gaan -->
						<!-- over tussenvoegsel NULL values navragen aan nilu -->

						<!-- $columns = array_keys($result_set[0]); -->
						<!-- $row_data = array_values($result_set); -->

							<?php
							// $columns = array_keys($result_set[0]);
							if(isset($columns) && !empty($columns)) {
									foreach($columns as $column) {
										echo $column;
									}
							}

							?>
				</tr>

				<tr>
						<?php
							// row_data = array_values($result_set);
							foreach($row_data as $row) {
								echo "<tr>";
									foreach($row as $data){
										echo"<td>$data</td>";
									}
								echo "</tr>";
							}

						?>
				</tr>

			</table>


	</body>

</html>