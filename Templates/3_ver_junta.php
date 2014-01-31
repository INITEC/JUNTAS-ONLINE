<?php
session_start();

require_once ("3_ver_junta_include/carga_informacion.php");

?>
<html>
	<head>
		<title>..>>Juntas Online<<..</title>
		<link href="../Estilos/estilos.css" type="text/css" rel="stylesheet" >
		<script type="text/javascript" languaje="javascript" src="../JavaScript/ajax_1.js"></script>
		<script type="text/javascript" languaje="javascript" >
				  var time = new Date().getTime();
				  
			     function refresh() {
			         if(new Date().getTime() - time >= 6000){ 
			             from('<?php echo $cod_junta; ?>','participantes','3_ver_junta_aux.php');
			             time = new Date().getTime();
			             }
			     }
	 	  setTimeout(refresh, 1000);
		</script>
	</head>
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
			<div >
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
			</div>
					<?php 
						if($participantes->num_participantes_actuales() == $num_participantes ) {
							if($sorteo->estado_sorteo() == 0  ) {
								$sorteo->establecer_posiciones();
								$sorteo->guardar_posiciones();
							}
							else { echo "Ya se sorteo";}
						}
						else {echo "Aun faltan integrantes para sortear";}
					?>		
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
							<img src="<?php echo $cliente->ver_foto();?>" height="100px" align="center">
					</div>
					<div>
							Monto Total: <?php echo $tipo_junta->monto_t();?>
					</div>
					<div>
							Numero de Periodos: <?php echo $tipo_junta->numero_periodos();?> 
					</div>
					<div>
							Periodo Actual: <?php echo $tipo_junta->periodo_actual($junta->fecha_inicio());?> 
					</div>
				</div>	
			</div>
		</div>
	</body>
</html>
