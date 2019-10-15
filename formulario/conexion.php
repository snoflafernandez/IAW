<?php
/*Este es el archivo sobre la conexion con la base de datos utilizando PDO*/
try {
	$formulario = new PDO('mysql:host=localhost;dbname=formulario', 'formulario', 'formulario');
	echo "correcto";
} catch (Exception $e) {
	echo "<h2>La pagina a la que estas intentando acceder no está disponible.";
}
	
?>