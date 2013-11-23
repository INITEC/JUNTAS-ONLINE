<?php 
function colocar_slider_horizontal($title,$max,$min,$incremento) {

?>

<p><?php echo $title; ?></p>
<div class="slider" id="slider-<?php echo $title; ?>" tabIndex="<?php echo $title; ?>">
	<input class="slider-input" id="slider-input-<?php echo $title; ?>"/>
</div>

<p>
Value: <input id="h-value_<?php echo $title; ?>" onchange="s_<?php echo $title; ?>.setValue(parseInt(this.value))"/>
Minimum: <input id="h-min_<?php echo $title; ?>" onchange="s_<?php echo $title; ?>.setMinimum(parseInt(this.value))"/>
Maximum: <input id="h-max_<?php echo $title; ?>" onchange="s_<?php echo $title; ?>.setMaximum(parseInt(this.value))"/>
</p>

<script type="text/javascript">

var s_<?php echo $title; ?> = new Slider(document.getElementById("slider-<?php echo $title; ?>"), document.getElementById("slider-input-<?php echo $title; ?>"));
s_<?php echo $title; ?>.onchange = function () {
	document.getElementById("h-value_<?php echo $title; ?>").value = s_<?php echo $title; ?>.getValue();
		document.getElementById("h-min_<?php echo $title; ?>").value = s_<?php echo $title; ?>.getMinimum();
	document.getElementById("h-max_<?php echo $title; ?>").value = s_<?php echo $title; ?>.getMaximum();
}
s.setValue(50);

</script>

<?php
}
?>