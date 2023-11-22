<?php 
    include "../controllers/usuario-create-controller.php";

    class usuarioCreteServices{    

        function saveUsuario($datos){
            include "../config/config.php";
            
            if(isset($datos["user"])){//verificar la existencia de envio de datos
                $objDB = new usuarioCreateController();

                $data = array(
                    "user"=> $datos["user"],
                    "email"=> $datos["email"],
                    "pass"=> $datos["pass"],
                    "rol"=> $datos["rol"]
                );

                $ejecucion = $objDB->saveUsuario($data);
                if($ejecucion){ // Tod se ejecuto correctamente
                    echo json_encode(array("data"=>$data, "error"=>"0", "msg"=>$errorResponse[0] ));                    
                }else{ // Algo paso mal
                    echo json_encode(array("data"=>$data, "error"=>"10", "msg"=>$errorResponse[10] ));
                }
            }else{
                echo json_encode(array("data"=>$data, "error"=>"5", "msg"=>$errorResponse[5] ));
            }
        }

    }
    
?>