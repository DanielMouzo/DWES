<?php
     $db = mysqli_connect('localhost','root','1234','mysitedb') or die ('Fail');
?>
<html>
<head>
	<style>
		img{
			max-witdth:100px;
			height:auto;
		}
	</style>
</head>
<body>

<h1>Conexión establecida</h1>

<?php
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
	echo '<a href="detail.php?id=' . $row['id'] . '">Detalles</a>';
	echo '</div>';
}

mysqli_close($db);
?>
</body>
</html>
