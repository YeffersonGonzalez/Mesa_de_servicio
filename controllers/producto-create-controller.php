<?php
session_start();
require_once( "../models/models_admin.php");

class DBOperations extends DBConfig {

	function dbOperaciones($sql){
		$this->config();
		$this->conexion(); 
		  
  		$records = $this->Operaciones($sql);		 		  		  		  

  		$this->close();		
		return $records;				
	}
}

/**
* IMPLEMENTACION DE ACCESO A CONSULTAS PARA PROTEGER MAS LA VISTA
*/
class productoCreateController extends DBOperations
{
	
	function saveProducto($data){
		//$hash = password_hash($contra, PASSWORD_DEFAULT);
        $ejecucion = $this->dbOperaciones("
				INSERT INTO producto(referencia, descripcion, cantidad, valorcomercial, tipoPC, pantalla, discoduro, ram, id) 
                values('".$data["refer"]."', '".$data["descri"]."', ".$data["cant"].", ".$data["vlrCom"].", '".$data["tipoPC"]."', '".$data["tipoPa"]."', '".$data["tipoAl"]."', '".$data["tipoRam"]."', ".$_SESSION['id']." ) ");
		return $ejecucion;												   		
	}
	
}//fin CLASE



?>
				