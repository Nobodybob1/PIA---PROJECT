<?php 
	include 'konekcija.php';
	session_start();

	if (isset($_POST['uredi'])) {
		$id = $_POST['uredi'];
		$idProjekta = $_POST['idProjekta'];
		$naziv = $_POST['naziv'];
		$lokacija = $_POST['lokacija'];
		$sprema = $_POST['sprema'];
		$opis = $_POST['opis'];
		$benefiti = $_POST['benefiti'];
		$rok_konkursa = $_POST['rok_konkursa'];
		$status = $_POST['status'];

		$conn = OpenCon();
		$sql = "UPDATE projekti SET idProjekta = '$idProjekta', naziv = '$naziv', lokacija = '$lokacija', sprema = '$sprema', opis = '$opis', benefiti = '$benefiti', rok_konkursa = '$rok_konkursa', status = '$status' WHERE idProjekta = '$id'";
		$conn->query($sql);
		$conn->close();
	}
?>

<?php		
	if (isset($_POST['uredi2'])) {
		$id2 = $_POST['uredi2'];
		$idAktivnosti = $_POST['idAktivnosti'];
		$idProjekta2 = $_POST['idProjekta2'];
		$nazivAktivnosti = $_POST['nazivAktivnosti'];
		$opisAktivnosti = $_POST['opisAktivnosti'];
		$statusAktivnosti = $_POST['statusAktivnosti'];

		$conn = OpenCon();
		$sql2 = "UPDATE aktivnosti SET idAktivnosti = '$idAktivnosti', idProjekta = '$idProjekta2', naziv = '$nazivAktivnosti', opis = '$opisAktivnosti', status = '$statusAktivnosti' WHERE idAktivnosti = '$id2'";
		$conn->query($sql2);
		$conn->close();
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  	<link rel="stylesheet" type="text/css" href="css/urediprojekat.css">
	<title>Uredi Projekat</title>
</head>
<body>
	<div class="container-fluid">
		<h1>Uredi projekat</h1>
		<?php 
			$conn = OpenCon();
			$sql = "SELECT * FROM projekti";
			$result = $conn->query($sql);
			echo '<table class="table table-striped">
				<thead>
					<tr>
						<th>idProjekta</th>
						<th>Naziv</th>
						<th>Lokacija</th>
						<th>Sprema</th>
						<th>Opis</th>
						<th>Benefiti</th>
						<th>Rok Konkursa</th>
						<th>Status</th>
					</tr>
				<thead>';

			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					echo "<tbody>";
					echo "<form method='post'>";
					echo "<tr>";
					echo "<td><input type='text' name='idProjekta' value='".$row['idProjekta']."'></td>";
					echo "<td><input type='text' name='naziv' value='".$row['naziv']."'></td>";
					echo "<td><input type='text' name='lokacija' value='".$row['lokacija']."'></td>";
					echo "<td><input type='text' name='sprema' value='".$row['sprema']."'></td>";
					echo "<td><input type='text' name='opis' value='".$row['opis']."'></td>";
					echo "<td><input type='text' name='benefiti' value='".$row['benefiti']."'></td>";
					echo "<td><input type='text' name='rok_konkursa' value='".$row['rok_konkursa']."'></td>";
					echo "<td><input type='text' name='status' value='".$row['status']."'></td>";

					echo "<td><div class='text-center'>";
					echo "<button name='uredi' class='btn btn-warning' onclick='return confirm(`Sigurno?`)' value='".$row["idProjekta"]."'>Ažuriraj</button>";
					echo "</div></td>";
					echo "</tr>";
					echo "</tbody>";
					echo "</form>";
				}

				echo "</table>";

				$sql2 = "SELECT * FROM aktivnosti";
				$result2 = $conn->query($sql2);
				echo '<table class="table table-striped">
				<thead>
					<tr>
						<th>idAktivnosti</th>
						<th>idProjekta</th>
						<th>Naziv</th>
						<th>Opis</th>
						<th>Status</th>
					</tr>
				<thead>';

				if ($result2->num_rows > 0) {
					while($row2 = $result2->fetch_assoc()) {
						echo "<tbody>";
						echo "<form method='post'>";
						echo "<tr>";
						echo "<td><input type='text' name='idAktivnosti' value='".$row2['idAktivnosti']."'></td>";
						echo "<td><input type='text' name='idProjekta2' value='".$row2['idProjekta']."'></td>";
						echo "<td><input type='text' name='nazivAktivnosti' value='".$row2['naziv']."'></td>";
						echo "<td><input type='text' name='opisAktivnosti' value='".$row2['opis']."'></td>";
						echo "<td><input type='text' name='statusAktivnosti' value='".$row2['status']."'></td>";
						
						echo "<td><div class='text-center'>";
						echo "<button name='uredi2' class='btn btn-warning' onclick='return confirm(`Sigurno?`)' value='".$row2["idAktivnosti"]."'>Ažuriraj</button>";
						echo "</div></td>";
						echo "</tr>";
						echo "</tbody>";
						echo "</form>";
					}
				echo "</table>";
				}
			}
		?>
	<a href="menadzerlogin.php">Povratak nazad</a>
	</div>
</body>
</html>