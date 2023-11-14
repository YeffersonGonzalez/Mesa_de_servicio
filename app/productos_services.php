<?php 
    include "../controllers/controller_consultas_api.php";


    class ProductoAPI{

        function getAllProductos(){
            $objDB = new ExtraerDatos();
            $data = array();

           
                $data = $objDB->listadoProducto();
           

            $producto = array();
            $producto["datos"] = array();

            if($data){
                foreach($data as $row){
                    $item = array(
                        "code" => $row["cod"],
                        "refer" => $row["referencia"],                    
                        "descrip" => $row["descripcion"],
                        "cant" => $row["cantidad"],
                        "valor" => $row["valorcomercial"],
                        "tipoPC" => $row["tipoPC"],
                        "pantalla" => $row["pantalla"],
                        "discoduro" => $row["discoduro"],
                        "ram" => $row["ram"],
                        "id" => $row["id"],
                    );
                    array_push($producto["datos"], $item);                
                }
                $producto["msg"] = "OK";
                $producto["error"] = "0";
                echo json_encode($producto);
                
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

