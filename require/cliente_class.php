<?php 

require_once ("../require/conexion_class.php");

class cliente {
		public $_datos = array();
		public function __construct ($cod_cliente) {
			$datos_cliente = new conexion();
			$datos_cliente->ejecutar_sentencia("select * from cliente where cod_cliente=".$cod_cliente);
			$this->_datos = $datos_cliente->retornar_array();
		}
		public function ver_foto() {
				return "../Imagenes/fotos_perfil/".$this->_datos["foto"].".jpg";
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

?>