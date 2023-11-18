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
class ExtraerDatos extends ConsultasDB
{

		
	//MUESTRA LISTADO DE USUARIOS
	function listadoUsuarios($start=0, $regsCant = 0){
		$sql = "SELECT * FROM usuarios";
		if ($regsCant > 0 )
			 $sql = "SELECT * from usuarios $start,$regsCant";
		$lista = $this->consulta_generales($sql);	
		return $lista;
	}
	// DETALLE DE USUARIOS SELECICONADA SEGUN ID
	function usuariosDetalle($idu){
		$sql = "SELECT * from usuarios where id=$idu ";
		$lista = $this->consulta_generales($sql);	
		return $lista;
	}

	// ****************************************************************************
	// Agregue aqui debajo el resto de Funciones - Se ha dejado  Listado y detalle
	// ****************************************************************************

	//MUESTRA LISTADO DE EMPLEADOS
	function listadoEmpleados($start=0, $regsCant = 0){
		$sql = "SELECT * FROM empleados";
		if ($regsCant > 0 )
			 $sql = "SELECT * from empleados $start,$regsCant";
		$lista = $this->consulta_generales($sql);	
		return $lista;
	}
	// DETALLE DE EMPLEADOS SELECICONADA SEGUN ID
	function empleadosDetalle($idu){
		$sql = "SELECT * from empleados where codigo=$idu ";
		$lista = $this->consulta_generales($sql);	
		return $lista;
	}
    function listadoCliente($start=0, $regsCant = 0){
		$sql = "SELECT * FROM cliente";
		if ($regsCant > 0 )
			 $sql = "SELECT * from cliente $start,$regsCant";
		$lista = $this->consulta_generales($sql);	
		return $lista;
	}
	function clienteDetalle($idu){
		$sql = "SELECT * from cliente where cedula='$idu' ";
		$lista = $this->consulta_generales($sql);	
		return $lista;
	}








	// DETALLE DE USUARIOS SELECICONADA SEGUN ID
	function consultaLogin($usu){
		$sql = "SELECT * from users where user='$usu' ";
		$lista = $this->consulta_generales($sql);	
		return $lista;
	}
	
  

	

	
}//fin CLASE

?>
