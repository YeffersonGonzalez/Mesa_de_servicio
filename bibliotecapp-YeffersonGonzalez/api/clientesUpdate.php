<?php
    include "../app/clientes-update-services.php";
    include "../config/config.php";

    $objAPI = new clientesUpdateServices();

    $method = $_SERVER['REQUEST_METHOD'];
    header("Content-Type: Application/json");
    if ($method == 'PUT') {
        $_POST = json_decode(file_get_contents("php://input") , true);
        $objAPI->updateCliente($_POST);
    }else{
        echo json_encode(array("data"=>null, "error"=>"3", "msg"=>$errorResponse[3] ));
    }
  
?>