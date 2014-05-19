<?php
class CLIENTE {

  private $cod_cliente;
  private $nombre;
  private $correo;
  private $num_tarj;
  private $user;
  private $pass;

  public function constructor($cod_clienteX,$nombreX,$correoX,$num_tarjX,$userX,$passX)
  {
    $this->cod_cliente=$cod_clienteX;
    $this->nombre=$nombreX;
    $this->correo=$correoX;
    $this->num_tarj=$num_tarjX;
    $this->user=$userX;
    $this->pass=$passX;
  }
  
  public function get_cod_cliente()
  {
    return $this->cod_cliente;
  }
  
  public function get_nombre()
  {
  	return $this->nombre;
  }
  
  public function get_correo()
  {
  	return $this->correo;
  }
  
  public function get_num_tarj()
  {
  	return $this->num_tarj;
  }
  
  public function get_user()
  {
  	return $this->user;
  }
  
  public function get_pass()
  {
  	return $this->pass;
  }
  
  
}

?>