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
class clientesUpdateController extends DBOperations
{
	
	function updateClientes($data){
		//$hash = password_hash($contra, PASSWORD_DEFAULT);
        $ejecucion = $this->dbOperaciones("
				UPDATE clientes 
                SET cedula=".$data["ced"].", 
                    nombre='".$data["nom"]."', 
                    direccion='".$data["dir"]."', 
                    telefono=".$data["tel"].", 
                    whatsapp=".$data["wat"]."
                WHERE id=".$data["idc"]."
                ");
		return $ejecucion;												   		
	}
	
}//fin CLASE



?>
