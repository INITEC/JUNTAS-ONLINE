<?php 
/*creacion de objetos de 3_ver_junta.php*/
$cod_cliente = $_SESSION["cod_cliente"];
$cod_junta = $_SESSION["cod_junta"];
$cliente = new cliente($cod_cliente);
$junta = new junta($cod_junta);
$tipo_junta = new tipo_junta();
$tipo_junta->establecer_tipo($junta->cod_tipo());
$num_participantes = $tipo_junta->numero_participantes();
$participantes = new participantes($cod_junta);
$historial = new historial($cod_junta,$junta->periodo_actual());
$transaccion = new transacciones($cod_junta);
$sorteo = new sorteo($cod_junta,$num_participantes);
?>