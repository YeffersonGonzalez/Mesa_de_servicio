<?php
    include "../app/cliente-services.php";
    $objAPI = new clienteAPI();

    $method = $_SERVER['REQUEST_METHOD'];
    header("Content-Type: Application/json");
    switch ($method) {
        case 'GET':
            $objAPI->getAllClientes();                        
            break;

        case 'POST':
            $objAPI->saveCliente();
            break;

        case 'PUT':
            $objAPI->updateCliente();
            break;

        case 'DELETE':
            $objAPI->deleteCliente();
            break;

        
        default:
            $objAPI->nullRequest();
            break;
    }    
?>