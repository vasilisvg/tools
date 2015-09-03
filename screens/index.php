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
article:nth-of-type(5) {
	width: 425px;
	height: 717px;
	background: url(667.svg);
	padding: 25px;
	left: 100px;
	-webkit-transform: scale(.625, .625);
	    -ms-transform: scale(.625, .625);
	        transform: scale(.625, .625);
}
article:nth-of-type(5) iframe {
	width: 375px;
	height: 667px;
}
article:focus {
	z-index: 2;
}
</style>
<?php 
$other = mt_rand(0,3);
if ( $other == 1) {
?>
<style>
article { left: 400px;}
article:nth-of-type(2) { left: 0;}
article:nth-of-type(3) { left: 1600px;}
article:nth-of-type(4) { left: 1440px;}
</style>
<?php
}
if ( $other == 2) {
?>
<style>
article { left: 550px;}
article:nth-of-type(2) { left: 1550px;}
article:nth-of-type(3) { left: 0;}
article:nth-of-type(4) { left: 1990px;}
</style>
<?php
}
if ( $other == 3) {
?>
<style>
article { left: 0;}
article:nth-of-type(2) { left: 1050px;}
article:nth-of-type(3) { left: 1500px;}
article:nth-of-type(4) { left: 2090px;}
</style>
<?php
}
?>
</head>
<body>
<?php 
function GET($name=NULL, $value=false, $option="default")
{
    $option=false; // Old version depricated part
    $content=(!empty($_GET[$name]) ? trim($_GET[$name]) : (!empty($value) && !is_array($value) ? trim($value) : false));
    if(is_numeric($content))
        return preg_replace("@([^0-9])@Ui", "", $content);
    else if(is_bool($content))
        return ($content?true:false);
    else if(is_float($content))
        return preg_replace("@([^0-9\,\.\+\-])@Ui", "", $content);
    else if(is_string($content))
    {
        if(filter_var ($content, FILTER_VALIDATE_URL))
            return $content;
        else if(filter_var ($content, FILTER_VALIDATE_EMAIL))
            return $content;
        else if(filter_var ($content, FILTER_VALIDATE_IP))
            return $content;
        else if(filter_var ($content, FILTER_VALIDATE_FLOAT))
            return $content;
        else
            return preg_replace("@([^a-zA-Z0-9\+\-\_\*\@\$\!\;\.\?\#\:\=\%\/\ ]+)@Ui", "", $content);
    }
    else false;
}

function myUrlEncode($string) {
    $entities = array('%21', '%2A', '%27', '%28', '%29', '%3B', '%3A', '%40', '%26', '%3D', '%2B', '%24', '%2C', '%2F', '%3F', '%25', '%23', '%5B', '%5D');
    $replacements = array('!', '*', "'", "(", ")", ";", ":", "@", "&", "=", "+", "$", ",", "/", "?", "%", "#", "[", "]");
    return str_replace($entities, $replacements, urlencode($string));
}

$url = 'https://vasilis.nl/';
if ( isset($_GET["u"]) ) {
	$url = myUrlEncode(GET('u'));
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
	<!-- <article tabindex="0">
		<iframe tabindex="-1" src="<?php echo $url; ?>"></iframe>
	</article> -->
<script>
var z = 2;
var art = document.querySelectorAll('article');
var i = 0;
while(i<art.length) {
	art[i].onfocus = function(){
		this.style.zIndex = z;
		z++;
		return false;
	}
	i++;
}

</script>
</body>
</html>
