<!DOCTYPE html>
<html>
<head>
	<title>Formulario</title>
	<?php include 'conexion.php'; ?>
</head>
<body>
	<h2>Formulario de presentación</h2>

	<form action="formulario.php" method="post" enctype="multipart/form-data">
		<label><strong>Nombre:</strong></label><br>
		<input type="text" name="nombre"><br><br>

		<label><strong>DNI:</strong></label><br>
		<input type="text" name="dni"><br><br>

		<label><strong>Teléfono:</strong></label><br>
		<input type="number" name="telefono"><br><br>

		<label><strong>Dirección:</strong></label><br>
		<input type="text" name="direccion"><br><br>

		<label><strong>E-Mail:</strong></label><br>
		<input type="text" name="email"><br><br>

		<label><strong>Fecha de nacimiento:</strong></label><br>
		<input type="date" name="fecha"><br><br>

		<input type="file" name="foto"><br><br>

		<input type="submit" name="enviar"><br><br>
	</form>

	<?php
		if (isset($_POST["enviar"])) {

			$nombre = $_POST["nombre"];
			$dni = $_POST["dni"];
			$telefono = $_POST["telefono"];
			$direccion = $_POST["direccion"];
			$email = $_POST["email"];
			$fecha = $_POST["fecha"];
			$foto = $_FILE["foto"];

			$nombreImagen = $foto['name'];
			$ruta = "imagenes/" .$nombreImagen;
			$temporal = $foto['tmp_name'];
			if (move_uploaded_file($temporal, $ruta)) {
				echo "<strong>La imagen ha sido insertada correctamente</strong><br>";
			}

			if ($nombre==null || $nombre==' ' || $dni==null || $dni==' ' || $telefono==null || $telefono==' ' || $direccion==null || $direccion==' ' || $email==null || $email==' ' || $fecha==null || $fecha==' ') {

				$errores[] = "No pueden existir campos vacios";
			}

			if (!preg_match("/[a-zA-Z]/", $nombre)) {
				$errores[] = "El nombre solo puede contener letras";
			}

			if (!preg_match("/[0-9]{7,8}[a-zA-Z]/", $dni)) {
				$errores[] = "El formato de DNI es incorrecto";
			}

			if (!preg_match("/^[9|6|7][0-9]{8}$/", $telefono)) {
				$errores[] = "El formato de teléfono es incorrecto";
			}

			if (!preg_match("/^[A-z0-9\\._-]+@[A-z0-9][A-z0-9-]*(\\.[A-z0-9_-]+)*\\.([A-z]{2,6})$/", $email)) {
				$errores[] = "El formato de E-Mail es incorrecto";
			}

			if (!preg_match("/^[0-9]{4}-[0-1][0-9]-[0-3][0-9]$/",$fecha)) {
                $errores[] = "El formato de la fecha es incorrecto";
            }

            if (isset($errores)) {
            	foreach ($errores as $error) {
            		echo "<li>$error</li>";
            	}
            }

            if (!isset($errores)) {
            	$correcto = true;
            	$formulario->beginTransaction();
            	$sql = "INSERT INTO formulario (nombre,dni,telefono,direccion,email,fecha_nacimiento,imagen) values ('$nombre','$dni', '$telefono', '$direccion','$email','$fecha','$foto')";

            	if ($formulario->exec($sql) == 0) $correcto = false;

            	if ($formulario == true) {
            		$formulario->commit();
            		echo "<strong>Los campos se han añadido correctamente</strong>";
            	}
            	else{
            		$formulario->rollback();
            		echo "<strong>Los campos no se han añadido a la base de datos</strong>";
            	}
            }
		}
	?>
</body>
</html> 