<?php
require_once ("../require/participantes_class.php");
$cod_junta = $_GET["id"];

$participantes = new participantes($cod_junta);

?>	
<html>
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
</html>