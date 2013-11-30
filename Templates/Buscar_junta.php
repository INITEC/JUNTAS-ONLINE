<?php 
require_once ("../require/class.php");
?>

<?php 
$textj = $_POST["TextJunta"];

$envio = new conexion();
$sentencia = "SELECT cod_junta,monto_t,tiempo_t,frec_pago,estado,fecha_ini from junta where cod_junta=".$textj;


	$envio->ejecutar_sentencia($sentencia);
	$cod_junta = $envio->retornar_array();	
	echo $cod_junta["cod_junta"];
	echo $cod_junta["monto_t"];
	echo $cod_junta["tiempo_t"];
	echo $cod_junta["frec_pago"];
	echo $cod_junta["estado"];
	echo $cod_junta["fecha_ini"];

	?>	
    
    		
		