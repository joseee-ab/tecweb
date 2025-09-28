<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Respuesta 5</title>
</head>
<body>
    <?php   
        require_once 'src/funciones.php';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $edad = $_POST['edad'];
            $sexo = $_POST['sexo'];

            ejercicio5($sexo, $edad);
        }
    ?>
</body>
</html>