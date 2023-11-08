<?php
	session_start();
	$db = mysqli_connect('localhost', 'root', '1234', 'mysitedb') or die('Fail');
?>

<html>
<body>>

<?php

	// Verificar si el usuario esta logueado
	if (!empty($_SESSION['user_id'])) {
		echo "<p>Bienvenido, Usuario. <a href='logout.php'>Cerrar sesion</a></p>";
	} else {
		echo "<p><a href='login.html'>Iniciar sesión</a></p>";
	}

	if (!isset($_GET['pelicula_id'])) {
		die('No se ha especificado una canción');
	}

	$pelicula_id = $_GET['pelicula_id'];
	$query = 'SELECT * FROM tPeliculas WHERE id='.$pelicula_id;
	$result = mysqli_query($db, $query) or die ('Query error');
	$only_row = mysqli_fetch_array($result);
	echo '<img src="' . $only_row['url_imagen'] . '" alta="Imagen">';
	echo '<h1>'.$only_row['nombre'].'</h1>';
	echo '<h2>'.$only_row['actores'].'</h2>';
	echo '<p>'.$only_row['sipnosis'].'</p>';
?>
<h3>Comentarios:</h3>
<ul>
<?php

	$query2 = 'SELECT * FROM tComentarios WHERE pelicula_id='.$pelicula_id;
	$result2 = mysqli_query($db, $query2) or die('Query error');
	while ($row = mysqli_fetch_array($result2)) {
		echo '<li>'.$row['comentario'].' - '.$row['fecha_comentario'].'</li>';
	}

	mysqli_close($db);
?>
<p>Deja un nuevo comentario:</p>
<form action="/comment.php" method="post">
	<textarea rows="4" cols="50" name="new_comment"></textarea><br>
	<input type="hidden" name="pelicula_id" value="<?php echo $pelicula_id; ?>">
	<input type="submit" value="Comentar">
</form>
</ul>
</body>
</html>
