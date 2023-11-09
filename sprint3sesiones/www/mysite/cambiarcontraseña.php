<?php
session_start();
$db = mysqli_connect('localhost', 'root', '1234', 'mysitedb') or die('Fail');

// Verificar si el usuario esta logueado
if (empty($_SESSION['user_id'])) {
	header('Location: login.html');
	exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$old_password = $_POST['old_password'];
	$new_password = $_POST['new_password'];
	$confirm_password = $_POST['confirm_password'];
	$user_id = $_SESSION['user_id'];

	// Verificar la contraseña anterior
	$query_old_password = "SELECT contraseña FROM tUsuarios WHERE id = ?";
	$stmt_old_password = mysqli_prepare($db, $query_old_password);
	mysqli_stmt_bind_param($stmt_old_password, "i", $user_id);
	mysqli_stmt_execute($stmt_old_password);
	$result_old_password = mysqli_stmt_get_result($stmt_old_password);
	$row_old_password = mysqli_fetch_assoc($result_old_password);

	if (!password_verify($old_password, $row_old_password['contraseña'])) {
		echo "Error: Contraseña anterior incorrecta.";
		exit();
	}

	// Verificar que la nueva contraseña y la  confirmacion coincidan
	if ($new_password !== $confirm_password) {
		echo "Error: La nueva contraseña y la confirmacion no coinciden.";
		exit();
	}

	// Hash de la nueva contraseña
	$hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

	// Actualizar la contraseña en la base de datos
	$query_update_password = "UPDATE tUsuarios SET contraseña = ? WHERE id = ?";
	$stmt_update_password = mysqli_prepare($db, $query_update_password);
	mysqli_stmt_bind_param($stmt_update_password, "si", $hashed_password, $user_id);
	mysqli_stmt_execute($stmt_update_password);

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
		var old_password = document.getElementsByName("old_password")[0].value;
		var new_password = document.getElementsByName("new_password")[0].value;
		var confirm_password = document.getElementsByName("cofirm_password")[0].value;

		if (old_password === "" || new_password === "" || confirm_password === "") {
			alert("Por favor, complete el campo de nueva contraseña");
			return false;
		}
		
		if (new_password !== confirm_password) {
			alert("La nueva contraseña y la confirmacion no coinciden");
			return false;
	  	}
	}
	</script>
</head>
<body>
	<h1>Cambiar Contraseña</h1>
	<form action="cambiarcontraseña.php" method="post" onsubmit="return validarFormulario()">
		<label for="old_password">Contraseña Actual:</label>
		<input name="old_password" type="password" required>
		<br>
		<label for="new_password">Nueva Contraseña:</label>
		<input name="new_password" type="password" required>
		<br>
		<label for="confirm_password">Confirmar Nueva Contraseña:</label>
		<input name="confirm_password" type="password" required>
		<br>
		<input type="submit" value="Cambiar Contraseña">
	</form>
</body>
</html>
