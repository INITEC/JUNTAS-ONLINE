<?php
	require_once ("../require/conexion_class.php");
	
class sorteo {
	
	private $_conexion;
	private $_cod_junta;
	private $_num_participantes;
	private $_lista = array();
	
	public function __construct ($cod_junta,$num_participantes) {
		$this->_conexion = new conexion();
		$this->_cod_junta = $cod_junta;
		$this->_num_participantes = $num_participantes;
	}

	public function establecer_posiciones() {
		srand(time());
		$this->_lista[0] = rand(1,$this->_num_participantes);
		for($i=1;$i < $this->_num_participantes;$i++) {
				$verificacion = false;
				while($verificacion == false) {
					$verificacion = true;
					$this->_lista[$i] = rand(1,$this->_num_participantes);
					for($j=0;$j<$i;$j++) {
						if($this->_lista[$j] == $this->_lista[$i] ) {
							$verificacion = false;}
						}
				}
			}
	}

	public function guardar_posiciones (){
		$sql = "SELECT * FROM tabla_x where cod_junta='".$this->_cod_junta."' ";
		$this->_conexion->ejecutar_sentencia($sql);
		$cont=0;
		$guardar = new conexion();
		while($reg = $this->_conexion->retornar_array()) {			
			$sql = "UPDATE `tabla_x` SET `puesto`='".$this->_lista[$cont]."' 
					  WHERE `cod_junta`='".$this->_cod_junta."' AND `cod_cliente`='".$reg["cod_cliente"]."'" ;
			$guardar->ejecutar_sentencia($sql);
			$cont++;
		}
		$sql = "UPDATE `junta` SET `estado`='2' WHERE `cod_junta`='".$this->_cod_junta."'";	
		$guardar->ejecutar_sentencia($sql);
	}			
	
	public function estado_sorteo(){
		$sql = "SELECT cod_junta,estado FROM junta WHERE cod_junta='".$this->_cod_junta."'";
		$this->_conexion->ejecutar_sentencia($sql);
		$resultado = $this->_conexion->retornar_array();
		return $resultado["estado"];
	}
}	

?>