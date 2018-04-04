<?php 
	include "db.php";	
?>

<!DOCTYPE html>
<html>
<head>
	<title>CHATCITO</title>
	<link rel="stylesheet" type="text/css" href="estilos.css">
	<link href="https://fonts.googleapis.com/css?family=Mukta+Vaani" rel="stylesheet">
	<script type="text/javascript">
		function ajax(){
			var req = new XMLHttpRequest();

			req.onreadystatechange = function(){
				if (req.readyState == 4 && req.status == 200) {
					document.getElementById('chat').innerHTML = req.responseText;
				}
			}

			req.open('GET', 'chat.php', true);
			req.send();
		}

		setInterval(function(){ajax();},1000);

		//setInterval(funtion(){ajax();}, 1000);

	</script>
</head>
<body onLoad="ajax();">

	<div id="contenedor">
		<div id="cajaChat">
			<div id="chat">
				
			</div>
		</div>
		<form method="post" action="index.php">
			<input type="text" name="nombre" placeholder="Ingresa tu nombre">
			<textarea name="mensaje" placeholder="Ingresa tu mensaje"></textarea>
			<input type="submit" name="enviar" value="Enviar">
		</form>
		<?php
			if (isset($_POST['enviar'])) {
				$nombre = $_POST['nombre'];
				$mensaje = $_POST['mensaje'];

				$consulta = "INSERT INTO chat (nombre, mensaje) VALUES ('$nombre','$mensaje')";
				$ejecutar = $conexion->query($consulta);
			}
		?>
	</div>

</body>
</html>