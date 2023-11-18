<?php
    include "../app/clientes-get-services.php";
    include "../config/config.php";
    
    $objAPI = new clientesGetServices();

    $method = $_SERVER['REQUEST_METHOD'];
    header("Content-Type: Application/json");
    if ($method == 'GET') {
            $objAPI->clientesGet();                          
    }else{
        echo json_encode(array("data"=>null, "error"=>"3", "msg"=>$errorResponse[3] ));
    }    
?>