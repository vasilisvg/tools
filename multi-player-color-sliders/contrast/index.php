<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Making a colour</title>
	<link rel="stylesheet" href="http://fonts.typotheque.com/WF-023273-007830.css">
<style>
html {
	font: 111%/1.5  "Fedra Sans Screen 2", helvetica, arial, sans-serif;
	text-rendering: optimizeLegibility;
	-webkit-font-feature-settings: "kern" 1, "liga" on, "dlig" on;
	   -moz-font-feature-settings: "kern" 1, "liga" on, "dlig" on;
	        font-feature-settings: "kern" 1, "liga" on, "dlig" on;
}
body {
	margin: 5vh 5vw 10vh;
	height: 85vh;
}
section {
		float: left;
		width: 50%;
		height: 100%;
	}
div {
	width: 100%;
	height: 50%;
	background: silver;
	margin: 0;
}
@media (min-aspect-ratio: 1/1) {
	section {
		float: left;
		width: 50%;
	}
	form {
		padding: 0 0 0 1em;
		box-sizing: border-box;
	}
}
label, input {
	display: block;
	width: 100%;
	margin: 0;
	padding: 0;
}
label {
	margin: 1em 0;
}
input {
	max-width: 30em;
}
output:empty {
	opacity:0;
}
output {
	box-sizing: border-box;
	box-shadow: 0 0 0 1px gray;
	background: hsl(0, 0%, 90%);
	padding: 0 .2em;
	opacity: 1;
	border-radius: .1em;
	transition: .3s;
	margin: 0 0 0 .2em;
	display: inline-block;
}
</style>
</head>
<body>
<section>
<div></div>
<form>
<label>Hue <output></output>
<input type="range" min="1" max="360" id="hue" value="1">
</label>
<label>
Saturation <output></output>
<input type="range" min="0" max="100" id="sat" value="50">
</label>
<label>
Lightness <output></output>
<input type="range" min="0" max="100" id="lig" value="50">
</label>
</form>
</section>

<section>
<div></div>
<form>
<label>Hue <output></output>
<input type="range" min="1" max="360" id="hue1" value="1">
</label>
<label>
Saturation <output></output>
<input type="range" min="0" max="100" id="sat1" value="50">
</label>
<label>
Lightness <output></output>
<input type="range" min="0" max="100" id="lig1" value="50">
</label>
</form>
</section>
<!-- <button>Don’t click</button> -->
<script src="http://cdn.peerjs.com/0.3/peer.min.js"></script>
<script>
var $div= document.querySelector('div');
<?php include 'settings.php'; ?>
var peer = new Peer({key: '<?php echo $key; ?>'});
peer.on('open', function(id) {
  $div.style.background = 'hsl('+hue.value+','+sat.value+'%,'+lig.value+'%)';
});

var $sl = document.querySelectorAll('input');
var i = 0;
while(i<$sl.length){
	$sl[i].oninput = function(){
		this.parentNode.parentNode.parentNode.querySelector('div').style.background = 'hsl('+hue.value+','+sat.value+'%,'+lig.value+'%)';
		this.parentNode.querySelector('output').value=this.value;
	}
	$sl[i].onchange = function(){
		var conn = peer.connect('<?php echo $teacher; ?>');
		conn.on('open', function() {
		  // Send messages
		  conn.send([hue.value,sat.value,lig.value]);
		});
	}
	i++;
}


</script>
</body>
</html>
