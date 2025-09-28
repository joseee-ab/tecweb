<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Respuesta 6</title>
</head>
<body>
    <h2>Resultados del Parque Vehicular</h2>

<?php
    require_once 'src/funciones.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['accion'])) {
        $accion = $_POST['accion'];
        $vehiculos = obtenerVehiculos();

        if ($accion === "Buscar Matrícula" && !empty($_POST['matricula'])) {
            $matricula = strtoupper(trim($_POST['matricula']));

            if (!validarMatricula($matricula)) {
                echo "<p>Matrícula inválida. Debe tener el formato LLLNNNN.</p>";
            } elseif ($vehiculo = buscarVehiculoPorMatricula($matricula)) {
                echo "<h3>Vehículo encontrado:</h3>";
                echo "<fieldset>";
                echo "<legend><strong>$matricula</strong></legend> ";
                echo "<p><strong>Marca:</strong> {$vehiculo['Auto']['marca']}</p>";
                echo "<p><strong>Modelo:</strong> {$vehiculo['Auto']['modelo']}</p>";
                echo "<p><strong>Tipo:</strong> {$vehiculo['Auto']['tipo']}</p>";
                echo "<p><strong>Propietario:</strong> {$vehiculo['Propietario']['nombre']}</p>";
                echo "<p><strong>Ciudad:</strong> {$vehiculo['Propietario']['ciudad']}</p>";
                echo "<p><strong>Dirección:</strong> {$vehiculo['Propietario']['direccion']}</p>";
                echo "</fieldset>";
            } else {
                echo "<p>No se encontró ningún vehículo con la matrícula <strong>$matricula</strong>.</p>";
            }

        } elseif ($accion === "Mostrar Todos") {
            echo "<h3>Listado completo del parque vehicular:</h3>";
            foreach ($vehiculos as $matricula => $vehiculo) {  
                echo "<fieldset>";
                echo "<legend><strong>$matricula</strong></legend> ";
                echo "<p><strong>Marca:</strong> {$vehiculo['Auto']['marca']}</p>";
                echo "<p><strong>Modelo:</strong> {$vehiculo['Auto']['modelo']}</p>";
                echo "<p><strong>Tipo:</strong> {$vehiculo['Auto']['tipo']}</p>";
                echo "<p><strong>Propietario:</strong> {$vehiculo['Propietario']['nombre']}</p>";
                echo "<p><strong>Ciudad:</strong> {$vehiculo['Propietario']['ciudad']}</p>";
                echo "<p><strong>Dirección:</strong> {$vehiculo['Propietario']['direccion']}</p>";
                echo "</fieldset>";

            }
        } else {
            echo "<p>Por favor, ingrese una matrícula o presione 'Mostrar Todos'.</p>";
        }
    } else {
        echo "<p>No se recibió una petición válida del formulario.</p>";
    }
    ?>

</body>
</html>
