<?php
session_start();

require_once ("3_ver_junta_include/carga_informacion.php");

?>
<html>
	<head>
		<title>..>>Juntas Online<<..</title>
		<link href="3_css_ver_junta.css" type="text/css" rel="stylesheet" >
		<script type="text/javascript" src="../JavaScript/ajax_refreshDivs_1.js"></script>
		<script type="text/javascript" src="../JavaScript/ajax_refreshDivs_2.js"></script>
		<script type="text/javascript" src="3_js_ver_junta.js"></script>
		<script type="text/javascript" >
			window.onload = function startrefresh(){
			refreshDivs_1('ListaParticipantes',1,'ListaParticipantes.php','<?php echo $cod_junta;?>');
			refreshDivs_2('HistorialJunta',5,'HistorialJunta.php','<?php echo $cod_junta; ?>', '<?php echo $periodo_actual; ?>');
			}
		</script>
	</head>
	<body style="background-color:#88A6DC">
		<div id="contenedor">
			<div id="cabecera">
				<?php include ('../includes/menu_cabecera.php');?>
			</div>		
			<div>
			<br>
			<div style="background-color:#88A6DC" align="center">
			<h1><b>CUSTOMERS</b></h1>		
			</div>
			<div id="ListaParticipantes" >
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
					<div id="HistorialJunta" >
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
					<div style="color:#FFFFFF;">
							Monto Total: <?php echo $tipo_junta->monto_t();?>
					</div>
					<div style="color:#FFFFFF;">
							Numero de Periodos: <?php echo $tipo_junta->numero_periodos();?> 
					</div>
					<div style="color:#FFFFFF;">
							Periodo Actual: <?php echo $tipo_junta->periodo_actual($junta->fecha_inicio());?> 
					</div>
				</div>	
			</div>
		</div>
	</body>
</html>
