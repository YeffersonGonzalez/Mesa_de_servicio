<?php 
    include "../controllers/clientes-update-controller.php";    

    class clientesUpdateServices{    

        function updateCliente($datos){
            include "../config/config.php";
            if(isset($datos["idc"])){//verificar la existencia de envio de datos
                $objDB = new clientesUpdateController();

                $data = array(
                    "idc"=> $datos["idc"],
                    "ced"=> $datos["ced"],
                    "nom"=> $datos["nom"],
                    "dir"=> $datos["dir"],
                    "tel"=> $datos["tel"],
                    "wat"=> $datos["wat"]
                );

                $ejecucion = $objDB->updateClientes($data);
                if($ejecucion){ // Todo se ejecuto correctamente
                    echo json_encode(array("data"=>null, "error"=>"0", "msg"=>$errorResponse[0] ));                    
                }else{ // Algo paso mal
                    echo json_encode(array("data"=>null, "error"=>"10", "msg"=>$errorResponse[10] ));
                }
            }else{
                echo json_encode(array("data"=>null, "error"=>"5", "msg"=>$errorResponse[5] ));
            }
        }

    }

?>