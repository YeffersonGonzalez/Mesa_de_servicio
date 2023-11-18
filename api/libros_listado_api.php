<?php
    include "../app/libros-listados-service.php";
    include "../config/config.php";
    
    $objAPI = new librosAPI();

    $method = $_SERVER['REQUEST_METHOD'];
    header("Content-Type: Application/json");
    if ($method == 'GET') {
            $objAPI->getAllLibros();                          
    }else{
        echo json_encode(array("data"=>null, "error"=>"3", "msg"=>$errorResponse[3] ));
    } 
            
   ?>         

        