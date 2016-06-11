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
	transition: opacity: .2s;
}
div {
	width: 100%;
	height: 50%;
	background: silver;
	margin: 0;
}
@media (min-aspect-ratio: 1/1) {
	div,
	form {
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
input[type=range] {
  -webkit-appearance: none;
  width: 100%;
  margin: 16.5px 0;
}
input[type=range]:focus {
  outline: none;
}
input[type=range]::-webkit-slider-runnable-track {
  width: 100%;
  height: 3px;
  cursor: pointer;
  box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
  background: rgba(0, 0, 0, 0.42);
  border-radius: 2px;
  border: 0.2px solid #010101;
}
input[type=range]::-webkit-slider-thumb {
  box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
  border: 1px solid #000000;
  height: 36px;
  width: 36px;
  border-radius: 50px;
  background: #ffffff;
  cursor: pointer;
  -webkit-appearance: none;
  margin-top: -16.7px;
}
input[type=range]:focus::-webkit-slider-runnable-track {
  background: rgba(13, 13, 13, 0.42);
}
input[type=range]::-moz-range-track {
  width: 100%;
  height: 3px;
  cursor: pointer;
  box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
  background: rgba(0, 0, 0, 0.42);
  border-radius: 2px;
  border: 0.2px solid #010101;
}
input[type=range]::-moz-range-thumb {
  box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
  border: 1px solid #000000;
  height: 36px;
  width: 36px;
  border-radius: 50px;
  background: #ffffff;
  cursor: pointer;
}
input[type=range]::-ms-track {
  width: 100%;
  height: 3px;
  cursor: pointer;
  background: transparent;
  border-color: transparent;
  color: transparent;
}
input[type=range]::-ms-fill-lower {
  background: rgba(0, 0, 0, 0.42);
  border: 0.2px solid #010101;
  border-radius: 4px;
  box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
}
input[type=range]::-ms-fill-upper {
  background: rgba(0, 0, 0, 0.42);
  border: 0.2px solid #010101;
  border-radius: 4px;
  box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
}
input[type=range]::-ms-thumb {
  box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
  border: 1px solid #000000;
  height: 36px;
  width: 36px;
  border-radius: 50px;
  background: #ffffff;
  cursor: pointer;
  height: 3px;
}
input[type=range]:focus::-ms-fill-lower {
  background: rgba(0, 0, 0, 0.42);
}
input[type=range]:focus::-ms-fill-upper {
  background: rgba(13, 13, 13, 0.42);
}
.loading {
	opacity: .2;
}
</style>
</head>
<body class="">
<?php
$h = mt_rand(1,360);
$s = mt_rand(20,80);
$l = mt_rand(20,80);
?>
<div style="background:hsl(<?php echo $h.','.$s.'%,'.$l.'%'; ?>);"></div>
<form>
<label>Hue <output><?php echo $h; ?></output>
<input type="range" min="1" max="360" id="hue" value="<?php echo $h; ?>">
</label>
<label>
Saturation <output><?php echo $s; ?></output>
<input type="range" min="0" max="100" id="sat" value="<?php echo $s; ?>">
</label>
<label>
Lightness <output><?php echo $l; ?></output>
<input type="range" min="0" max="100" id="lig" value="<?php echo $l; ?>">
</label>
</form>
<!-- <button>Don’t click</button> -->
<script src="http://cdn.peerjs.com/0.3/peer.min.js"></script>
<script>
var $div= document.querySelector('div');
<?php include 'settings.php'; ?>
if(!localStorage.getItem('yourId')) {
	var array = new Uint32Array(3);
    window.crypto.getRandomValues(array);
    var yourId = array[0]+'-'+array[1]+'-'+array[2];
	localStorage.setItem('yourId',yourId);
}
else {
	var yourId = localStorage.getItem('yourId');
}
//var peer = new Peer(yourId,{key: '<?php echo $key; ?>'});
var peer = new Peer(yourId,{key: '<?php echo $key; ?>'});
peer.on('open', function(id) {
  document.body.classList.remove('loading');
});

var $sl = document.querySelectorAll('input');
var i = 0;
while(i<$sl.length){
	$sl[i].oninput = function(){
		$div.style.background = 'hsl('+hue.value+','+sat.value+'%,'+lig.value+'%)';
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
