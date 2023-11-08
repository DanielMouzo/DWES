<?php
	$db = mysqli_connect('localhost', 'root', '1234', 'mysitedb') or die ('Error de conexion');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$email = $_POST['email'];
	$password = $_POST['password'];

	// Buscar el usuario por correo electronico
	$query = "SELECT * FROM tUsuarios WHERE email=?";
	$stmt = mysqli_prepare($db, $query);
	mysqli_stmt_bind_param($stmt, "s", $email);
	mysqli_stmt_execute($stmt);
	$result = mysqli_stmt_get_result($stmt);

	if (mysqli_num_rows($result) > 0) {
		$row = mysqli_fetch_assoc($result);
		$hashed_password = $row['contraseña'];

	// Verificar la contraseña
	if (password_verify($password, $hashed_password)) {
		session_start();
		$_SESSION['user_id'] = $row['id'];
		echo "Inicio de sesión existoso. Redireccionando a la página  principal...";
		header("refresh:3;url=main.php"); // Redirigir despues de 3 segundos
		exit();
	} else {
		echo "Error: Contraseña incorrecta.";
		}
	} else {
		echo "Error: El correo electronico no existe.";
	}
}

mysqli_close($db);
?>
