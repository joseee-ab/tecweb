<?php
    include_once __DIR__ . '/myapi/Products.php';
    use MARKETZONE\PROD\Products as p; 
    $product = new p('marketzone');
    $product->add($_POST);
    echo $product->getResponse();
?>