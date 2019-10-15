<?php 
	//Ejercicio 3


/*	-asort: Ordena un array y mantiene la asociación de índices

	-arsort: Ordena un array en orden inverso y mantiene la asociación de índices

	-ksort: Ordena un array por clave en orden inverso

	-sort: Ordena un array

	-rsort: Ordena un array en orden inverso

*/

	echo "<h2>Ejercicio 3 </h2>";
	$pila = array("cinco" => 5, "uno" => 1, "cuatro" => 4, "dos" => 2, "tres" => 3 );


	echo "<h3>asort</h3>";	
	asort($pila);
	foreach ($pila as $letra => $numero) {
		echo "$letra = $numero <br>";
	}

	echo "<hr>";

	echo "<h3>arsort</h3>";
	arsort($pila);
	foreach ($pila as $letra => $numero) {
		echo "$letra = $numero <br>";
	}

	echo "<hr>";

	echo "<h3>ksort</h3>";
	ksort($pila);
	foreach ($pila as $letra => $numero) {
		echo "$letra = $numero <br>";
	}

	echo "<hr>";

	echo "<h3>sort</h3>";
	sort($pila);
	foreach ($pila as $letra => $numero) {
		echo "$letra = $numero <br>";
	}

	echo "<hr>";

	echo "<h3>rsort</h3>";
	rsort($pila);
	foreach ($pila as $letra => $numero) {
		echo "$letra = $numero <br>";
	}
?>