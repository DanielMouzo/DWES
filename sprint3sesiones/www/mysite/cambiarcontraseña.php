<?php
session_start();
$db = mysqli_connect('localhost', 'root', '1234', 'mysitedb') or die('Fail');

// Verificar si el usuario esta logueado
if (empty($_SESSION['user_id'])) {
	header('Location: login.html');
	exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$new_password = $_POST['new_password'];
	$user_id = $_SESSION['user_id'];

	// Hash de la nueva contraseña
	$hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

	// Actualizar la contraseña en la base de datos
	$query = "UPDATE tUsuarios SET contraseña = ? WHERE id = ?";
	$stmt = mysqli_prepare($db, $query);
	mysqli_stmt_bind_param($stmt, "si", $hashed_password, $user_id);
	mysqli_stmt_execute($stmt);

	echo "Contraseña cambiada con exito. Redireccionando a la página principal...";
	header("refresh:3;url=main.php"); //Redirigir despues de 3 segundos
	exit();
}

	mysqli_close($db);
?>

<html>
<head>
	<meta charset="UTF-8">
	<script>
	    function validarFormulario() {
		var new_password = document.getElementsByName("new_password")[0].value;

		if (new_password === "") {
			alert("Por favor, complete el campo de nueva contraseña");
			return false;
		}
	  }
	</script>
</head>
<body>
	<h1>Cambiar Contraseña</h1>
	<form action="cambiarcontraseña.php" method="post" onsubmit="return validarFormulario()">
		<label for="new_password">Nueva Contraseña:</label>
		<input name="new_password" type="password" required>
		<br>
		<input type="submit" value="Cambiar Contraseña">
	</form>
</body>
</html>
