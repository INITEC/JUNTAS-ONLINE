<?php 
header('Content-Type: text/xml');
echo '<?php version="1.0" encoding="UTF-8" standalone="yes" ?>';

echo '<response>';
	$food = $_GET['food'];
	$foodArray = array('tuna','bacon','beef');
	if(in_array($food,$foodArray)){echo "nosotros tenemos ".$food;}
	elseif ($food='') {echo "ingresa algo";}
	else {echo "nosotros no tenemos ".$food;}
echo '</response>';
?>