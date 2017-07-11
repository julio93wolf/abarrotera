<?php
	
	/**
	* 
	*/
	class Abarrotera
	{
		
		/**/
		function __construct(){
			/*include ('../config.php');*/
			include ('../../config.php');
			$this->conexion=$conexion;
		}

		/*
		* Método generico para realizar consultas en la base de datos
		*/
		function consultar($sql,$parametros=null){
			$statement=$this->conexion->prepare($sql);
			if(!is_null($parametros)){
				foreach ($parametros as $key => $value) {
					$statement->bindValue(':'.$key,$value);
				}	
			}
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
		function borrar($tabla,$parametros){
			$sql='delete from :tabla where ';
			$where='';
			$i=0;
			foreach ($parametros as $key => $value) {
				if ($i!=0) {
					$where=$where.' and '.$key.'='.$value;
				}else{
					$where=$where.''.$key.'='.$value;
				}
				$i++;
			}
			$sql=$sql.$where;
			echo $sql;
			/*$statement=$this->conexion->prepare($sql);*/
		}

	}
	$abarrotera= new Abarrotera;
?>