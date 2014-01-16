<?php
class conexion {
	
	private $_conexion;
	private $_base_datos;
	private $_sql;
	private $_result;	
	
	public function __construct () {
		$this->_conexion = mysql_connect("sql207.redwebmaster.com.ar", "redwe_14057894", "initec");
		$this->_base_datos = mysql_select_db("juntas");	
	} 
	public function ejecutar_sentencia ($sql) {
		$this->_sql = $sql;
		return ($this->_result = mysql_query($this->_sql , $this->_conexion));
	}

	public function retornar_array() {
		return mysql_fetch_array($this->_result);
	}
	public function tam_respuesta() {
		return mysql_num_rows($this->_result);
	}
}

class cliente {
		public $_datos = array();
		public function __construct ($cod_cliente) {
			$datos_cliente = new conexion();
			$datos_cliente->ejecutar_sentencia("select * from cliente where cod_cliente=".$cod_cliente);
			$this->_datos = $datos_cliente->retornar_array();
		}
		public function ver_foto() {
				return "../Imagenes/avatar.jpg";
		}
		public function ver_codigo() {
				return $this->_datos["cod_cliente"];
		}
		public function cabecera_cliente () {
			?>
			<img src="<?php echo $this->ver_foto();?>" height="70px" align="right">
			<?php		
		}

} 


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
					public function numero_periodos () {
						return $this->_datos["tiempo_t"]/$this->_datos["frec_pago"];
					}
					public function numero_participantes() {
						return $this->_datos["tiempo_t"]/$this->_datos["frec_pago"];
					}
					public function cantidad_cuota() {
						$numero_periodos = $this->numero_periodos();
						$monto_total = $this->_datos["monto_t"];
						return $monto_total/$numero_periodos;
					}
					public function frecuencia_pago() {
						if($this->_datos["frec_pago"]==1) {return "mensual";}
						if($this->_datos["frec_pago"]==2) {return "quincenal";}
						}
					public function cambiar_estado($estado) {
						$conexion = new conexion();
						$sql = "UPDATE `junta` SET `estado`='1' WHERE `cod_junta`='".$this->_datos["cod_junta"]."'";	
						return $conexion->ejecutar_sentencia($sql);
					}				
				}

class participantes {
								public $_datos = array();
								public $_numero;
								private $_conexion;
								private $_sql;
								public function __construct ($cod_cliente , $cod_junta){
									$this->_conexion = new conexion();
									$this->_sql = "select * from cliente,tabla_x 
									where tabla_x.cod_junta=".$cod_junta." 
									AND cliente.cod_cliente=tabla_x.cod_cliente order by puesto asc";
									$this->_conexion->ejecutar_sentencia($this->_sql);
									$this->_datos = $this->_conexion->retornar_array();
									$this->_numero = $this->_conexion->tam_respuesta();
								}
								public function mostrar_fotos() {
									$this->_conexion->ejecutar_sentencia($this->_sql);
									while($this->_conexion->retornar_array()) {
									?>
										<td>
											<img src="../Imagenes/<?php echo "avatar.jpg";?>" height="90px" align="right">
										</td>
									<?php
									}
								}
								public function mostrar_nombres() {
									$this->_conexion->ejecutar_sentencia($this->_sql);
									while($this->_datos = $this->_conexion->retornar_array()) {
									?>
										<td>
											<?php echo $this->_datos["user"];?>
										</td>
									<?php
									}
								}
								public function num_participantes_actuales() {
									return $this->_numero;
								}	
							}

class historial {	private $_cod_junta;
						private $_periodo_actual;
						private $_datos;
						public function __construct($cod_junta, $periodo_actual) {
							$this->_periodo_actual = $periodo_actual;
							$this->_cod_junta = $cod_junta;
							
						}
						public function mostrar_ganadores() {
							$datos_historial = new conexion();
							$sql="select * from tabla_x,cliente where tabla_x.cod_junta=".$this->_cod_junta." AND tabla_x.puesto<".$this->_periodo_actual." AND tabla_x.cod_cliente = cliente.cod_cliente ";
							$datos_historial->ejecutar_sentencia($sql);
							while($this->_datos = $datos_historial->retornar_array()) {
								echo $this->_datos["user"];
								echo "<br>";
							}
						}
						public function mostrar_en_espera() {
							$datos_historial = new conexion();
							$sql="select * from tabla_x,cliente where tabla_x.cod_junta=".$this->_cod_junta." AND tabla_x.puesto>".$this->_periodo_actual." AND tabla_x.cod_cliente = cliente.cod_cliente ";
							$datos_historial->ejecutar_sentencia($sql);
							while($this->_datos = $datos_historial->retornar_array()) {
								echo $this->_datos["user"];
								echo "<br>";
							}							
						}

}

class transacciones {
							private $_cod_junta;
							private $_datos;
							private $_transacciones_total;
							public function __construct ($cod_junta){
								$this->_cod_junta = $cod_junta;
							}
							public function mostrar_transacciones() {
								$datos_transaccion = new conexion();
								$sql = "select * from tabla_y where cod_junta=".$this->_cod_junta;
								$datos_transaccion->ejecutar_sentencia($sql);
								while($this->_datos = $datos_transaccion->retornar_array()) {
								echo $this->retornar_jugador($this->_datos["cod_cliente1"]);
								echo " pago a ";
								echo $this->retornar_jugador($this->_datos["cod_cliente2"]);
								echo " ==> ";
								echo $this->_datos["transacciones"];
								echo "<br>";							}
								
							}
							public function retornar_jugador($cod_cliente) {
								$dato = new conexion();
								$sql = "select * from cliente where cod_cliente=".$cod_cliente;
								$dato->ejecutar_sentencia($sql);
								$reg = $dato->retornar_array();
								return $reg["user"];
								}
}				

class sorteo {
					private $_cod_cliente;
					private $cod_junta;
					public $_posicion;
					private $_num_participantes;
					
					public function __construct($cod_cliente,$cod_junta,$num_participantes) {
							$this->_cod_cliente = $cod_cliente;
							$this->_cod_junta = $cod_junta;
					}
					
					public function dar_numero() {
							$conexion = new conexion();
							srand(time());
							$sentencia = "select * from tabla_x where cod_cliente=".$cod_cliente." and cod_junta=".$cod_junta." ";
							$conexion->ejecutar_sentencia($sentencia);
							if($conexion->tam_respuesta() == 0) {
								
								$_posicion = rand(1, $this->_num_participantes);
	
								
								$sentencia = "INSERT INTO `tabla_x`(`id_tabla_x`, `cod_cliente`, `cod_junta`, `puesto`)
													 VALUES ()";			
							}
					}
}
						
?>

