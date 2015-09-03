<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Screenshots</title>
<style>
body {
	margin: 0;
	padding: 0;
	height: 100vh;
	position: relative;
}
article {
	position: absolute;
	width: 1542px;
	height: 1002px;
	padding: 50px;
	background: url(1440.svg);
	-webkit-transform: scale(.725, .725);
	    -ms-transform: scale(.725, .725);
	        transform: scale(.725, .725);
	-webkit-transform-origin: 0 100%;
	    -ms-transform-origin: 0 100%;
	        transform-origin: 0 100%;
	box-sizing: border-box;
	margin: 0;
	bottom: 0;
	left: 100px;
}
iframe {
	//pointer-events: none;
}
article iframe {
	width: 1440px;
	height: 900px;
	border: 0;
}
article:nth-of-type(2) {
	width: 868px;
	height: 1124px;
	background: url(768.svg);
	-webkit-transform: scale(.575, .575);
	    -ms-transform: scale(.575, .575);
	        transform: scale(.575, .575);
	left: 1000px;
}
article:nth-of-type(2) iframe {
	width: 768px;
	height: 1024px;
}
article:nth-of-type(3) {
	height: 868px;
	width: 1124px;
	background: url(1024.svg);
	-webkit-transform: scale(.575, .575);
	    -ms-transform: scale(.575, .575);
	        transform: scale(.575, .575);
	left: 1400px;
}
article:nth-of-type(3) iframe {
	height: 768px;
	width: 1024px;
}
article:nth-of-type(4) {
	width: 370px;
	height: 618px;
	background: url(320.svg);
	padding: 25px;
	left: 0;
	-webkit-transform: scale(.625, .625);
	    -ms-transform: scale(.625, .625);
	        transform: scale(.625, .625);
}
article:nth-of-type(4) iframe {
	width: 320px;
	height: 568px;
}
article:focus {
	z-index: 2;
}
</style>
</head>
<body>
<?php 
$url = 'https://vasilis.nl/';
if ( isset($_GET["u"]) ) {
	$url = $_GET["u"];
}
?>
	<article tabindex="0">
		<iframe tabindex="-1" src="<?php echo $url; ?>"></iframe>
	</article>
	<article tabindex="0">
		<iframe tabindex="-1" src="<?php echo $url; ?>"></iframe>
	</article>
	<article tabindex="0">
		<iframe tabindex="-1" src="<?php echo $url; ?>"></iframe>
	</article>
	<article tabindex="0">
		<iframe tabindex="-1" src="<?php echo $url; ?>"></iframe>
	</article>
</body>
</html>
