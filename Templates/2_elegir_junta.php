<?php
	session_start();
	require_once ("../require/tipo_junta_class.php");
	require_once ("../require/cliente_class.php");
	
	$tipo = new tipo_junta();
	$cod_cliente = $_SESSION["cod_cliente"];
	$cliente = new cliente($cod_cliente);

?>

<html>
	<head>
		<title>..::Todas las Juntas::..</title>
		<link href="2_elegir_junta_include/tareas_estilo.css" type="text/css" rel="stylesheet" >
	</head>
	<body style="background-color:#88A6DC">
<div>
<?php include("../includes/menu_cabecera.php"); ?>
</div>	
	
<div align="center">	
	<h2>ELIJA SU JUNTA</h2>	
	</div>
			<table align="center">
				<tr id="tabla1_encabezado">
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
							<form action="2_elegir_junta_aux.php" name="form<?php echo $lista['cod_tipo'];?>" method="post">
							<tr id="tabla1_informacion">
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