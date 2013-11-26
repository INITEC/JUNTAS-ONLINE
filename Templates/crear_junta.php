<html>
<head>
<title>>>Nueva Junta<<</title>

<link type="text/css" rel="StyleSheet" href="bluecurve/bluecurve.css" />
<script type="text/javascript" src="../JavaScript/range.js"></script>
<script type="text/javascript" src="../JavaScript/timer.js"></script>
<script type="text/javascript" src="../JavaScript/slider.js"></script>
</head>
<body>

<p>Horizontal</p>
<div class="slider" id="slider-1" tabIndex="1">
	<input class="slider-input" id="slider-input-1"/>
</div>

<p>
Value: <input id="h-value" onchange="s.setValue(parseInt(this.value))"/>
Minimum: <input id="h-min" onchange="s.setMinimum(parseInt(this.value))"/>
Maximum: <input id="h-max" onchange="s.setMaximum(parseInt(this.value))"/>
</p>

<script type="text/javascript">

var s = new Slider(document.getElementById("slider-1"), document.getElementById("slider-input-1"));
s.onchange = function () {
	document.getElementById("h-value").value = s.getValue();
		document.getElementById("h-min").value = s.getMinimum();
	document.getElementById("h-max").value = s.getMaximum();
}
s.setValue(50);

</script>
</body>
</html>