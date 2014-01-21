<?php
session_start();
require_once ("../require/cliente_class.php");
require_once ("../require/junta_class.php");
require_once ("../require/participantes_class.php");
require_once ("../require/historial_class.php");
require_once ("../require/transacciones_class.php");
require_once ("../require/sorteo_class.php");
require_once ("../require/tipo_junta_class.php");
?>

<?php

$cod_cliente = $_SESSION["cod_cliente"];
$cod_junta = $_SESSION["cod_junta"];
$cliente = new cliente($cod_cliente);
$junta = new junta($cod_junta);
$tipo_junta = new tipo_junta();
$tipo_junta->establecer_tipo($junta->cod_tipo());
$num_participantes = $tipo_junta->numero_participantes();
$participantes = new participantes($cod_cliente, $cod_junta);
$historial = new historial($cod_junta,$junta->periodo_actual());
$transaccion = new transacciones($cod_junta);
$sorteo = new sorteo($cod_junta,$num_participantes);

			$self = $_SERVER['PHP_SELF'];
			header("refresh:10; url=$self"); // refresca la pantalla cada 10 seg
			
?>
<html>
	<head>
		<title>..>>Juntas Online<<..</title>
		<link href="../Estilos/estilos.css" type="text/css" rel="stylesheet" >
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
							<img src="<?php echo $cliente->ver_foto();?>" height="100px" align="center">
					</div>
					<div>
							Monto Total: <?php echo $tipo_junta->monto_t();?>
					</div>
					<div>
							Numero de Periodos: <?php echo $tipo_junta->numero_periodos();?> 
					</div>
					<div>
							Periodo Actual: <?php echo $junta->periodo_actual();?> 
					</div>
				</div>	
			</div>
		</div>
	</body>
</html>
