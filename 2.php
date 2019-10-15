<?php
	//Ejercicio 2
		echo "<h2>Ejercicio 2</h2><br><br>";
		$colores = array(
			"Colores fuertes" => array ("rojo"=>"FF0000","verde"=>"00FF00","azul"=>"0000FF"),
			"Colores suaves" => array ("rosa"=>"FE9ABC","amarillo"=>"FDF189","malva"=>"BC8F8F")
		);
		echo "</br><form action=\"2.php\" method=\"post\">
			Codigo color <input type=\"text\" name=\"code\" value=\"0\"><input type=\"submit\" value=\"aceptar\">
		</form>";

	$code=$_POST["code"];
	foreach ($colores as $tipo => $color) {
		if (in_array($code, $color)) {
			echo "El color esta en el array";
		}
	}
?>