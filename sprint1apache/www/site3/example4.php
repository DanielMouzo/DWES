<html>
	<body>
		<h1>Jubilación</h1>
		<?php
			function edad_en_7_años($edad){
				return $edad + 7;
			}

			function mensaje($age){
				if(edad_en_7_años($age) > 65){
					return "En 7  años tendras edad de jubilación";
				}else{
					return "¡Disfruta de tu tiempo!";
				}
			   }
			?>

			<table>
				<tr>
				     <th>Edad</th>
				     <th>Info</th>
				</tr>
				<?php
				$lista = array(58,59,60,61,62);
				foreach ($lista as $valor){
					echo "<tr>";
					echo "<td>".$valor."</td>";
					echo "<td>".mensaje($valor)."</td>";
					echo "</tr>";
				}
				?>
				</table>
	</body>
</html>
