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
		$sql = "SELECT * from cliente where cedula=$idu ";
		$lista = $this->consulta_generales($sql);	
		return $lista;
	}


	function listadoProducto($start=0, $regsCant = 0){
		$sql = "SELECT * FROM producto";
		if ($regsCant > 0 )
			 $sql = "SELECT * from producto $start,$regsCant";
		$lista = $this->consulta_generales($sql);	
		return $lista;
	}

	function productosDetalle($idu){
		$sql = "SELECT * from producto where id=$idu ";
		$lista = $this->consulta_generales($sql);	
		return $lista;
	}
	function listadoLibros($start=0, $regsCant = 0){
		$sql = "SELECT * FROM libros";
		if ($regsCant > 0 )
			 $sql = "SELECT * from libros $start,$regsCant";
		$lista = $this->consulta_generales($sql);	
		return $lista;
	}
	


	function listadoUsuario($start=0, $regsCant = 0){
		$sql = "SELECT * FROM usuario";
		if ($regsCant > 0 )
			 $sql = "SELECT * from usuario $start,$regsCant";
		$lista = $this->consulta_generales($sql);	
		return $lista;
	}
	function usuarioDetalle($idu){
		$sql = "SELECT * from usuario where id=$idu ";
		$lista = $this->consulta_generales($sql);	
		return $lista;
	}

}//fin CLASE

?>
