<?php 
	include 'konekcija.php';
	session_start();

	if (isset($_POST['izmeni'])) {
		$id = $_POST['izmeni'];
		$noviId = $_POST['idNaloga'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$email = $_POST['email'];
		$uloga = $_POST['uloga'];
		
		$conn = OpenCon();
		$sql = "UPDATE nalog SET idNaloga = '$noviId', username = '$username', password = '$password', email = '$email', role = '$uloga' WHERE idNaloga = '$id'";
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
	<link rel="stylesheet" type="text/css" href="css/izmeniOsoba.css">
	
	<title>Ažuriraj osobu</title>
</head>
<body>
	<h1>Ažuriranje osobe</h1>	

	<div class="container-fluid tabela">
			<?php 
				$conn = OpenCon();
				$sql = "SELECT * FROM nalog";
				$result = $conn->query($sql);
				$uloge = ["admin", "Menadžer", "Zaposleni"];
				echo "<table class='table table-striped'> 
				<thead>
					<tr>
						<th>idNaloga</th>
						<th>username</th>
						<th>password</th>
						<th>email</th>
						<th>role</th>
					</tr>
				</thead>";
				if ($result->num_rows > 0) {
					while($red = $result->fetch_assoc()){
						echo "<tbody>";
						echo "<form method='post'>";
						echo "<tr>";
						echo "<td><input type='text' name='idNaloga' value='".$red['idNaloga']."'></td>";
						echo "<td><input type='text' name='username' value='".$red['username']."'></td>";
						echo "<td><input type='text' name='password' value='".$red['password']."'></td>";
						echo "<td><input type='text' name='email' value='".$red['email']."'></td>";
						
						echo '<td><select name="uloga">';
						foreach($uloge as $value) {
							if ($value == $red["role"]) {
								echo "<option value='".$value."'selected>".$value."</option>";	
							}
							else {
								echo "<option value='".$value."'>".$value."</option>";	
							}
						}
    					echo '</select></td>';

						echo "<td><div class='text-center'>";
						echo "<button name='izmeni' class='btn btn-warning' onclick='return confirm(`Sigurno?`)' value='".$red["idNaloga"]."'>Ažuriraj</button>";
						echo "</div></td>";
						echo "</tr>";
						echo "</tbody>";
						echo "</form>";
					}
					echo "</table>";
					
				}
			?>
	<a href="adminlogin.php">Povratak nazad</a>
	</div>
</body>
</html>