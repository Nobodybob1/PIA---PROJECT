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
 	<link rel="stylesheet" type="text/css" href="css/zaposlenilogin.css">
	<title>Zaposleni</title>
</head>
<body>
	<h1>Zaposleni strana!</h1>
	<input id="searchbar" onkeyup="searchBar()" type="text" name="search" placeholder="Pretraži...">
	<div class="cards">
		<?php
			$conn = OpenCon();
			$sql = "SELECT * FROM projekti";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					echo '<div class="card">
						<div class="card-title">'. $row["naziv"] . '</div>';

						$id = $row["idProjekta"];
						$sql2 = "SELECT * FROM aktivnosti WHERE aktivnosti.idProjekta = $id";
						$result2 = $conn->query($sql2);
						if ($result2->num_rows > 0) {
							while($row2 = $result2->fetch_assoc()) {
								$sql3 = "SELECT * FROM delegiranje";
								$result3 = $conn->query($sql3);
								if ($result3->num_rows > 0) {
									while($row3 = $result3->fetch_assoc()) {
										if ($row3["idOsobe"] == $_SESSION['korisnik'] && $row3["idAktivnosti"] == $row2["idAktivnosti"]) {
											echo '
												<div class="card-activity">'. $row2["naziv"] . '<button onclick="window.location.href=\'komentar.php?t='.$row2["idAktivnosti"].'\'" class="dugmeDodaj">+ Dodaj komentar</button></div>';
										}
									}
								}
								 
							}
							echo '<div>
									<button onclick="window.location.href=\'statusAktivnosti.php?x='.$row["idProjekta"].'\'" class="dugme">~ Promeni status aktivnosti</button>
								</div>';
						}
						echo "</div>";
				}
			}
		?>
	</div>
	<div class="container-fluid">
		<button onclick="logout()" type="button" class="btn-danger btn">Odjavi se</button>
	</div>
<script src="javascript/zaposlenilogin.js"></script>
</body>
</html>