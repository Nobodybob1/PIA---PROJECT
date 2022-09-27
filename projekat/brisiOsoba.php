<?php 
	include 'konekcija.php';
	session_start();

	if (isset($_POST["brisi"])){
		while(true){
			$id = $_POST["id"];
			if($id == "") {
				echo "<script>alert('Molim unesite željeni id')</script>";
				break;
			}
			else {
				$conn = OpenCon();
				$sql = "DELETE FROM nalog WHERE nalog.idNaloga = $id";
				if ($conn->query($sql)) {
					echo "<script>alert('Osoba obrisana')</script";
				}
				$conn->close();
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
  	<link rel="stylesheet" type="text/css" href="css/brisiOsoba.css">
	<title>Brisanje</title>
</head>
<body>
	<h1>Brisanje osobe</h1>
	<div class="container-fluid text-center">
		<form method="post" name="brisanje">
			<label name="brisanje">id osobe za brisanje:</label>
			<input type="number" name="id">
			<button name="brisi" class="btn btn-danger">Briši</button>
		</form>
		<a href="adminlogin.php">Vrati se nazad</a>
	</div>
</body>
</html>