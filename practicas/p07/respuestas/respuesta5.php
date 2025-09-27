<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Respuesta 5</title>
</head>
<body>
	<?php 
		session_start();
		if (isset($_SESSION['mensaje']) && $_SESSION['mensaje'] === "true"){
			echo "<h1>Bienvenida, usted está en el rango de edad permitido</h1>";
		} else {
			echo "<h1>Lo sentimos, usted no esta en el rango permitido</h1>";
		}
		unset($_SESSION['mensaje']);
	?>

</body>
</html>