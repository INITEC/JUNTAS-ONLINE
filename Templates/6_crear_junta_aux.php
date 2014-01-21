<?php
session_start();
require_once ("../require/conexion_class.php");
$cod_cliente = $_SESSION["cod_cliente"];
$monto_t = $_POST["monto"];
$tiempo_t = $_POST["participantes"];
$frec_pago = $_POST["frecuencia"];
$envio = new conexion();
$sentencia = "INSERT INTO `junta`(`cod_junta`, `monto_t`, `tiempo_t`, `frec_pago`, `estado`, `fecha_ini`, `cod_cliente`) 
					VALUES (null, ".$monto_t.", ".$tiempo_t.", ".$frec_pago.", 'activo', now(), ".$cod_cliente.")";

if($res=$envio->ejecutar_sentencia($sentencia)) {
	$sentencia = "select cod_junta from junta  order by cod_junta desc limit 1";
	$envio->ejecutar_sentencia($sentencia);
	$cod_junta = $envio->retornar_array();				
		?>
		<html>
		<body>
			<form action="3_ver_junta.php" method="post" name="form" >
				<input type="hidden" name="cod_junta" value="<?php echo $cod_junta['cod_junta']; ?>" >
			</form>
		</body>
		</html>
		<?php 
	
	echo "<script type='text/javascript' language='javascript' >
	alert ('La junta fue creada exitosamente!!!');
	document.form.submit();
	</script>";
	}
else {
	echo "<script type='text/javascript' language='javascript' >
	alert ('La junta no se creo, vuelva a intentarlo');
			history.back();
	</script>";
	}
?>