<?php 
    include "../controllers/prestamo-get-controller.php";

    class prestamoGetServices{

        function prestamoGet(){
            $objDB = new prestamoGetController();
            $data = array();
            include "../config/config.php";

            if (isset($_GET["fecha"])){
                $data = $objDB->prestamoById($_GET["fecha"]);
            }else{
                $data = $objDB->listadoprestamo();
            }

            //Creamos Array que entregara un Json de resultado
            $prestamo = array();
            $prestamo["data"] = array();

            if($data){ //Valida si hay datos
                foreach($data as $row){//Recorrer los registros y montar cada uno en el ARRAY temporal
                    $item = array(
                        "cod" => $row["cod"],
                        "fecha" => $row["fecha"],
                        "hora" => $row["hora"],
                        "fdev" => $row["fdevolucion"],
                        "obser" => $row["observacion"],
                        "sanc" => $row["sancion"],
                        "iduser" => $row["fk_id_usuario"],
                        "idlibro" => $row["fk_id_libro"],

                    );
                    array_push($prestamo["data"], $item);  //  montamos el array temporal en JSON            
                }
                $prestamo["msg"] = "OK";
                $prestamo["error"] = "0";
                echo json_encode($prestamo); //Formateamos tods los datos a JSON OFICIAL
                
            }else{
                echo json_encode(array("data"=>null, "error"=>"4", "msg"=>$errorResponse[4] ));
            }
        }
        
    }

?>

