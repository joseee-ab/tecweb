<?php
    use MARKETZONE\PROD\Products as p; 
    require_once __DIR__ . '/myapi/Products.php';    
    $product = new p('marketzone');
    $product->list();
    echo $product->getResponse();
?>