<?php 
	require_once ("../require/class.php");
	
	class tabla_x {
		private $_conexion;
		
		public function __construct (){
			$this->_conexion  = new conexion();
		}
		public function num_inscritos($cod_junta){
			$sql = "SELECT cod_junta FROM tabla_x WHERE cod_junta='".$cod_junta."'";
			$this->_conexion->ejecutar_sentencia($sql);
			return $this->_conexion->tam_respuesta();
		}
		public function inscribir ($cod_cliente,$cod_junta){
			$sql = "INSERT INTO `tabla_x` (`id_tabla_x`, `cod_cliente`, `cod_junta`) 
					  VALUES (null, '".$cod_cliente."', '".$cod_junta."')";
			return $this->_conexion->ejecutar_sentencia($sql);
		}
	}

?>