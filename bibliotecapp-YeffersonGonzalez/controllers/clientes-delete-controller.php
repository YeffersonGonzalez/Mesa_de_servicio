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
class clientesDeleteController extends DBOperations
{
	function deleteClientes($data){
        $ejecucion = $this->dbOperaciones("DELETE FROM CLIENTES WHERE id= ".$data["idc"]);
		return $ejecucion;												   		
	}
	
}//fin CLASE



?>
