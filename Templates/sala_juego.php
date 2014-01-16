<?php
require_once ("../require/class.php");

	
	
	$cod_cliente = 1;   	
	$cod_junta=1;
	$junta = new junta($cod_junta);
	$participantes = new participantes($cod_cliente, $cod_junta);

	$self = $_SERVER['PHP_SELF'];
	header("refresh:10; url=$self"); // refresca la pantalla cada 10 seg


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
		<div align="center" >
				<table >
					<tr>
						<?php 		
						$participantes->mostrar_fotos();
						?>
					</tr>
					<tr align="center">	
						<?php 		
						$participantes->mostrar_nombres();
						?>
					</tr>
				</table>
		</div>
		<div align="center">
		<form action="sorteo.php" method="POST" name="form">
			<input type="hidden" name="cod_junta" value="<?php echo $cod_junta;?>">
			<input type="submit" name="Empezar" title="Empezar" value="Empezar">
		</form>
		</div>
		<?php 
		
			if($participantes->_numero == $junta->numero_participantes()) {
					echo "<script type='text/javascript' language='javascript' >
					alert ('La sala esta llena ... ya podemos pasar a la sala de sorteo');
					</script>";	
			}
		
		?>

</body>
</html>