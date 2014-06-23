<?php 
session_start();
require_once ("../require/cliente_class.php");

$cod_cliente = $_SESSION["cod_cliente"];
$cliente = new cliente($cod_cliente);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Perfil Juan</title>
<link href="../Estilos/EstilosPrincipal.css" rel="stylesheet" type="text/css" />
<link  href="../Estilos/menu.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div><?php include("../includes/menu_cabecera.php"); ?>
</div>
<br>
<hr>
<div>
<div class="MenuJuntas">
    <?php include("../includes/menu_izquierda.php"); ?>
</div>
<div>
	<div class="Video">
	 
	 <iframe  src="//www.youtube.com/embed/h1xIIWzQAcg?feature=player_detailpage" frameborder="5" allowfullscreen width="200"></iframe>
	
	   </div>
	   <div class="Imagen">
	  <img src="../Imagenes/fotos_perfil/11.jpg" width="300"  >
	  </div>
	  
	  <div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/es_ES/all.js#xfbml=1";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
	
	<div class="fb-like" data-href="https://www.facebook.com/pages/Initec-Uni/237562866398443?fref=ts" data-width="300" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
	  <div class="Twiter">
	
	<a href="https://twitter.com/INITECUNI" class="twitter-follow-button" data-show-count="false">Follow @INITECUNI</a>
	<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
	
	</div>
</div>
</div>
</body>
</html>