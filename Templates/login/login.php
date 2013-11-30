<?php
require_once ('CLIENTE.php');
require_once ('conexion.php');

$c1 = new conexion();
$c1->construct('amanecida');
$sql = "select * from cliente";
$res = mysql_query($sql,$c1->get_conex());
?>

<form action="login.php" name="form" method="post">
<div id="texto_1" ><h2>INGRESO</h2></div> 
<div id="texto_1" >Usuario</div>
<div align="center" valign="center" ><input type="text" name="usuario" ></div>
<div id="div_usuario" align="center" style=" background-color:#CDE8F3; color:#FF0000" ></div> 
<br>
<div id="texto_1" >Clave del Usuario</div>
<div align="center" valign="center" ><input type="password" name="clave" ></div>
<div id="div_clave" align="center" style="background-color:#CDE8F3; color:#FF0000" ></div>
<br>
<input type="submit" value="Login" title="Login"> 
</form>

<form action="Registro.php" name="form" method="post">
<input type="submit" value="Registro" title="Login"> 
</form>

<?php

$userX=$_POST["usuario"];
$passX=$_POST["clave"];
$cond=false;

while($reg=mysql_fetch_array($res)){
	if($userX != $reg["user"]){
				
	}else {
		if($passX == $reg["pass"]){
			$cond=true;
		}
	}
}

if ($userX!=null){
	if($cond){
		echo "<script type='text/javascript' language='javascript' >
		alert ('BIENVENIDO');
		</script>";
	}else{
		echo "<script type='text/javascript' language='javascript' >
		alert ('ERROR, DATOS NO VALIDOS');
		</script>";
	}
}

?>


