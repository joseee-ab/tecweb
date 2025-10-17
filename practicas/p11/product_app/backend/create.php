<?php
    include_once __DIR__.'/database.php';

    $producto = file_get_contents('php://input');
    
    if(!empty($producto)) {
        $jsonOBJ = json_decode($producto);
        
        $nombre = $jsonOBJ->nombre;
        $marca = $jsonOBJ->marca;
        $modelo = $jsonOBJ->modelo;
        $precio = $jsonOBJ->precio;
        $detalles = $jsonOBJ->detalles;
        $unidades = $jsonOBJ->unidades;
        $imagen = $jsonOBJ->imagen;

        $sql = "SELECT * FROM productos WHERE nombre = '{$nombre}' AND eliminado = 0";
        
        if ( $result = $conexion->query($sql) ) {
            if ($result->num_rows > 0) {
                $yaExiste = true;
            } else {
                $yaExiste = false;
            }
            $result->free();
        } else {
            echo "Error al verificar existencia del producto: " . mysqli_error($conexion);
            $conexion->close();
            exit;
        }

        if($yaExiste) {
            echo "Ese producto ya existe";
        } else {
            $sql = "INSERT INTO productos VALUES (null, '{$nombre}', '{$marca}', '{$modelo}', {$precio}, '{$detalles}', {$unidades}, '{$imagen}', 0)";
            
            if ($conexion->query($sql)) {
                echo "Producto agregado exitosamente";
            } else {
                echo "Error al agregar producto: " . mysqli_error($conexion);
            }
        }
        
        $conexion->close();
    } else {
        echo "No se recibieron datos del producto";
    }
?>