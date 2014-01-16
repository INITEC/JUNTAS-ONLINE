<?php 
	require_once ("../require/sorteo_class.php");
	require_once ("../require/class.php");
	$cod_cliente = $_SESSION["cod_cliente"];
	$cod_junta = 1;
	$num_participantes = 3;
	$participantes = new participantes($cod_cliente, $cod_junta);
	$sorteo = new realizar_sorteo($cod_junta,$num_participantes);
	if($participantes->num_participantes_actuales() == $num_participantes ) {
		if($sorteo->estado_sorteo() == 0  ) {
			$sorteo->establecer_posiciones();
			$sorteo->guardar_posiciones();
		}
		else { echo "Ya se sorteo";}
	}
	else {echo "Aun faltan integrantes para sortear";}

?>

<html>
	<head>
		<title>..::SORTEO::..</title>
	</head>
	<body>
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
	</body>
</html>