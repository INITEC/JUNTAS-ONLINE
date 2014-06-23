<?php
$cod_junta = $_GET["dato"];
require_once ("../require/participantes_class.php");

$participantes = new participantes($cod_junta);

?>	
<link href="../Estilos/tareas_estilo.css" type="text/css" rel="stylesheet" >
<html>
			<div >
				<table align="center">
					<tr style="background-color:white;" align="center" >
						<?php 		
						$participantes->mostrar_fotos();
						?>
					</tr>
					<tr id="tabla1_informacion" align="center">	
						<?php 		
						$participantes->mostrar_nombres();
						?>
					</tr>
				</table>	
			</div>
</html>
