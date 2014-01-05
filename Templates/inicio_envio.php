<?php
session_start();

require_once ("../require/inicio_class.php");

$inicio = new inicio();
$tipo = $_POST["tipo"];

	if(strcmp($tipo,"REGISTRO")==0) {
		$nombre = $_POST["nombre"];
		$num_tarjeta = $_POST["num_tarjeta"];
		$user = $_POST["user"];
		$pass = $_POST["pass_1"];
		
		if($inicio->enviar_registro ($nombre,$num_tarjeta,$user,$pass)){
			echo "<script type='text/javascript' language='javascript' >
			alert ('El registro se realizo correctamente, gracias por unirse ".$nombre."');
			</script>";
			header("Location: PlantillaBase.php");
		}
		else {
			echo "<script type='text/javascript' language='javascript' >
			alert ('No se logro registrar, porfavor intentelo de nuevo');
			history.back();
			</script>";
		}
	}

	if(strcmp($tipo,"LOGIN") == 0) {
		$user = $_POST["user"];
		$pass = $_POST["pass"];
		
		if($inicio->verificar_usuario($user,$pass) == true ) {
			$_SESSION["cod_cliente"] = $inicio->cod_cliente();
			header("Location: PlantillaBase.php");
		}
		else {
			echo "<script type='text/javascript' language='javascript' >
			alert ('Datos no validos');
			history.back();
			</script>";
		}
	}


?>