<?php 
    include "../controllers/controller_consultas_api.php";


    class librosAPI{

        function getAllLibros(){ 
            $objDB = new ExtraerDatos();
            $datos = array();

            
            $datos = $objDB->listadoLibros();
            

            $libro = array();
            $libro["datos"] = array();

            if($datos){
                foreach($datos as $row){
                    $item = array(
                        "id" => $row["id"],
                        "isbn" => $row["isbn"], 
                        "titulo" => $row["titulo"],
                        "descrip" => $row["descripcion"],
                        "autor" => $row["autor"],
                        "edicion" => $row["edicion"],
                        "ejemplar" => $row["ejemplares"],
                        "categoria" => $row["categoria"],
                        "estado" => $row["estado"],
                    );
                    array_push($libro["datos"], $item);                
                }
                $libro["msg"] = "OK";
                $libro["error"] = "0";
                echo json_encode($libro);
                
            }else{
                echo json_encode(array("datos"=>null, "error"=>"1", "msg"=>"NO hay datos de libros", ));
            }
        }

 
    }

?>

