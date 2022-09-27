<?php 
	include 'konekcija.php';
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  	<link rel="stylesheet" type="text/css" href="css/login.css">
	<title>Uloguj se</title>
</head>
<body>
	
	<div class="login-page">
  		<div class="form">
    		<form class="login-form" method="post">
    			<h3>Logovanje:</h3>
      			<input type="text" name="korisnicko_ime" placeholder="Korisničko ime">
			    <input type="password" name="lozinka" placeholder="Šifra">
			    <button name="login" type="submit" class="btn btn-primary">Uloguj se!</button>
      			<p class="message">Nisi registrovan? <a href="register.php">Napravi nalog</a></p>

      			<?php 
      				if (isset($_POST["login"])) {
      					$conn = OpenCon();
      					$sql = "SELECT * FROM nalog";
      					$result = $conn->query($sql);
      					if ($result->num_rows > 0) {
      						while($red = $result->fetch_assoc()) {
      							if ($_POST["korisnicko_ime"] == $red['username'] && $_POST['lozinka'] == $red["password"]) {
      								$_SESSION['korisnik']=$red["idNaloga"];
                            		$_SESSION['uloga']=$red["role"];
                            		if ($_SESSION['uloga'] == "admin") {
                              			echo "<script>window.open('adminlogin.php', '_self');</script>";
                            		}
                            		elseif ($_SESSION['uloga'] == "Menadžer") {
                            			echo "<script>window.open('menadzerlogin.php', '_self');</script>";
                            		}
                            		elseif ($_SESSION['uloga'] == "Zaposleni") {
                            			echo "<script>window.open('zaposlenilogin.php', '_self');</script>";
                            		}
								} 
      						}
      					}
					}
      			?>
    		</form>
  		</div>
	</div>

</body>
</html>