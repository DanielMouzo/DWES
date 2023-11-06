<?php
$db = mysqli_connect('localhost', 'root', '1234', 'mysitedb') or die('Error de conexion');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	// Recibir datos del formulario
	$email = $_POST['email'];
	$password = $_POST['password'];
	$confirm_password = $_POST['confirm_password'];

	// Verificar si el correo ya existe
	$query = "SELECT * FROM tUsuarios WHERE email=?";
	$stmt = mysqli_prepare($db, $query);
	mysqli_stmt_bind_param($stmt, "s", $email);
	mysqli_stmt_execute($stmt);
	$result = mysqli_stmt_get_result($stmt);

	if (mysqli_num_rows($result) > 0) {
		echo "Error: El correo electronico ya esta registrado.";
	} elseif (empty($email) || empty($password) || empty($confirm_password)) {
		echo "Error: Todos los campos son obligatorios.";
	} elseif ($password !== $confirm_password) {
		echo "Error: La contraseñas no coinciden.";
	} else {
		// Cifrar la contraseña
		$hashed_password = password_hash($password, PASSWORD_DEFAULT);
	
		// Insertar usuario en la base de datos
		$insert_query = "INSERT INTO tUsuarios (nombre, apellidos, email, contraseña) VALUES (?, ?, ?, ?)";
		$stmt_insert = mysqli_prepare($db, $insert_query);
		mysqli_stmt_bind_param($stmt_insert, "ssss", $nombre, $apellidos, $email, $hashed_password);


		$nombre = "NombreEjemplo";
		$apellidos = "ApellidosEjemplo";

		mysqli_stmt_execute($stmt_insert);
		echo "Registro existoso. Redireccionando a la pagina  principal...";
		header("refresh:3;url=index.php"); // Redirigir despues de 3 segundos
		exit();
}
}
?>
