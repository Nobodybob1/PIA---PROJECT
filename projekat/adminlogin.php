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
	<link href="css/adminlogin.css" rel="stylesheet" type="text/css">
	
  	
	<title>Admin</title>
</head>
<body>
	<h1>ADMIN STRANA!</h1>
	
	<div class="container-fluid tabela">
			<?php 
				$conn = OpenCon();
				$sql = "SELECT * FROM nalog";
				$result = $conn->query($sql);
				echo "<table class='table table-striped'> 
				<thead>
					<tr>
						<th>idNaloga</th>
						<th>username</th>
						<th>password</th>
						<th>email</th>
						<th>role</th>
					</tr>
				</thead>
				<tbody>";
				if ($result->num_rows > 0) {
					while($red = $result->fetch_assoc()){
						echo "<tr>";
						echo "<td>".$red['idNaloga']."</td>";
						echo "<td>".$red['username']."</td>";
						echo "<td>".$red['password']."</td>";
						echo "<td>".$red['email']."</td>";
						echo "<td>".$red['role']."</td>";
						echo "</tr>";
						echo "</tbody>";
					}
					echo "</table>";
				}
			?>
	</div>

<div class="container-fluid">
	<form method="post" class="form">
		<button onclick="logout()" type="button" class="btn btn-danger logout">Odjavi se</button>
	</form>
</div>

<div class="container-fluid dugmad">
	<div class="col-md-4 text-center">
		<form method="post" class="dodaj">
			<button onclick="add()" type="button" class="btn btn-info add">Dodaj novu osobu</button>
		</form>
	</div>
	<div class="col-md-4 text-center">
		<form method="post" class="izmeni">
			<button onclick="izmeni()" type="button" class="btn btn-warning change">Ažuriraj osobu</button>
		</form>
	</div>
	<div class="col-md-4 text-center">
		<form method="post" class="delete">
			<button onclick="deleting()" type="button" class="btn btn-light delete">Izbriši osobu</button>
		</form>
	</div>
</div>

<script src="javascript/adminlogin.js"></script>
</body>
</html>