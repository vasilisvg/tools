<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Colour in a colour</title>
	<link rel="stylesheet" href="//fonts.typotheque.com/WF-023273-007830.css">
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
	}
div {
	width: 100%;
	height: 50%;
	background: silver;
	margin: 0;
	display: flex;
	justify-content: center;
	align-items: center;
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
$s = mt_rand(70,100);
$l = mt_rand(40,70);
$h1 = mt_rand(1,360);
$s1 = mt_rand(70,100);
$l1 = mt_rand(40,70);
?>
<div class="v<?php echo mt_rand(0,1); ?>" style="background:hsl(<?php echo $h.','.$s.'%,'.$l.'%'; ?>);"><div style="background:hsl(<?php echo $h1.','.$s1.'%,'.$l1.'%'; ?>);"></div></div>
<section>
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
</section>

<section>
<form>
<label>Hue <output><?php echo $h1; ?></output>
<input data-name="2" type="range" min="1" max="360" id="hue1" value="<?php echo $h1; ?>">
</label>
<label>
Saturation <output><?php echo $s1; ?></output>
<input data-name="2" type="range" min="0" max="100" id="sat1" value="<?php echo $s1; ?>">
</label>
<label>
Lightness <output><?php echo $l1; ?></output>
<input data-name="2" type="range" min="0" max="100" id="lig1" value="<?php echo $l1; ?>">
</label>
</form>
</section>
<!-- <button>Don’t click</button> -->
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
		if (this.getAttribute('data-name') === '2') {
			document.querySelector('div div').style.background = 'hsl('+hue.value+','+sat.value+'%,'+lig.value+'%)';
		}
		else {
			document.querySelector('div').style.background = 'hsl('+hue.value+','+sat.value+'%,'+lig.value+'%)';
		}
		
		this.parentNode.querySelector('output').value=this.value;
	}
	i++;
}


</script>
</body>
</html>
