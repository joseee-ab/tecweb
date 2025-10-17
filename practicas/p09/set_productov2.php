
    <?php
    /** SE CREA EL OBJETO DE CONEXION */
    @$link = new mysqli('localhost', 'root', 'joseeeab' , 'marketzone');	

    /** comprobar la conexión */
    if ($link->connect_errno) 
    {
        die('Falló la conexión: '.$link->connect_error.'<br/>');
        /** NOTA: con @ se suprime el Warning para gestionar el error por medio de código */
    }

    /**Obtener datos del formulario*/
    $nombre = $_POST['nombre'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $precio = $_POST['precio'];
    $detalles = $_POST['detalles'];
    $unidades = $_POST['unidades'];
    $imagen = $_POST['imagen'];

    /**Agregamos variable para la columna de eliminado asignandole 0 */
    //$eliminado = 0;

    /**Validar si el producto ya existe*/
    $sql_check = "SELECT * FROM productos WHERE nombre = '$nombre' AND marca = '$marca' AND modelo = '$modelo'";

    $result = $link->query($sql_check);


    if ($result->num_rows > 0) {
        echo "<h3>El producto ya existe.</h3>";
        echo "<p>Ya hay un producto registrado con el mismo nombre, marca y modelo.</p>";
    } else {
        /** Crear una tabla que no devuelve un conjunto de resultados */
        //$sql = "INSERT INTO productos VALUES (null, '{$nombre}', '{$marca}', '{$modelo}', {$precio}, '{$detalles}', {$unidades}, '{$imagen}', {$eliminado})";
        
        $sql = "INSERT INTO productos (nombre, marca, modelo, precio, detalles, unidades, imagen) 
        VALUES ('{$nombre}', '{$marca}', '{$modelo}', {$precio}, '{$detalles}', {$unidades}, '{$imagen}')";

        if ( $link->query($sql) ) 
        {
            echo '<h3>Producto Insertado Exitosamente</h3>';
            echo '<p><strong>ID: </strong>'.$link->insert_id;
            echo '<p><strong>Nombre: </strong>'.$nombre;
            echo '<p><strong>Marca: </strong>'.$marca;
            echo '<p><strong>Modelo: </strong>'.$modelo;
            echo '<p><strong>Precio: </strong>'.$precio;
            echo '<p><strong>Detalles: </strong>'.$detalles;
            echo '<p><strong>Unidades: </strong>'.$unidades;
        }
        else
        {
            echo '<h3>El Producto no pudo ser insertado </h3>';
        }

    }
    $link->close();
    ?>
