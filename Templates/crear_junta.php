<?php 
require_once("../require/func_formulario.php");
?>

<html>
<head>
<title>>>Nueva Junta<<</title>

<body>
	<h1>Creando Nueva Junta</h1>
		<hr>
	<form action="crear_junta_enviar.php" method="POST" name="junta_nueva" >
		<div align="center" name="Monto">
			<h2>Monto Total</h2> 
			<?php radio_button("monto",300,900,300); ?>
		</div>
		<div align="center" name="Participantes" >
			<h2>Cantidad de Participantes</h2>
			<?php radio_button("participantes", 6,12,3); ?>
		</div>
		<div align="center" name="frecuencia" >
			<h2>Frecuencia de pago</h2>
			<input type="radio" name="frecuencia" value="1" > quincenal 
			<input type="radio" name="frecuencia" value="2" > mensual 
		</div>
		<div align="center">
				<br>
			<input type="submit" value="Crear" name="Crear">
				<hr>
		</div>
	</form>
</body>
</html>