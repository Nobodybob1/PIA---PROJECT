<?php
	include 'konekcija.php';
	session_start();

	$conn = OpenCon();
	if (isset($_POST["comment"])) {
		$idAktivnosti = $_GET["t"];
		$komentar = $_POST["komentar"];

		$conn = OpenCon();
		$sql = "INSERT INTO komentari (idKomentara, idAktivnosti, komentar) VALUES ('', $idAktivnosti, '$komentar')";
		$conn->query($sql);
		$conn->close();
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1"><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  	<link rel="stylesheet" type="text/css" href="css/komentar.css">
	<title>Komentar</title>
</head>
<body>
	<div class="container">
		<h1>Komentari</h1>
		<?php
			$conn = OpenCon(); 
			$idAktivnosti = $_GET["t"];
			$sql = "SELECT * FROM aktivnosti WHERE idAktivnosti = '$idAktivnosti'";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					echo '<div class="aktivnost">
					'.$row["opis"].'</div>';
					echo '<form method="post">
								komentar: <input name="komentar" type="text" placeholder="Komentariši">
								<button name="comment" class="btn">komentariši</button>
							</form>';
				}
			}
			$conn->close();
		?>

		<div class="komentari">
			<?php 
				$conn = OpenCon();
				$idAktivnosti = $_GET["t"];
				$sql = "SELECT * FROM komentari WHERE idAktivnosti = '$idAktivnosti'";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
						$idKomentara = $row["idKomentara"];
						echo '<div class="single-comment">
							'.$row["komentar"].'</div>';

						$sql2 = "SELECT * FROM odgovori WHERE idKomentara = $idKomentara";
						$result2 = $conn->query($sql2); 
						if ($result2->num_rows > 0) {
							while($row2 = $result2->fetch_assoc()) {
								echo '<div class="odgovori text-center">
									'.$row2["komentar"].'</div>';
							}
						}
					}
				}
				
				$conn->close();
				if (isset($_POST["comment"])) {
					header("Location: zaposlenilogin.php");
				}
			?>
		</div>
	</div>
</body>
</html>