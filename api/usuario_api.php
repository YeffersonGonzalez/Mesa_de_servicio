<?php
    include "../app/usuarios-services.php";
    $objAPI = new usuarioAPI();

    $method = $_SERVER['REQUEST_METHOD'];
    header("Content-Type: Application/json");
    switch ($method) {
        case 'GET':
            $objAPI->getAllUsuario();                        
            break;

        case 'POST':
            $objAPI->saveUsuario();
            break;

        case 'PUT':
            $objAPI->updateUsuario();
            break;

        case 'DELETE':
            $objAPI->deleteUsuario();
            break;

        
        default:
            $objAPI->nullRequest();
            break;
    }    
?>