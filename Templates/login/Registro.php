<?php
require_once ('CLIENTE.php');
require_once ('conexion.php');

$c1 = new conexion();
$c1->construct('amanecida');
$sql = "select * from cliente";
$res = mysql_query($sql,$c1->get_conex());
?>

<form action="Registro.php" name="form" method="post">
<div id="texto_1" ><h2>INGRESE SUS DATOS</h2></div> 
<div id="texto_1" >NOMBRE</div>
<div align="center" valign="center" ><input type="text" name="nombre" ></div>
<div id="div_nombre" align="center" style=" background-color:#CDE8F3; color:#FF0000" ></div> 
<br>
<div id="texto_1" >CORREO</div>
<div align="center" valign="center" ><input type="text" name="correo" ></div>
<div id="div_correo" align="center" style="background-color:#CDE8F3; color:#FF0000" ></div>
<br>
<div id="texto_1" >NUMERO DE TARJETA</div>
<div align="center" valign="center" ><input type="text" name="numero" ></div>
<div id="div_numero" align="center" style="background-color:#CDE8F3; color:#FF0000" ></div>
<br>
<div id="texto_1" >USER</div>
<div align="center" valign="center" ><input type="text" name="user" ></div>
<div id="div_user" align="center" style="background-color:#CDE8F3; color:#FF0000" ></div>
<br>
<div id="texto_1" >PASS</div>
<div align="center" valign="center" ><input type="password" name="pass" ></div>
<div id="div_pass" align="center" style="background-color:#CDE8F3; color:#FF0000" ></div>
<br>
<input type="submit" value="Registrarse" title="Login"> 
</form>

<?php
$nombreX=$_POST["nombre"];
$correoX=$_POST["correo"];
$numeroX=$_POST["numero"];
$userX=$_POST["user"];
$passX=$_POST["pass"];
$cond1=false;
$cond2=false;

if ($userX!=null&&$correoX!=null&&$numeroX!=null&&$userX!=null&&$passX!=null){
	while($reg=mysql_fetch_array($res)){
	if(strcmp($nombreX,$reg["nombre"])==0){

	}else {
		if(strcmp($correoX,$reg["correo"])==0){

		}else {
			if($numeroX==$reg["num_tarj"]){

			}else {
				if(strcmp($userX,$reg["user"])==0){

				}else {
					$cond1=true;
				}
			}
		}
	}
	
}
	
	if($cond1){
		echo "<script type='text/javascript' language='javascript' >
		alert ('REGISTRADO CORRECTAMENTE');
		</script>";
		$cond2=true;
	}else{
		echo "<script type='text/javascript' language='javascript' >
		alert ('ERROR, DATOS NO VALIDOS (los valores ingresados ya existen)');
		</script>";
		$cond2=false;
	}
	
}else{
	echo "<script type='text/javascript' language='javascript' >
		alert ('NO DEJE ESPACIOS EN BLANCO');
		</script>";
}

if($cond2){
$sql2 = "insert CLIENTE values (1234,'".$nombreX."','".$correoX."','".$numeroX."','".$userX."','".$passX."')";
$res2 = mysql_query($sql2,$c1->get_conex());

}
?>
