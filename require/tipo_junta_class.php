<?php 
	require_once ("../require/conexion_class.php");
	
	class tipo_junta {
		private $_conexion;
		private $_cod_tipo;
		private $_datos;
		private $dia;
		private $mes;
		private $year;
		
		public function __construct (){
			$this->_conexion = new conexion();
		}
		public function crear_tipo($monto_t, $tiempo_t, $frec_pago, $tipo_estado) {
			$sql = "INSERT INTO `tipo_junta` (`cod_tipo`, `monto_t`, `tiempo_t`, `frec_pago`, `tipo_estado`) 
						VALUES (null, '".$monto_t."', '".$tiempo_t."', '".$frec_pago."', '".$tipo_estado."')";
			$this->_conexion->ejecutar_sentencia($sql);
		}
	
		public function select_tipo(){
			$sql = "SELECT * FROM tipo_junta WHERE tipo_estado='1'";
			$this->_conexion->ejecutar_sentencia($sql);
		}
	
		public function return_tipos (){
			return $this->_conexion->retornar_array();
		}
		public function establecer_tipo ($cod_tipo) {
			date_default_timezone_set('America/Los_Angeles');
			$this->dia = date(d);
			$this->mes = date(n);
			$this->year = date(Y);			
			$sql = "SELECT * FROM tipo_junta WHERE cod_tipo='".$cod_tipo."'";
			$this->_conexion->ejecutar_sentencia($sql);
			$this->_datos = $this->_conexion->retornar_array();
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
		public function monto_t (){
			return $this->_datos["monto_t"];
		}
		public function periodo_actual ($fecha_junta) {
			preg_match('/(\d{4})-(\d{2})-(\d{2})/',$fecha_junta,$fecha_inicio);
			return (($this->year - $fecha_inicio[1])*12 + ($this->mes - $fecha_inicio[2]))/$this->_datos["frec_pago"];
		}	
	
	}
	
?>