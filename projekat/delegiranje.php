<?php 
	include 'konekcija.php';
	session_start();

	if (isset($_POST["delegiranje"])) {
		$conn = OpenCon();
		$idAktivnosti = $_POST["Aktivnost"];
		$idOsobe = $_POST["Zaposleni"];

		$sql = "INSERT INTO delegiranje (idDelegiranja, idOsobe, idAktivnosti) VALUES ('', $idOsobe, $idAktivnosti)";
		if ($conn->query($sql)) {
			echo "<script>alert('Aktivnost dodeljena!')</script>";
			header("Location: menadzerlogin.php");
		}
		else {
			echo "<script>alert('Neuspešno dodeljivanje')</script>";
		}
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
	<link rel="stylesheet" type="text/css" href="css/delegiranje.css">
	<title>Delegiranje</title>
</head>
<body>
	<h1>Delegiranje</h1>
	<div class="container-fluid">
		<div class="form text-center">
			<form class="form-delegiranje" method="post">
				<label for="Aktivnost">Aktivnosti:</label>
				<select id="Aktivnost" name="Aktivnost" class="input">
					<?php 
						$conn = OpenCon();
						$sql = "SELECT * FROM projekti";
						$result = $conn->query($sql);
						if ($result->num_rows > 0) {
							while($row = $result->fetch_assoc()) {
								$sql2 = "SELECT * FROM aktivnosti";
								$result2 = $conn->query($sql2);
								if ($result->num_rows > 0) {
									while($row2 = $result2->fetch_assoc()) {
										if ($row["idProjekta"] == $row2["idProjekta"]) {
											echo '<option value="'.$row2["idAktivnosti"].'">'.$row2["naziv"].' | '.$row["naziv"].'</option>';
										}
									}
								}
								
							}
						}
					?>
				</select>

				<label for="Zaposleni">Zaposleni:</label>
				<select id="Zaposleni" name="Zaposleni" class="input">
					<?php 
						$sql="SELECT * FROM nalog WHERE role = 'Zaposleni'";
						$result = $conn->query($sql);
						if ($result->num_rows > 0) {
							while($row = $result->fetch_assoc()) {
								echo '<option value="'.$row["idNaloga"].'">'.$row["username"].'</option>';
							}
						}
						$conn->close();
					?>
				</select>

				<button name="delegiranje" class="btn btn-warning">Delegiraj</button>
			</form>
		</div>
	</div>
</body>
</html>