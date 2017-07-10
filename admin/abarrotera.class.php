<?php
	
	/**
	* 
	*/
	class Abarrotera
	{
		
		/**/
		function __construct(){
			include ('../config.php');
			$this->conexion=$conexion;
		}

		/*
		* Método generico para realizar consultas en la base de datos
		*/
		function consultar($sql){
			$statement=$this->conexion->prepare($sql);
			$statement->execute();
			$datos=$statement->fetchAll();
			return $datos;
		}

		/*
		* Método generico para insertar registros en la base de datos
		*/
		function insertar(){}

		/*
		* Método generico para actualizar registos en la base de datos
		*/
		function actualizar(){}

		/*
		* Método generico para eliminar registros en la base de datos
		*/
		function borrar(){}

	}

	$abarrotera= new Abarrotera;
	$datos=$abarrotera->consultar('select * from categoria');
	echo '<pre>';
	print_r($datos);
	echo '</pre>';
?>