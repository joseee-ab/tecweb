<?php
$link = mysqli_connect("localhost", "root", "", "marketzone");

if($link === false){
    die("ERROR: No se pudo conectar a la DB. " . mysqli_connect_error());
}

$id       = $_POST['id'] ?? '';
$nombre   = $_POST['nombre'] ?? '';
$marca    = $_POST['marca'] ?? '';
$modelo   = $_POST['modelo'] ?? '';
$precio   = $_POST['precio'] ?? 0;
$unidades = $_POST['unidades'] ?? 0;
$detalles = $_POST['detalles'] ?? '';
$imagen   = $_POST['imagen'] ?? '';

if(empty($id)){
    die("ERROR: No se especificó el producto a actualizar.");
}

$nombre   = mysqli_real_escape_string($link, $nombre);
$marca    = mysqli_real_escape_string($link, $marca);
$modelo   = mysqli_real_escape_string($link, $modelo);
$detalles = mysqli_real_escape_string($link, $detalles);
$imagen   = mysqli_real_escape_string($link, $imagen);

$sql = "UPDATE productos SET 
        nombre='$nombre', 
        marca='$marca', 
        modelo='$modelo', 
        precio=$precio, 
        unidades=$unidades, 
        detalles='$detalles', 
        imagen='$imagen'
        WHERE id=$id";

if(mysqli_query($link, $sql)){
    echo "Producto actualizado correctamente.";
    echo "<br><a href='get_productos_xhtml_v2.php'>Volver a la lista</a>";
} else {
    echo "ERROR: No se pudo actualizar el producto. " . mysqli_error($link);
}

mysqli_close($link);
?>
