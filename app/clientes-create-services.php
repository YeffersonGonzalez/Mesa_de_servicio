<?php 
    include "../controllers/clientes-create-controller.php";

    class clientesCreteServices{    

        function saveCliente($datos){
            include "../config/config.php";
            
            if(isset($datos["ced"])){//verificar la existencia de envio de datos
                $objDB = new clientesCreateController();

                $data = array(
                    "ced"=> $datos["ced"],
                    "nom"=> $datos["nom"],
                    "dir"=> $datos["dir"],
                    "tel"=> $datos["tel"]
                ); 

                $ejecucion = $objDB->saveClientes($data);
                if($ejecucion){ // Todo se ejecuto correctamente
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