<?php 

require_once ("../require/conexion_class.php");

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

?>