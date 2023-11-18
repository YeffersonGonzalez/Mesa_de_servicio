<?php
session_start();
require_once( "../models/models_admin.php");

class ConsultasDB extends DBConfig {
    					
	function consulta_generales($sql){
		$this->config();
		$this->conexion(); 
		  
  		$records = $this->Consultas($sql);		 		  		  		  

  		$this->close();		
		return $records;				
	}
}


/**
* IMPLEMENTACION DE ACCESO A CONSULTAS PARA PROTEGER MAS LA VISTA
*/
class autenticationGetController extends ConsultasDB
{

	// DETALLE DE USUARIOS SELECICONADA SEGUN ID
	function getLogin($usu){
		$sql = "SELECT * from users where user='$usu' ";
		$lista = $this->consulta_generales($sql);	
		return $lista;
	}
	
}//fin CLASE

?>
