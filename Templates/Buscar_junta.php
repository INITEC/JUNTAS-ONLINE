<?php require_once ("../require/class.php"); ?>

<?php 
$textj = $_POST["TextJunta"];
$envio = new conexion();
$sentencia = "SELECT cod_junta,monto_t,tiempo_t,frec_pago,estado,fecha_ini from junta where cod_junta=".$textj;
	$envio->ejecutar_sentencia($sentencia);
	$cod_junta = $envio->retornar_array();	
	echo "cod_junta: ".$cod_junta["cod_junta"]."<br>";
	echo "monto_t:".$cod_junta["monto_t"]."<br>";
	echo "tiempo_t:".$cod_junta["tiempo_t"]."<br>";
	echo "frec_pago:".$cod_junta["frec_pago"]."<br>";
	echo "estado:".$cod_junta["estado"]."/br";
	echo "fecha_ini:".$cod_junta["fecha_ini"]."<br>";
	
		?>	
   
    		
		