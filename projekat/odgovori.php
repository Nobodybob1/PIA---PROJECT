<?php
	include 'konekcija.php';
	session_start();

	
	if (isset($_POST["odgovor"])) {
		$odgovor = $_POST['odgovori'];
		$idKomentara = $_POST['odgovor'];

		$conn = OpenCon();
		$sql = "INSERT INTO odgovori (komentar, idOdgovora, idKomentara) VALUES ('$odgovor', '', $idKomentara)";
		$conn->query($sql);
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
  	<link rel="stylesheet" type="text/css" href="css/odgovori.css">
	<title>Komentari</title>
</head>
<body>
	<h1>Komentari</h1>
	<div class="container-fluid">
		<?php 
		$conn = OpenCon();
		$idAktivnosti = $_GET['x'];
		$sql = "SELECT * FROM komentari WHERE idAktivnosti = '$idAktivnosti'";
		$result = $conn->query($sql);
		echo '<div class="komentari">';
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$idKomentara = $row['idKomentara'];
				echo '<div class="komentar text-center">
						'.$row["komentar"];
				
				$sql2 = "SELECT * FROM odgovori WHERE idKomentara = $idKomentara";
				$result2 = $conn->query($sql2); 
				if ($result2->num_rows > 0) {
					while($row2 = $result2->fetch_assoc()) {
						echo '<div class="odgovori text-center">
							'.$row2["komentar"].'</div>';
					}
				}
				
				echo '<form method="post">
						<input name="odgovori" placeholder="Odgovori"><button name="odgovor" class="btn" value="'.$row["idKomentara"].'">Odgovori</button>
					  </form></div>';
			}
		}
		echo '</div>';
		$conn->close();
		if (isset($_POST["odgovori"])) {
			header("Location: menadzerlogin.php");
		}
	?>
	</div>
</body>
</html>