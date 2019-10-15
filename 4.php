<?php
	//Ejercicio 4
error_reporting(0);
	echo "<h2>Puede sumar los siguientes numeros</h2>";
	echo"<form action=\"4.php\" method=\"post\">
		1: <input type=\"number\" name=\"1\"><br><br>
		2: <input type=\"number\" name=\"2\"><br><br>
		3: <input type=\"number\" name=\"3\"><br><br>
		4: <input type=\"number\" name=\"4\"><br><br>
		5: <input type=\"number\" name=\"5\"><br><br>
		6: <input type=\"number\" name=\"6\"><br><br>
		7: <input type=\"number\" name=\"7\"><br><br>
		8: <input type=\"number\" name=\"8\"><br><br>
		<input type=\"submit\" name=\"submit\">
	</form>";
	$numero1=$_POST["1"];
	$numero2=$_POST["2"];
	$numero3=$_POST["3"];
	$numero4=$_POST["4"];
	$numero5=$_POST["5"];
	$numero6=$_POST["6"];
	$numero7=$_POST["7"];
	$numero8=$_POST["8"];

	if ($numero1==null || $numero2==null || $numero3==null || $numero4==null || $numero5==null || $numero6==null || $numero7==null || $numero8==null ) {
		echo "<strong>No puede haber campos vacios</strong>";
	}
	else {
		$total=$numero1 + $numero2 + $numero3 + $numero4 + $numero5 + $numero6 + $numero7 + $numero8; 
		echo "<strong>La suma total es: $total</strong>";
	}
?>