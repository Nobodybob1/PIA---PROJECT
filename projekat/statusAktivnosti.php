<?php 
	include 'konekcija.php';
	session_start();	

	if (isset($_POST["izmena"])) {
		$id = $_POST['izmena'];
		$status = $_POST['izmeniStatus'];
		
		$conn = OpenCon();
		$sql = "UPDATE aktivnosti SET status = '$status' WHERE idAktivnosti = '$id'";
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
	<link rel="stylesheet" type="text/css" href="css/statusAktivnosti.css">
	<title>Promena statusa aktivnosti</title>
</head>
<body>
	<h1>Izmeni status aktivnosti</h1>
	<?php 
		$conn = OpenCon();
		$idProjekta = $_GET['x'];
		$sql = "SELECT * FROM aktivnosti WHERE aktivnosti.idProjekta = '$idProjekta'";
		$result = $conn->query($sql);
		echo '<div class="container aktivnosti">';
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()){
				echo '<div class="aktivnost">
					'.$row["opis"] .' - STATUS: '.$row["status"];
				echo '</div>'; 
				echo "<form method='post'>";
				echo "<input type='text' name='izmeniStatus'>
					<button class='btn btn-warning' name='izmena' value='".$row["idAktivnosti"]."'>Izmeni</button>";
				echo "</form>";
			}
			echo "<a href='zaposlenilogin.php'>Vrati se nazad</a>";
			echo '</div>';
		}
		$conn->close();
	?>

</body>
</html>