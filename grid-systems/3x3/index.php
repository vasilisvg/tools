<?php
$h1 = $_GET["h1"];
$h2 = $_GET["h2"];
$ul = $_GET["ul"];
$p1 = $_GET["p1"];
$p2 = $_GET["p2"];
$f = $_GET["f"];
$d = $_GET["d"];

$h1t = $_GET["h1t"];
$h2t = $_GET["h2t"];
$ult = $_GET["ult"];
$p1t = $_GET["p1t"];
$p2t = $_GET["p2t"];
$ft = $_GET["ft"];
$dt = $_GET["dt"];
$h1l = $_GET["h1l"];
$h2l = $_GET["h2l"];
$ull = $_GET["ull"];
$p1l = $_GET["p1l"];
$p2l = $_GET["p2l"];
$fl = $_GET["fl"];
$dl = $_GET["dl"];
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Place things in a 3x3 grid — Grid Systems</title>
	<link rel="stylesheet" href="css.css">
</head>
<body>

<article>
	<div></div>
	<div></div>
	<h1 style="left:0%;top:<?php echo $h1t; ?>%;" tabindex="0">Architectonic Graphic Design</h1>
	<h2 style="left:<?php echo $h2l; ?>%;top:<?php echo $h2t; ?>%;" tabindex="0">Graphic Design Department</h2>
	<ul style="left:<?php echo $ull; ?>%;top:<?php echo $ult; ?>%;" tabindex="0">
		<li>January 7, 2003</li>
		<li>January 8, 2003</li>
		<li>January 9, 2003</li>
	</ul>
	<p style="left:<?php echo $p1l; ?>%;top:<?php echo $p1t; ?>%;" tabindex="0">7:00 pm, Library</p>
	<p style="left:<?php echo $p2l; ?>%;top:<?php echo $p2t; ?>%;" tabindex="0">Free lecture series</p>
	<footer style="left:<?php echo $fl; ?>%;top:<?php echo $ft; ?>%;" tabindex="0">Ringling School of Art and Design</footer>
	<div style="left:<?php echo $dl; ?>%;top:<?php echo $dt; ?>%;" tabindex="0" class="dot"></div>
</article>

<aside id="wat">
	<h1>Wat?</h1>
	<p>
		Klik op een element om het focus te geven. Gebruik je pijltjestoetsen om het element omhoog, omlaag naar links of naar rechts te bewegen. De verschillende elementen hebben verschillende beperkingen. De bal kan overal neergezet worden. De header kan alleen naar boven of naar beneden. Afijn, probeer maar.
	</p>
	<ul>
		<li><kbd>w</kbd> om dit hulpvenster te tonen/verbergen</li>
		<li><kbd>t</kbd> om het grid te tonen/verbergen</li>
		<li><kbd>g</kbd> om de tekst te vervangen door grijze vlakken</li>
	</ul>
	<a href="#">close</a>
</aside>
<a href="#wat">wat?</a>
<script src="js.js"></script>
</body>
</html>
