<?php 
$cod_junta = $_POST["cod_junta"];
$cod_cliente =1;
$junta = new junta($cod_junta);
$sorteo = new sorteo($cod_cliente, $junta);
$sorteo->dar_numeros();

?>