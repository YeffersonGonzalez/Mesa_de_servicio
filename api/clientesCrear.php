<?php
    include "../app/clientes-create-services.php";
    include "../config/config.php";
    
    $objAPI = new clientesCreteServices();

    $method = $_SERVER['REQUEST_METHOD'];
    header("Content-Type: Application/json");
    if ($method == 'POST') {
        $_POST = json_decode(file_get_contents("php://input") , true);
        $objAPI->saveCliente($_POST);
    }else{
        echo json_encode(array("data"=>null, "error"=>"3", "msg"=>$errorResponse[3] ));
    }
  
?>