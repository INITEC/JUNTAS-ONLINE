<?php 

require_once ("../require/conexion_class.php");

class historial {	private $_cod_junta;
						private $_periodo_actual;
						private $_datos;
						public function __construct($cod_junta, $periodo_actual) {
							$this->_periodo_actual = $periodo_actual;
							$this->_cod_junta = $cod_junta;
							
						}
						public function mostrar_ganadores() {
							$datos_historial = new conexion();
							$sql="select * from tabla_x,cliente where tabla_x.cod_junta=".$this->_cod_junta." 
							AND tabla_x.puesto<=".$this->_periodo_actual." AND tabla_x.cod_cliente = cliente.cod_cliente ";
							$datos_historial->ejecutar_sentencia($sql);
							while($this->_datos = $datos_historial->retornar_array()) {
								echo $this->_datos["user"];
								echo "<br>";
							}
						}
						public function mostrar_en_espera() {
							$datos_historial = new conexion();
							$sql="select * from tabla_x,cliente where tabla_x.cod_junta=".$this->_cod_junta." 
							AND tabla_x.puesto>".$this->_periodo_actual." AND tabla_x.cod_cliente = cliente.cod_cliente ";
							$datos_historial->ejecutar_sentencia($sql);
							while($this->_datos = $datos_historial->retornar_array()) {
								echo $this->_datos["user"];
								echo "<br>";
							}							
						}
}

?>