<?php 
	require_once ("../require/class.php");
	
	class tipo_junta {
		private $_conexion;
		private $_cod_tipo;
		
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
	
	}
	
?>