<?php 
    include "../controllers/controller_consultas_api.php";


    class usuarioAPI{

        function getAllUsuario(){
            $objDB = new ExtraerDatos();
            $data = array();

            if (isset($_GET["id"])){
                $data = $objDB->usuarioDetalle($_GET["id"]);
            }else{
                $data = $objDB->listadoUsuario();
            }

            $usuario = array();
            $usuario["data"] = array();

            if($data){
                foreach($data as $row){
                    $item = array(
                        
                        "id" => $row["id"],                    
                        "user" => $row["user"],
                        "pass" => $row["pass"],
                        "correo" => $row["correo"],
                        "rol" => $row["rol"],
                        #"photo" => $row["foto"],
                        #"profile" => $row["perfil"]
                    );
                    array_push($usuario["data"], $item);                
                }
                $usuario["msg"] = "OK";
                $usuario["error"] = "0";
                echo json_encode($usuario);
                
            }else{
                echo json_encode(array("data"=>null, "error"=>"1", "msg"=>"NO hay datos de usuario", ));
            }
        }

        function saveUsuario(){
            
            
            echo json_encode(array("data" =>null, "error" => "0", "msg" => "Guardar"));
        
        }

        function updateUsuario(){
            echo json_encode(array("data"=>null, "error"=>"0", "msg"=>"Actualizar", ));
        }

        function deleteUsuario(){
            echo json_encode(array("data"=>null, "error"=>"0", "msg"=>"Eliminar", ));
        }

        function nullRequest(){
            echo json_encode(array("data"=>null, "error"=>"0", "msg"=>"Solicitud Nula", ));
        }
 
    }

?>

