<?php 
	require_once ("../require/class.php");
	require_once ("../require/tabla_x_class.php");

	class junta_vista {
		private $_conexion;
		private $_cod_tipo;
		private $_cod_cliente;
		private $_junta;
		private $_tabla_x;
		
		public function __construct ($cod_cliente,$cod_tipo){
			$this->_cod_tipo = $cod_tipo;
			$this->_cod_cliente = $cod_cliente;
			$this->_conexion = new conexion();
			$this->_tabla_x = new tabla_x();
		}
		
		public function entrar_junta (){
			$sql = "SELECT * FROM tipo_junta WHERE cod_tipo='".$this->_cod_tipo."'";
			$this->_conexion->ejecutar_sentencia($sql);
			$dato_tipo = $this->_conexion->retornar_array();
			$sql = "SELECT cod_junta,monto_t,tiempo_t,frec_pago,estado FROM junta WHERE
					  monto_t='".$dato_tipo["monto_t"]."' AND tiempo_t='".$dato_tipo["tiempo_t"]."' AND
					  frec_pago='".$dato_tipo["frec_pago"]."' AND estado='0' LIMIT 1 ";
			$this->_conexion->ejecutar_sentencia($sql);
			$dato_junta = $this->_conexion->retornar_array();
			$cod_junta = $dato_junta["cod_junta"];
			$this->_junta = new junta($cod_junta);
			$tam = $this->_tabla_x->num_inscritos($cod_junta);
			if($tam < $this->_junta->numero_participantes()) {
				$this->_tabla_x->inscribir($this->_cod_cliente,$cod_junta);
				return $cod_junta;
			} elseif ($tam = $this->junta->numero_participantes()){
				$this->_junta->cambiar_estado(1);
				$tam = $this->_tabla_x->num_inscritos($cod_junta);
				if($tam = $this->_junta->numero_participantes()) {
					$this->_tabla_x->inscribir($this->_cod_cliente,$cod_junta);
					/*creando nueva junta ...*/
					$sql = "INSERT INTO `junta` (`cod_junta`, `monto_t`, `tiempo_t`, `frec_pago`, `estado`, `fecha_ini`)
							  VALUES (null, '".$dato_tipo["monto_t"]."', '".$dato_tipo["tiempo_t"]."', '".$dato_tipo["frec_pago"]."',
							  '0', now())";
					$this->_conexion->ejecutar_sentencia($sql);
					return $cod_junta;
				}
				else {
					$this->entrar_junta();
				}
			}elseif ($tam > $this->_junta->numero_participantes()) {
				$this->entrar_junta();
			}
		}
	}


?>