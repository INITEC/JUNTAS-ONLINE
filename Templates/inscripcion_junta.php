<?php 
	session_start();
	require_once ("../require/inscripcion_junta_class.php");
	$cod_cliente = $_SESSION["cod_cliente"];
	$cod_tipo = $_POST["cod_tipo"];
	
	$junta_vista = new junta_vista($cod_cliente,$cod_tipo);
	$cod_junta = $junta_vista->entrar_junta();
	$_SESSION["cod_junta"] = $cod_junta;
	header("Location: ver_juntas.php");
?>