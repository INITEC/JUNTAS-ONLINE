<?php 

require_once ("../require/conexion_class.php");

class participantes {
								public $_datos = array();
								public $_numero;
								private $_conexion;
								private $_sql;
								public function __construct ($cod_junta){
									$this->_conexion = new conexion();
									$this->_sql = "select * from cliente,tabla_x 
									where tabla_x.cod_junta='".$cod_junta."' 
									AND cliente.cod_cliente=tabla_x.cod_cliente order by puesto asc";
									$this->_conexion->ejecutar_sentencia($this->_sql);
									$this->_datos = $this->_conexion->retornar_array();
									$this->_numero = $this->_conexion->tam_respuesta();
								}
								public function mostrar_fotos() {
									$this->_conexion->ejecutar_sentencia($this->_sql);
									while($this->_datos = $this->_conexion->retornar_array()) {
									?>
										<td>
											<img src="../Imagenes/fotos_perfil/<?php echo $this->_datos['foto'];?>.jpg" height="90px" align="center">
										</td>
									<?php
									}
								}
								public function mostrar_nombres() {
									$this->_conexion->ejecutar_sentencia($this->_sql);
									while($this->_datos = $this->_conexion->retornar_array()) {
									?>
										<td>
											<?php echo $this->_datos["nombre"];?>
										</td>
									<?php
									}
								}
								public function num_participantes_actuales() {
									return $this->_numero;
								}	
							}


?>