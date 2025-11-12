<?php
    use MARKETZONE\PROD\Products as p; 
    include_once __DIR__ . '/myapi/Products.php';
    $product = new p('marketzone');
    $product->single($_POST['id']);
    echo $product->getResponse();

?>