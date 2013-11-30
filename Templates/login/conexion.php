<?php
class conexion {
	
	private $conex;
	private $base_datos;
	
  public function construct($nom_bd)
  {
    $this->conex=mysql_connect('localhost','root','');
    $this->base_datos=mysql_select_db($nom_bd);
  }
  
  public function get_conex(){
  	return  $this->conex;
  }
  
  public function get_base_datos(){
  	return $this->base_datos;
  }

}

?>