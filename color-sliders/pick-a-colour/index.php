<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Making a colour</title>
	<link rel="stylesheet" href="//fonts.typotheque.com/WF-023273-007830.css">
	<link rel="stylesheet" href="//fonts.typotheque.com/WF-023273-008215.css">
<style>

html {
	font: 111%/1.5  "Fedra Sans Condensed Alt","Fedra Sans Screen 2", helvetica, arial, sans-serif;
	text-rendering: optimizeLegibility;
	-webkit-font-feature-settings: "kern" 1, "liga" on, "dlig" on;
	   -moz-font-feature-settings: "kern" 1, "liga" on, "dlig" on;
	        font-feature-settings: "kern" 1, "liga" on, "dlig" on;
}
	body {
		margin: 0;
		height: 100vh;
  		display: -webkit-box;
  		display: -webkit-flex;
  		display: -ms-flexbox;
  		display: flex;
  		-webkit-box-align: stretch;
  		-webkit-align-items: stretch;
  		    -ms-flex-align: stretch;
  		        align-items: stretch;
  		-webkit-align-content: stretch;
  		    -ms-flex-line-pack: stretch;
  		        align-content: stretch;
	}
	div {
		-webkit-box-flex: 1;
		-webkit-flex: 1;
		    -ms-flex: 1;
		        flex: 1;
	}
	form {
		padding: 1em;
	}
label, input {
	display: block;
	width: 100%;
	margin: 0;
	padding: 0;
	min-width: 15em;
}
@media (max-width: 22em) {
	label, input {
		min-width: 13em;
	}
}
label {
	margin: 1em 0;
	max-width: 20em;
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
<div style="background:hsl(91,32%,31%);"></div>
<form>
<label>Hue <output>91</output>
<input type="range" min="1" max="360" id="hue" value="91">
</label>
<label>
Saturation <output>32</output>
<input type="range" min="0" max="100" id="sat" value="32">
</label>
<label>
Lightness <output>31</output>
<input type="range" min="0" max="100" id="lig" value="31">
</label>
</form>

<!-- <button>Don’t click</button> -->
<script>
var $div= document.querySelector('div');

var $sl = document.querySelectorAll('input');
var i = 0;
while(i<$sl.length){
	$sl[i].oninput = function(){
		$div.style.background = 'hsl('+hue.value+','+sat.value+'%,'+lig.value+'%)';
		this.parentNode.querySelector('output').value=this.value;
	}
	i++;
}


</script>
</body>
</html>
