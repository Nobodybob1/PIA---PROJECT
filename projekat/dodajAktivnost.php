<?php 
	include 'konekcija.php';
	session_start();

	if (isset($_POST['dodaj'])) {
			$idAktivnosti = $_POST['idAktivnosti'];
			$idProjekta = $_POST['idProjekta'];
			$naziv = $_POST['naziv'];
			$opis = $_POST['opis'];
			$status = $_POST['status'];

			if($idAktivnosti == "" || $idProjekta == "" || $naziv == "" || $opis == "" || $status == "") {
				echo "<script>alert('Molim popunite sva polja')</script>";
			}
			else {
				$conn = OpenCon();
				$sql = "INSERT INTO aktivnosti (idAktivnosti, idProjekta, naziv, opis, status) VALUES ('$idAktivnosti', '$idProjekta', '$naziv', '$opis', '$status')";
				if($conn->query($sql)) {
					echo "<script>alert('Aktivnost uneta!');</script>";
				}
				closeCon($conn);
			}
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
  	<link rel="stylesheet" type="text/css" href="css/dodajAktivnost.css">
  	<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
	<title>Dodaj Aktivnost</title>
</head>
<body>
	<h1>Dodaj Aktivnost</h1>
	<div class="container-fluid text-center">
		<form method="post">
			<input type="number" name="idAktivnosti" placeholder="idAktivnosti"><br>
			<input type="number" name="idProjekta" placeholder="idProjekta"><br>
			<input type="text" name="naziv" placeholder="Naziv"><br>
			<input type="text" name="opis" placeholder="Opis Aktivnosti"><br>
			<input type="text" name="status" placeholder="Status"><br>
			<button name="dodaj" class="btn btn-primary">Dodaj Aktivnost!</button>
			<a href="menadzerlogin.php">Vrati se nazad</a>
		</form>
	</div>
</body>
</html>