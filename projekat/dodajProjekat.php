<?php 
	include 'konekcija.php';
	session_start();

	if (isset($_POST["dodaj"])) {
			$naziv = $_POST['naziv'];
			$lokacija = $_POST['lokacija'];
			$sprema = $_POST['sprema'];
			$opis = $_POST['opis'];
			$benefiti = $_POST['benefiti'];
			$rok = $_POST['rok_konkursa'];
			$status = $_POST['status'];

			if($naziv == "" || $lokacija == "" || $sprema == "" || $opis == "" || $benefiti == "" || $rok == "" || $status == "") {
				echo "<script>alert('Molim popunite sva polja')</script>";
			}
			else {
				$conn = OpenCon();
				$sql = "INSERT INTO projekti (idProjekta, naziv, lokacija, sprema, opis, benefiti, rok_konkursa, status) VALUES ('', '$naziv', '$lokacija', '$sprema', '$opis', '$benefiti', '$rok', '$status')";
				if($conn->query($sql)) {
					echo "<script>alert('Projekat uspešno unet!');</script>";
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
  	<link rel="stylesheet" type="text/css" href="css/dodajProjekat.css">
  	<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
	<title>Dodavanje projekta</title>
</head>
<body>
	<h1>Dodavanje Projekta</h1>
	<div class="container-fluid text-center">
		<form method="post">
			<input type="text" name="naziv" placeholder="Naziv"><br>
			<input type="text" name="lokacija" placeholder="Lokacija"><br>
			<input type="text" name="sprema" placeholder="Školska sprema"><br>
			<input type="text" name="opis" placeholder="Opis posla"><br>
			<input type="text" name="benefiti" placeholder="benefiti"><br>
			<input type="text" name="rok_konkursa" placeholder="Rok konkursa"><br>
			<input type="text" name="status" placeholder="Status"><br>
			<button name="dodaj" class="btn btn-primary">Dodaj projekat!</button>
			<a href="menadzerlogin.php">Vrati se nazad</a>
		</form>
	</div>
</body>
</html>