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
div {
	width: 50vmin;
	height: 50vmin;
}
label, input {
	display: block;
	width: 50vmin;
	margin: 0;
	padding: 0;
}
label {
	margin: 1em 0;
}
</style>
</head>
<body>
<div></div>
<label>Hue
<input type="range" min="1" max="360" id="hue" value="1">
</label>
<label>
Saturation
<input type="range" min="0" max="100" id="sat" value="50">
</label>
<label>
Lightness
<input type="range" min="0" max="100" id="lig" value="50">
</label>
<!-- <button>Don’t click</button> -->
<script src="http://cdn.peerjs.com/0.3/peer.min.js"></script>
<script>
var $div= document.querySelector('div');
<?php include 'settings.php'; ?>
var peer = new Peer({key: '<?php echo $key; ?>'});
peer.on('open', function(id) {
  console.log('My peer ID is: ' + id);
  $div.style.background = 'hsl('+hue.value+','+sat.value+'%,'+lig.value+'%)';
});

var $sl = document.querySelectorAll('input');
var i = 0;
while(i<$sl.length){
	$sl[i].oninput = function(){
		$div.style.background = 'hsl('+hue.value+','+sat.value+'%,'+lig.value+'%)';
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
