<?php 
/*datos de inicio de 3_ver_junta.php*/

require_once ("../require/cliente_class.php");
require_once ("../require/junta_class.php");
require_once ("../require/participantes_class.php");
require_once ("../require/sorteo_class.php");
require_once ("../require/tipo_junta_class.php");

$cod_cliente = $_SESSION["cod_cliente"];
/*$cod_junta = $_SESSION["cod_junta"];*/
$cod_junta = 1;
$cliente = new cliente($cod_cliente);
$junta = new junta($cod_junta);
$tipo_junta = new tipo_junta();
$tipo_junta->establecer_tipo($junta->cod_tipo());
$num_participantes = $tipo_junta->numero_participantes();
$participantes = new participantes($cod_junta);
$periodo_actual = $tipo_junta->periodo_actual($junta->fecha_inicio());
$sorteo = new sorteo($cod_junta,$num_participantes);

?>