<?php
	//Ejercicio 1
		echo "<h2>Ejercicio 1</h2><br><br>";
		$colores = array(
			"Colores fuertes" => array ("rojo"=>"FF0000","verde"=>"00FF00","azul"=>"0000FF"),
			"Colores suaves" => array ("rosa"=>"FE9ABC","amarillo"=>"FDF189","malva"=>"BC8F8F")
		);
		echo "<table>";

		foreach ($colores as $tipo => $color) {
			echo "<tr><td>$tipo:</td>";
			foreach ($color as $nombre => $codigo) {
				echo "<td bgcolor=\"$codigo\">$nombre $codigo</td>";
			}
		}

		echo "</tr></table>";
?>