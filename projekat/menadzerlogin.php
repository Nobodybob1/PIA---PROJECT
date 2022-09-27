<?php 
	include 'konekcija.php';
	session_start();

	if (!empty($_GET['x'])) {
		$idProjekta = $_GET['x'];
		$conn = OpenCon();

		$sql = "DELETE FROM aktivnosti WHERE aktivnosti.idProjekta = $idProjekta";
		$conn->query($sql);

		$sql = "DELETE FROM projekti WHERE projekti.idProjekta = $idProjekta";
		$conn->query($sql);
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
	<link rel="stylesheet" type="text/css" href="css/menadzerlogin.css">
	<title>Menadžer</title>
</head>
<body>
	<h1>Menadžer strana!</h1>
	<div class="cards">
		<?php
			$conn = OpenCon();
			$sql = "SELECT * FROM projekti";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					echo '<div class="card">
						<div class="card-title">'. $row["naziv"]. ' ' .$row["idProjekta"].' </div>';

						$id = $row["idProjekta"];
						$sql = "SELECT * FROM aktivnosti WHERE aktivnosti.idProjekta = $id";
						$result2 = $conn->query($sql);
						if ($result2->num_rows > 0) {
							while($row2 = $result2->fetch_assoc()) {
								echo '
								<div class="card-activity">'. $row2["naziv"] . '<button onclick="window.location.href=\'odgovori.php?x='.$row2["idAktivnosti"].'\'" class="dugmeDodaj">~ Aktivnosti i komentari</button></div>'; 
							}
							
						}
						echo '<div class="text-center ukloni">
							  	<button name="brisi" class="btn btn-info" onclick="window.location.href=\'menadzerlogin.php?x='.$row["idProjekta"].'\'; confirm(`Sigurno?`)">X Ukloni projekat</button>
							  </div>';
					echo "</div>";
				}
			}
			$conn->close();
		?>

		<button onclick="window.open('dodajProjekat.php', '_self')" class="btn add-btn">+Dodaj projekat</button>
	</div>
	<div class="container-fluid btn-wrap">
		<div class="col-md-3">
			<button onclick="window.open('delegiranje.php', '_self')" type="button" class="btn-warning btn">Delegiraj</button>
		</div>
		<div class="col-md-3">
			<button onclick="window.open('urediprojekat.php', '_self')" type="button" class="btn btn-primary">~ Uredi projekte</button>
		</div>
		<div class="col-md-3">
			<button onclick="window.open('dodajAktivnost.php', '_self')" type="button" class="btn btn-success">Dodaj aktivnost</button>
		</div>
		<div class="col-md-3">
			<button onclick="window.open('login.php', '_self')" type="button" class="btn-danger btn">Odjavi se</button>
		</div>
	</div>
</body>
</html>