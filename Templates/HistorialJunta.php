<?php 
require_once ("../require/historial_class.php");
require_once ("../require/transacciones_class.php");

$cod_junta = $_GET["dato1"];
$periodo_actual = $_GET["dato2"];

$historial = new historial($cod_junta,$periodo_actual);
$transaccion = new transacciones($cod_junta);
?>
	<h1>HISTORIAL</h1>
	<hr>
	<h2>GANADORES</h2>
	<hr>					
	<div>
		<?php $historial->mostrar_ganadores();?>
	</div>
	<hr>
	<h2>EN ESPERA</h2>
	<hr>					
	<div>
		<?php $historial->mostrar_en_espera();?>
	</div>
	<hr>
	<h2>TRANSACCIONES</h2>
	<hr>
	<div>
		<?php $transaccion->mostrar_transacciones(); ?>
	</div>
