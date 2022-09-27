<?php 
	include 'konekcija.php';
	session_start();

	if (isset($_POST['registracija'])) {
		$kor_ime = $_POST['korisnicko_ime'];
		$email = $_POST['email'];
		$lozinka = $_POST['lozinka'];
		$lozinka_opet = $_POST['lozinka_opet'];
		$uloga = $_POST['uloga'];
		$val = 0;
		if ($kor_ime != "" && $email != "" && $lozinka != "" && $lozinka_opet == $lozinka) {
			if ($uloga == "Zaposleni" || $uloga == "Menadžer") {
				$val = 1;
				$conn = OpenCon();
				$sql = "INSERT INTO nalog (idNaloga, username, password, email, role) VALUES ('', '$kor_ime', '$lozinka', '$email', '$uloga')";
				if ($conn->query($sql)) {
					echo "<script>alert('Registrovali ste se!');</script>";
					if ($uloga == "Zaposleni") {
						echo "<script>window.open('zaposlenilogin.php', '_self');</script>";
					}
					if ($uloga == "Menadžer") {
						echo "<script>window.open('menadzerlogin.php', '_self');</script>";
					}
				}
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
  	<link rel="stylesheet" type="text/css" href="css/register.css">
	<title>Registruj se</title>
</head>
<body>

<div class="register-page">
  	<div class="form">
    	<form class="register-form" method="post">
    		<h3>Registracija:</h3>
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
			<button type="submit" name="registracija" class="btn btn-primary">Registruj se!</button>
    	</form>
  	</div>
	</div>

<script src="javascript/validation.js"></script>
</body>
</html>