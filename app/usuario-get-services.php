<?php 
    include "../controllers/usuario-get-controller.php";

    class usuarioGetServices{

        function usuarioGet(){
            $objDB = new usuarioGetController();
            $data = array();
            include "../config/config.php";

            if (isset($_GET["id"])){
                $data = $objDB->UsuarioById($_GET["id"]);
            }else{
                $data = $objDB->listadoUsuario();
            }

            //Creamos Array que entregara un Json de resultado
            $usuario = array();
            $usuario["data"] = array();

            if($data){ //Valida si hay datos
                foreach($data as $row){//Recorrer los registros y montar cada uno en el ARRAY temporal
                    $item = array(
                        "id" => $row["id"],
                        "user" => $row["user"],
                        "email" => $row["correo"],
                        "rol" => $row["rol"]
                    );
                    array_push($usuario["data"], $item);  //  montamos el array temporal en JSON            
                }
                $usuario["msg"] = "OK";
                $usuario["error"] = "0";
                echo json_encode($usuario); //Formateamos tods los datos a JSON OFICIAL
                
            }else{
                echo json_encode(array("data"=>null, "error"=>"4", "msg"=>$errorResponse[4] ));
            }
        }
        
    }

?>

