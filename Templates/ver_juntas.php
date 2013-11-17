
<html>
<head>
<title>..>>Juntas Online<<..</title>
<link href="css/estilos.css" type="text/css" rel="stylesheet" >
</head>
<?php
$cod_cliente = 1;
$cod_junta = 1;
$cliente = new cliente($cod_cliente);
$junta = new junta($cod_junta);
$participantes = new participantes($cod_cliente, $cod_junta);
$historial = new historial($cod_junta,$junta->periodo_actual());
$transaccion = new transacciones($cod_junta);
?>
<body style="background-color:#88A6DC">

	<div id="contenedor">
		<div id="cabecera_ob">
			<?php
			$cliente->cabecera_cliente();
			?>
		</div>		
		<div>
		<br>
		<div style="background-color:#88A6DC" align="center">
		<h1><b>CUSTOMERS</b></h1>		
		</div>
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
		<div id="cuerpo_tr" >	<!-- seccion del cuerpo -->
			<div id="izquierda" style="background-color:#FFFFFF">	<!-- seccion del menu -->
				<div>
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
				</div>
			</div>		
				<div id="centro" >	<!-- seccion de la presentacion -->
					<table>
						<tr>
							<h1 align="center">JUNTAS ONLINE</h1>
						</tr>				
					</table>				
				</div>
			<div id="derecha">	<!-- seccion del menu -->
				<div>
						<h1><font color="#FFFFFF"><?php echo $cliente->_datos["user"]?></font></h1>	
				</div>
				<div>
						<img src="fotos/<?php echo $cliente->ver_foto();?>" height="100px" align="center">
				</div>
				<div>
						Monto Total: <?php echo $junta->_datos["monto_t"];?>
				</div>
				<div>
						Numero de Periodos: <?php echo $junta->numero_periodos();?> 
				</div>
				<div>
						Periodo Actual: <?php echo $junta->periodo_actual();?> 
				</div>
			</div>	
		</div>
	</div>
</body>
</html>
