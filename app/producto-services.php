<?php 
    include "../controllers/controller_consultas_api.php";


    class productoAPI{

        function getAllProductos(){
            $objDB = new ExtraerDatos();
            $data = array();

            if (isset($_GET["id"])){
                $data = $objDB->productosDetalle($_GET["id"]);
            }else{
                $data = $objDB->listadoProducto();
            }

            $producto = array();
            $producto["data"] = array();

            if($data){
                foreach($data as $row){
                    $item = array(
                        "code" => $row["id"],
                        "id" => $row["referencia"], 
                        "name" => $row["nombre"],
                        "addr" => $row["descripcion"],
                        "phone" => $row["cantidad"],
                        #"dateb" => $row["fchnac"],
                        "photo" => $row["foto"],
                        #"profile" => $row["perfil"]
                    );
                    array_push($producto["data"], $item);                
                }
                $producto["msg"] = "OK";
                $producto["error"] = "0";
                echo json_encode($producto);
                
            }else{
                echo json_encode(array("data"=>null, "error"=>"1", "msg"=>"NO hay datos de empleados", ));
            }
        }

        function saveProducto(){
            echo json_encode(array("data"=>null, "error"=>"0", "msg"=>"Guardar", ));
        }

        function updateProducto(){
            echo json_encode(array("data"=>null, "error"=>"0", "msg"=>"Actualizar", ));
        }

        function deleteProducto(){
            echo json_encode(array("data"=>null, "error"=>"0", "msg"=>"Eliminar", ));
        }

        function nullRequest(){
            echo json_encode(array("data"=>null, "error"=>"0", "msg"=>"Solicitud Nula", ));
        }
 
    }

?>

