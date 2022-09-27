<?php 
	include 'konekcija.php';
	session_start();

	if (isset($_POST['unos'])) {
		while (true) {
			$kor_ime = $_POST['korisnicko_ime'];
			$sifra = $_POST['lozinka'];
			$email = $_POST['email'];
			$uloga = $_POST['uloga'];
			if ($kor_ime == "" || $sifra == "" || $email == "" || $uloga == "") {
				echo "<script>alert('Molim popunite sva polja')</script>";
				break;
			} 
			else {
				$conn = OpenCon();
				$sql = "INSERT INTO nalog (idNaloga, username, password, email, role) VALUES ('', '$kor_ime', '$sifra', '$email', '$uloga')";
				if($conn->query($sql)) {
					echo "<script>alert('Korisnik uspešno unet!');</script>";
				}
				closeCon($conn);
				break;
			}
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
	<link rel="stylesheet" type="text/css" href="css/novaOsoba.css">
	<title>Dodaj</title>
</head>
<body>
	<h1>Unos nove osobe!</h1>
	<div class="container-fluid text-center">
		<div class="form">
    	<form class="register-form" method="post">
    		<h3>Unesi osobu:</h3>
      		<div>
      			<input id="korisnicko_ime" type="text" name="korisnicko_ime" placeholder="Korisničko ime">
      		</div>
      		<div>
      			<input id="email" type="email" name="email" placeholder="Email">
			</div>
			<div>
				<input id="lozinka" type="password" name="lozinka" placeholder="Šifra">
			</div>
			<div>
				<input id="lozinka_opet" type="password" name="lozinka_opet" placeholder="Ponovi šifru">
			</div>
			<div>
				<input type="" name="uloga" list="uloga" placeholder="Uloga">
				<datalist id="uloga">
					<option value="Zaposleni">Zaposleni</option>
					<option value="Menadžer">Menadžer</option>
				</datalist>
			</div>
			<div class="col-md-7 dugme">
				<button name="unos" class="btn btn-primary">Unesi</button>
			</div>
			<div class="col-md-5">
				<a href="adminlogin.php">Vrati se nazad</a>
			</div>
    	</form>
  		</div>
	</div>
</body>
</html>