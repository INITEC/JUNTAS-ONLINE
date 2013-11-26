<?php 
function radio_button($nombre, $inicial, $final, $incremento) {
	for($i=$inicial; $i<=$final; $i=$i+$incremento) {	
	echo "<input type='radio' name='".$nombre."' value='".$i."' >".$i;
		}
}


?>