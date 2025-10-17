<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
<?php
    /** Crear conexión **/
    @$link = new mysqli('localhost', 'root', 'joseeeab', 'marketzone');
    if ($link->connect_errno) {
        die('Falló la conexión: '.$link->connect_error.'<br/>');
    }

    /** Obtener todos los productos **/
    $productos = [];
    $sql = "SELECT * FROM productos";
    if ($result = $link->query($sql)) {
        while ($fila = $result->fetch_array(MYSQLI_ASSOC)) {
            $productos[] = $fila;
        }
        $result->free();
    } else {
        die('Error en la consulta: '.$link->error);
    }

    $link->close();
?>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Lista de Productos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
        <h3>LISTA DE PRODUCTOS</h3>
        <br/>
        <?php if(count($productos) > 0): ?>
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Precio</th>
                        <th>Unidades</th>
                        <th>Detalles</th>
                        <th>Imagen</th>
                        <th>Editar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($productos as $row): ?>
                        <tr>
                            <th><?= $row['id'] ?></th>
                            <td><?= htmlspecialchars($row['nombre']) ?></td>
                            <td><?= htmlspecialchars($row['marca']) ?></td>
                            <td><?= htmlspecialchars($row['modelo']) ?></td>
                            <td>$<?= number_format($row['precio'], 2) ?></td>
                            <td><?= $row['unidades'] ?></td>
                            <td><?= utf8_encode($row['detalles']) ?></td>
                            <td><img src="<?= htmlspecialchars($row['imagen']) ?>" alt="<?= htmlspecialchars($row['nombre']) ?>" width="50"></td>
                            <td>
                                <form action="formulario_tenis_v2.php" method="get">
                                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                    <input type="hidden" name="nombre" value="<?= htmlspecialchars($row['nombre'], ENT_QUOTES) ?>">
                                    <input type="hidden" name="marca" value="<?= htmlspecialchars($row['marca'], ENT_QUOTES) ?>">
                                    <input type="hidden" name="modelo" value="<?= htmlspecialchars($row['modelo'], ENT_QUOTES) ?>">
                                    <input type="hidden" name="precio" value="<?= $row['precio'] ?>">
                                    <input type="hidden" name="unidades" value="<?= $row['unidades'] ?>">
                                    <input type="hidden" name="detalles" value="<?= htmlspecialchars($row['detalles'], ENT_QUOTES) ?>">
                                    <input type="hidden" name="imagen" value="<?= htmlspecialchars($row['imagen'], ENT_QUOTES) ?>">
                                    <input type="submit" class="btn btn-primary btn-sm" value="Editar">
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
        <script>alert('No hay productos disponibles');</script>
    <?php endif; ?>
</body>
</html>
