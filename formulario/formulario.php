<?php
	//Ejercicio formulario con en PHP (nombre, DNI, direccion, telefono
	//e-mail,fecha de nacimiento)
	include 'conexion.php';
	echo "<h2>Formulario de presentacion</h2>";
	echo "
		<form action=\"formulario.php\" method=\"post\" enctype=\"multipart/form-data\">

			<label><strong>Nombre: </strong></label><br>
			<input type=\"text\" name=\"valores[nombre]\"><br><br>

			<label><strong>DNI: </strong></label><br>
			<input type=\"text\" name=\"valores[dni]\"><br><br>

			<label><strong>Telefono: </strong></label><br>
			<input type=\"number\" name=\"valores[telefono]\"><br><br>

			<label><strong>Direccion: </strong></label><br>
			<input type=\"text\" name=\"valores[direccion]\"><br><br>

			<label><strong>E-mail: </strong></label><br>
			<input type=\"text\" name=\"valores[e-mail]\"><br><br>

			<label><strong>Fecha de nacimiento: </strong></label><br>
			<input type=\"date\" name=\"valores[fecha de nacimiento]\"><br><br>

			<input type=\"file\" name=\"foto\"><br><br>

			<input type=\"submit\" name=\"enviar\">
		</form>	
	";

	foreach ($_POST as $valores => $relleno) {
		if (is_array($relleno)) {
			foreach ($relleno as $corchete => $respuesta) {
				if ($respuesta==null || $respuesta==' ') { 
					/*Si el campo esta vacio o se responde con un espacio devuelve el error*/
					echo " &nbsp;&nbsp;&nbsp;&nbsp;·El campo: <strong>$corchete</strong> no debe estar vacio.<br>";
				}
			}
			echo "<br>";
			if ($relleno['nombre']==is_numeric($relleno['nombre'])) {
				/*Si el campo es numerico devuelve el siguiente error*/
				echo " &nbsp;&nbsp;&nbsp;&nbsp;·El campo: <strong>Nombre</strong> no debe ser un numero.<br>";
			}
			if (strlen($relleno['dni']) != '9' || !is_numeric(substr($relleno['dni'], 0, 8)) || is_numeric(substr(trim($relleno['dni']), -1))) {
				/*Si el campo es: distinto de 9 caracteres || los primeros 8 son numeros || el ultimo es una letra y no vale un espacio*/
				echo " &nbsp;&nbsp;&nbsp;&nbsp;·El campo: <strong>DNI</strong> debe tener ocho numeros y una letra.<br>";
			}
			if (strlen($relleno['telefono']) != '9' || !is_numeric($relleno['telefono'])) {
				/*Si el telefono tiene un numero de caracteres distinto de 9 || si esos 9 caracteres no son numeros*/
				echo " &nbsp;&nbsp;&nbsp;&nbsp;·El campo: <strong>Telefono</strong> tiene un formato incorrecto.<br>";
			}
			if (filter_var($relleno['e-mail'], FILTER_VALIDATE_EMAIL) == FALSE) {
				/*funcion que valida email*/
				echo " &nbsp;&nbsp;&nbsp;&nbsp;·El campo: <strong>direccion de correo</strong> tiene un formato incorrecto.<br>";
			}
//ARREGLAR MAÑANA: ESTE ELSE SOLO ACTUA SI SE ESCRIBE MAL EL E-MAIL.
//HAY QUE CONSEGUIR METERLO TODO EN UN IF DE MANERA QUE CON UN BOOLEANO
//SI DEVUELVE TRUE SE EJECUTE EL ELSE Y SI DEVUELVE FALSE QUE SE EJECUTEN LOS 
//MENSAJES DE ERROR (de manera similar a como comprueba si hay fallo en INSERT INTO)
			else{

				$nombre=$relleno['nombre'];
				$dni=$relleno['dni'];
				$telefono=$relleno['telefono'];
				$direccion=$relleno['direccion'];
				$email=$relleno['e-mail'];
				$fecha_nacimiento=$relleno['fecha de nacimiento'];

				$correcto = true;
				$formulario->beginTransaction();
			
				$sql = "INSERT INTO formulario (nombre,dni,telefono,direccion,email,fecha_nacimiento) values ('$nombre','$dni', '$telefono', '$direccion','$email','$fecha_nacimiento')";

				if ($formulario->exec($sql) == 0) $correcto = false;

				if ($correcto == true) {
					$formulario->commit();
					echo "<strong>Los campos se han añadido correctamente</strong><br>";
				}
				else{
					$formulario->rollback();
					echo "No se han añadido a la base de datos";
				}
			}
		}	
	}
	if(isset($_POST['enviar'])){
		$foto = $_FILES["foto"];	
		$nombreImagen = $foto['name'];
		$ruta = "imagenes/" .$nombreImagen;
		$temporal = $foto["tmp_name"];
		
		if (move_uploaded_file($temporal,$ruta)){
			echo "Imagen insertada<br>";
		}
	}
?>