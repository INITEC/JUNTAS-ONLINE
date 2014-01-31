<?php 

require_once ("../require/conexion_class.php");

class junta {	
					private $_datos = array();
					private $dia;
					private $mes;
					private $year;
					public function __construct ($cod_junta){
						$datos_junta = new conexion();
						$datos_junta->ejecutar_sentencia("select * from junta where cod_junta=".$cod_junta);
						$this->_datos = $datos_junta->retornar_array();
						}
					public function cambiar_estado($estado) {
						$conexion = new conexion();
						$sql = "UPDATE `junta` SET `estado`='1' WHERE `cod_junta`='".$this->_datos["cod_junta"]."'";	
						return $conexion->ejecutar_sentencia($sql);
					}
					public function cod_tipo () {
						return $this->_datos["cod_tipo"];
					}
					public function fecha_inicio(){
						return $this->_datos["fecha_ini"];
					}				
				}
			
?>