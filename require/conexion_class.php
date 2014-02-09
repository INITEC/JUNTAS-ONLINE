<?php

class conexion {
	
	private $_conexion;
	private $_base_datos;
	private $_sql;
	private $_result;	
	
	public function __construct () {
		$this->_conexion = mysql_connect("sql207.redwebmaster.com.ar", "redwe_14057894", "initec");
		/*$this->_conexion = mysql_connect("localhost", "root", "jibf123");*/
		/*$this->_conexion = mysql_connect("", "root", "jibf123");*/
		$this->_base_datos = mysql_select_db("juntas");	
		
	} 
	public function ejecutar_sentencia ($sql) {
		$this->_sql = $sql;
		return ($this->_result = mysql_query($this->_sql , $this->_conexion));
	}

	public function retornar_array() {
		return mysql_fetch_array($this->_result);
	}
	public function tam_respuesta() {
		return mysql_num_rows($this->_result);
	}
}
						
?>

