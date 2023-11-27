<?php 
    include "../controllers/producto-create-controller.php";

    class productoCreteServices{    

        function saveProducto($datos){
            include "../config/config.php";
            
            if(isset($datos["refer"])){//verificar la existencia de envio de datos
                $objDB = new productoCreateController();

                $data = array(
                    "refer"=> $datos["refer"],
                    "tipoPC"=> $datos["tipoPC"],
                    "tipoPa"=> $datos["tipoPa"],
                    "tipoAl"=> $datos["tipoAl"],
                    "tipoRam"=> $datos["tipoRam"],
                    "cant"=> $datos["cant"],
                    "descri"=> $datos["descri"],
                    "vlrCom"=> $datos["vlrCom"]
                ); 

                $ejecucion = $objDB->saveProducto($data);
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