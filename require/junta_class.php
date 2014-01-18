<?php 

require_once ("../require/conexion_class.php");

class junta {	
					public $_datos = array();
					private $dia;
					private $mes;
					private $year;
					public function __construct ($cod_junta){
						$datos_junta = new conexion();
						$datos_junta->ejecutar_sentencia("select * from junta where cod_junta=".$cod_junta);
						$this->_datos = $datos_junta->retornar_array();
						date_default_timezone_set('America/Los_Angeles');
						$this->dia = date(d);
						$this->mes = date(n);
						$this->year = date(Y);
						}
					public function periodo_actual () {
						preg_match('/(\d{4})-(\d{2})-(\d{2})/',$this->_datos["fecha_ini"],$fecha_actual);
						return (($this->year - $fecha_actual[1])*12 + ($this->mes - $fecha_actual[2]))/$this->_datos["frec_pago"];
					}

					public function cambiar_estado($estado) {
						$conexion = new conexion();
						$sql = "UPDATE `junta` SET `estado`='1' WHERE `cod_junta`='".$this->_datos["cod_junta"]."'";	
						return $conexion->ejecutar_sentencia($sql);
					}
					public function cod_tipo () {
						return $this->_datos["cod_tipo"];
					}				
				}
			
?>