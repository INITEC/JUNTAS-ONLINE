<?php
session_start(); 
require_once("../require/class.php");
include ("../includes/slider_horizontal.php");

?>

<html>
<head>
<title>>>Nueva Junta<<</title>
<script type="text/javascript" src="../JavaScript/range.js"></script>
<script type="text/javascript" src="../JavaScript/timer.js"></script>
<script type="text/javascript" src="../JavaScript/slider.js"></script>
<link type="text/css" rel="StyleSheet" href="../Estilos/bluecurve/bluecurve.css" />

</head>
<body>
<h1>Creando Nueva Junta</h1>

<?php colocar_slider_horizontal("1",0,100,1); ?>



</body>
</html>