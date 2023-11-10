<?php
    include "../app/producto-services.php";
    $objAPI = new productoAPI();

    $method = $_SERVER['REQUEST_METHOD'];
    header("Content-Type: Application/json");
    switch ($method) {
        case 'GET':
            $objAPI->getAllProductos();                        
            break;

        case 'POST':
            $objAPI->saveProducto();
            break;

        case 'PUT':
            $objAPI->updateProducto();
            break;

        case 'DELETE':
            $objAPI->deleteProducto();
            break;

        
        default:
            $objAPI->nullRequest();
            break;
    }    
?>