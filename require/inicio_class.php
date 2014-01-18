<?php 
require_once ("../require/conexion_class.php");

class inicio {

	private $_conexion;
	private $_verificacion = false;
	private $_cod_cliente;
	
	public function __construct (){
		$this->_conexion = new conexion();
	}

	public function verificar_usuario ($user,$pass){
		$sql = "SELECT user,pass,cod_cliente FROM cliente WHERE user='".$user."' AND pass='".$pass."' ";
		$this->_conexion->ejecutar_sentencia($sql);
		if($this->_conexion->tam_respuesta() == 1) { $this->_verificacion = true;
																	$this->_conexion->ejecutar_sentencia($sql);
																	$dato = $this->_conexion->retornar_array();
																	$this->_cod_cliente = $dato["cod_cliente"]; }
	   else {$this->_verificacion = false;}
		return $this->_verificacion; 	
	}
	
	public function enviar_registro ($nombre,$num_tarjeta,$user,$pass){
		$sql = "INSERT INTO `cliente`(`cod_cliente`, `nombre`, `num_tarjeta`, `user`, `pass`) VALUES (null , '".$nombre."' , '".$num_tarjeta."' , '".$user."' , '".$pass."' )";
		return $this->_conexion->ejecutar_sentencia($sql);
		}

	public function cod_cliente (){
		if($this->_verificacion == true) {
			return $this->_cod_cliente;}
		else {return 0;}
	}
}

?>

