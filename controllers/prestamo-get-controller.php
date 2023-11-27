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

class prestamoGetController extends ConsultasDB
{
	// ****************************************************************************
	// Agregue aqui debajo el resto de Funciones - Se ha dejado  Listado y detalle
	// ****************************************************************************
    //MUESTRA LISTADO DE prestamo
	function listadoprestamo($start=0, $regsCant = 0){
		$sql = "SELECT * FROM prestamo";
		if ($regsCant > 0 )
			 $sql = "SELECT * from prestamo $start,$regsCant";
		$lista = $this->consulta_generales($sql);	
		return $lista;
	}
	// DETALLE DE prestamo SELECICONADA SEGUN Fecha
	function prestamoById($idu){
		$sql = "SELECT * from prestamo where fecha=$idu ";
		$lista = $this->consulta_generales($sql);	
		return $lista;
	}	
	
}//fin CLASE



?>