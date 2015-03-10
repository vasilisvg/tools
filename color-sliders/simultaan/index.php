<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Simultaancontrast</title>
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
	transition: opacity .2s;
}
section {
		float: left;
		width: 50%;
		height: 100%;
		position: relative;
	}
body > div {
	width: 60%;
	height: 100%;
	background: silver;
	margin: 0;
	display: flex;
	justify-content: center;
	align-items: center;
	float: left;
}
div + section {
	width: 40%;
}
section > div {
	height: 40%;
	width: 100%;
	position: absolute;
	transition: width .3s;
	right: -1em;
}
section > div:hover {
	width: calc(250% + 1em);
}
div div {
	width: 20vmin;
	height: 20vmin;
	border-radius: 50%;
	display: block;
}
.v1 div {
	width: 5%;
	height: 50%;
	border-radius: 0%;
	position: relative;
}
.v1 div::before {
	content: '';
	display: block;
	width: 100%;
	height: 100%;
	background: inherit;
	margin: 0 0 0 -200%;
	position: absolute;
}
.v1 div::after {
	content: '';
	display: block;
	width: 100%;
	height: 100%;
	background: inherit;
	right: -200%;
	position: absolute;
}

form {
	margin: 40vh 0 0 ;
		padding: 0 0 0 1em;
		box-sizing: border-box;
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
.loading {
	opacity: .2;
}
</style>
</head>
<body class="">
<?php 
$h = mt_rand(1,360);
$s = mt_rand(40,100);
$l = mt_rand(30,70);
$h1 = mt_rand(1,360);
$s1 = mt_rand(40,100);
$l1 = mt_rand(30,70);
$l2 = mt_rand(30,70);
?>
<div class="v1" style="background:hsl(<?php echo $h.','.$s.'%,'.$l.'%'; ?>);"><div style="background:hsl(<?php echo $h1.',0%,'.$l2.'%'; ?>);"></div></div>


<section>
<div style="background:hsl(<?php echo $h1.','.$s1.'%,100%'; ?>);"></div>
<form>
<label>Hue <output><?php echo $h1; ?></output>
<input data-name="2" type="range" min="1" max="360" id="hue1" value="<?php echo $h1; ?>">
</label>
<label>
Saturation <output><?php echo $s1; ?></output>
<input data-name="2" type="range" min="0" max="100" id="sat1" value="<?php echo $s1; ?>">
</label>
<label>
Lightness <output>100</output>
<input data-name="2" type="range" min="0" max="100" id="lig1" value="100">
</label>
</form>
</section>
<!-- <button>Don’t click</button> -->
<script src="http://cdn.peerjs.com/0.3/peer.min.js"></script>
<script>
var $div= document.querySelector('div');

var $sl = document.querySelectorAll('input');
var i = 0;
while(i<$sl.length){
	$sl[i].oninput = function(){
		tInput = this.parentNode.parentNode.querySelectorAll('input')
		hue = tInput[0];
		sat = tInput[1];
		lig = tInput[2];
		document.querySelector('section > div').style.background = 'hsl('+hue.value+','+sat.value+'%,'+lig.value+'%)';
		
		this.parentNode.querySelector('output').value=this.value;
	}
	i++;
}


</script>
</body>
</html>
