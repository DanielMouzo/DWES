<?php
session_start();
$db = mysqli_connect('localhost','root','1234','mysitedb') or die ('Fail');
?>
<html>
<head>
	<style>
		body{
		        font-family: Arial, sans-serif;
		}

		img{
			max-witdth:100px;
			height:auto;
			transition: opacity 0.9s ease-in-out;
		}

		div{
			margin-bottom: 20px;
		}

		div:hover img{
			opacity: 0.7;
		}

		div:hover{
			background-color: #f0f0f0;
		}
	</style>
</head>
<body>

<h1>Conexión establecida</h1>

<?php

// Verificar si el usuario esta logueado
if (!empty($_SESSION['user_id'])) {
	echo "<p>Bienvenido, Usuario. <a href='logout.php'>Cerrar sesión</a></p>";
} else {
	echo "<p><a href='login.html'>Iniciar sesión</a></p>";
}



//Lanzar una query
$query = 'SELECT * FROM tPeliculas';
$result = mysqli_query($db, $query) or die('Query error');

//Recorrer el resultado
while ($row = mysqli_fetch_array($result)){
	echo '<div>';
	echo '<img src="' . $row['url_imagen'] . '" alta="Imagen">';
	echo '<p>Nombre: ' . $row['nombre'] . '</p>';
	echo '<p>Actor: ' . $row['actores'] . '</p>';
	echo '<p>Sipnosis: ' . $row['sipnosis'] . '</p>';
	echo '<a href="detail.php?pelicula_id=' . $row['id'] . '">Detalles</a>';
	echo '</div>';
}

mysqli_close($db);
?>
</body>
</html>
