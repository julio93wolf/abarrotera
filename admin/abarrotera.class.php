<?php

	if(!class_exists('Abarrotera')){
		class Abarrotera{
		
			function __construct(){
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
			function insertar($tabla,$parametros){
				$columnas='';
				$datos='';
				$i=0;
				foreach ($parametros as $key => $value) {
					if ($i!=0){
						$columnas.=','.$key;
						$datos.=',:'.$key;
					}
					else{
						$columnas.=$key;
						$datos.=':'.$key;
					}
					$i++;
				}
				$sql='insert into '.$tabla.' ('.$columnas.') values ('.$datos.')';
				try{
					$statement=$this->conexion->prepare($sql);
					foreach ($parametros as $key => $value) {
						$statement->bindParam(':'.$key,$value);
					}
					return $statement->execute();
				}catch (PDOException $e) {
					print "¡Error!: " . $e->getMessage() . "<br/>";
					die();
				}
			}//Funcion Insertar

			/*
			* Método generico para actualizar registos en la base de datos
			*/
			function actualizar(){}

			/*
			* Método generico para eliminar registros en la base de datos
			*/
			function borrar($tabla,$parametros){
				$sql='delete from '.$tabla.' where ';
				$where='';
				$i=0;
				foreach ($parametros as $key => $value) {
					if ($i!=0) {
						$where=$where.' and '.$key.'=:'.$key;
					}else{
						$where=$key.'=:'.$key;
					}
					$i++;
				}
				$sql=$sql.$where;
				try{
					$statement=$this->conexion->prepare($sql);
					foreach ($parametros as $key => $value) {
						$statement->bindParam(':'.$key,$value);
					}
					return $statement->execute();
				}catch (PDOException $e) {
					print "¡Error!: " . $e->getMessage() . "<br/>";
					die();
				}
			}// Funcion Borrar

		}// Class Abarrotera

	}// if(include_once)
	$abarrotera= new Abarrotera;
?>