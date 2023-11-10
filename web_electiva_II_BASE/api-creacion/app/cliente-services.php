<?php 
    include "../controllers/controller_consultas_api.php";


    class clienteAPI{

        function getAllClientes(){
            $objDB = new ExtraerDatos();
            $data = array();

            if (isset($_GET["id"])){
                $data = $objDB->clienteDetalle($_GET["id"]);
            }else{
                $data = $objDB->listadoCliente();
            }

            $empleados = array();
            $empleados["data"] = array();

            if($data){
                foreach($data as $row){
                    $item = array(
                        #"code" => $row["codigo"],
                        "id" => $row["cedula"],                    
                        "name" => $row["nombre"],
                        "addr" => $row["direccion"],
                        "phone" => $row["telefono"],
                        #"dateb" => $row["fchnac"],
                        #"photo" => $row["foto"],
                        #"profile" => $row["perfil"]
                    );
                    array_push($cliente["data"], $item);                
                }
                $cliente["msg"] = "OK";
                $cliente["error"] = "0";
                echo json_encode($cliente);
                
            }else{
                echo json_encode(array("data"=>null, "error"=>"1", "msg"=>"NO hay datos de empleados", ));
            }
        }

        function saveCliente(){
            echo json_encode(array("data"=>null, "error"=>"0", "msg"=>"Guardar", ));
        }

        function updateCliente(){
            echo json_encode(array("data"=>null, "error"=>"0", "msg"=>"Actualizar", ));
        }

        function deleteCliente(){
            echo json_encode(array("data"=>null, "error"=>"0", "msg"=>"Eliminar", ));
        }

        function nullRequest(){
            echo json_encode(array("data"=>null, "error"=>"0", "msg"=>"Solicitud Nula", ));
        }
 
    }

?>

