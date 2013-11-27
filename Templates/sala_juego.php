<?php
require_once ("../require/class.php");

	//$cod_junta=$_POST["cod_junta"];
	$cod_junta=3;
	$junta = new junta($cod_junta);
?>

<html>
<head>
<title>Junta N<?php echo $junta->_datos["cod_junta"];?></title>
</head>
<body>
	<h1>Datos Junta</h1>
		<hr>
<font size="2"> <b>Numero de Periodos: </b> </font> <?php echo $junta->numero_periodos();?>
<br>
<font size="2"> <b>Moto total: </b> </font> <?php echo $junta->_datos["monto_t"];?>
<br>
<font size="2"> <b>Cuota por periodo: </b> </font> <?php echo $junta->cantidad_cuota();?>
<br>
<font size="2"> <b>Frecuencia de pagos: </b> </font> <?php echo $junta->frecuencia_pago();?>
<br>
<font size="2"> <b>Numero de participantes: </b> </font> <?php echo $junta->numero_participantes();?>
<hr>



</body>
</html>