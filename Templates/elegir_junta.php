<?php
	session_start();
	require_once ("../require/tipo_junta_class.php");
	
	$tipo = new tipo_junta();
	
?>

<html>
	<head>
		<title>..::Todas las Juntas::..</title>
	</head>
	<body>
			<table>
				<tr>
					<td>
						Num
					</td>
					<td>
						Monto
					</td>
					<td>
						Tiempo
					</td>
					<td>
						Entrar
					</td>
				</tr>
				<?php 
					$tipo->select_tipo();
					$cont = 1;
					while ($lista = $tipo->return_tipos()){
						?>
							<form action="inscripcion_junta.php" name="form<?php echo $lista['cod_tipo'];?>" method="post">
							<tr>
								<td>
									<?php echo $cont; $cont++;?>
								</td>
								<td>
									<?php echo $lista["monto_t"];?>
								</td>
								<td>
									<?php echo $lista["tiempo_t"];?>
								</td>
								<td>
									<input type="submit" value="elegir" title="elegir">
									<input type="hidden" value="<?php echo $lista['cod_tipo']?>" name="cod_tipo">
								</td>
							</tr>	
							</form>		
						<?php
					}
				?>
			</table>
	</body>

</html>