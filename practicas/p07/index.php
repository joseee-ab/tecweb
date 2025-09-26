<?php
    include("src/funciones.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica 7</title>
</head>
<body>
    <h2>Ejercicio 1</h2>
    <p>Escribir programa para comprobar si un número es un múltiplo de 5 y 7</p>
    <?php
        if(isset($_GET['numero'])) {
            $num = $_GET['numero'];
            if (ejercicio1($num)) {
                echo "<p>R= El número $num <br>SÍ es múltiplo de 5 y 7.</p>";
            } else {
                echo "<p>R= El número $num <br>NO es múltiplo de 5 y 7.</p>";
            }
        }
    ?>

    <h2>Ejercicio 2</h2>
    <p>Crea un programa para la generación repetitiva de 3 números aleatorios hasta obtener una
    secuencia compuesta por impar, par, impar</p>

    <?php
        $resultado = ejercicio2();
        echo "<pre>";
        echo "<p>Impar\tPar\tImpar</p>";
        foreach ($resultado['matriz'] as $fila) {
            echo implode("\t", $fila) . "\n";
        }
        echo "</pre>";

        echo "<p>{$resultado['totalNumeros']} números obtenidos en {$resultado['iteraciones']} iteraciones</p>";
    ?>

    <h2>Ejercicio 3</h2>
    <p>Utiliza un ciclo while para encontrar el primer número entero obtenido aleatoriamente,
    pero que además sea múltiplo de un número dado.</p>

    <?php
        if(isset($_GET['numero'])) {
            $numero = intval($_GET['numero']);

            $resultado1 = ejercicio3W($numero);
            echo "<p>While</p>";
            echo "<p>Primer número múltiplo de $numero encontrado: $resultado1 </p>";

            $resultado2 = ejercicio3DW($numero);
            
            echo "<p>Do-While</p>";
            echo "<p>Primer número múltiplo de $numero encontrado: $resultado2 </p>";

        }
    ?>

    <h2>Ejemplo de POST</h2>
    <form action="http://localhost/tecweb/practicas/p07/index.php" method="post">
        Name: <input type="text" name="name"><br>
        E-mail: <input type="text" name="email"><br>
        <input type="submit">
    </form>
    <br>
    <?php
        if(isset($_POST["name"]) && isset($_POST["email"]))
        {
            echo $_POST["name"];
            echo '<br>';
            echo $_POST["email"];
        }
    ?>
</body>
</html>