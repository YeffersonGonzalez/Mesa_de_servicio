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
class usuarioCreateController extends DBOperations
{
	
	function saveUsuario($data){
		$hash = sha1($data["pass"]);
        $ejecucion = $this->dbOperaciones("
				INSERT INTO usuario(user, pass, correo, rol) 
                values('".$data["user"]."', '".$hash."', '".$data["email"]."', '".$data["rol"]."' ) ");
		return $ejecucion;												   		
	}
}

//fin CLASE



?>
