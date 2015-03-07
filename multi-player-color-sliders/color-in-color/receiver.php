<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Receiving colours</title>
	<link rel="stylesheet" href="http://fonts.typotheque.com/WF-023273-007830.css">
	<style>
html {
	font: 111%/1.5  "Fedra Sans Screen 2", helvetica, arial, sans-serif;
	text-rendering: optimizeLegibility;
	-webkit-font-feature-settings: "kern" 1, "liga" on, "dlig" on;
	   -moz-font-feature-settings: "kern" 1, "liga" on, "dlig" on;
	        font-feature-settings: "kern" 1, "liga" on, "dlig" on;
	height: 100%;
}
body {
	padding: 0;
	margin: 0;
}
body > div {
	height: 100vh;
  	display: flex;
  	flex-wrap: wrap;
  	align-items: stretch;
  	align-content: stretch;
}
article {
	flex: 1 1 20vw;
	display: flex;
	align-items: stretch;
	align-content: stretch;
	margin: .1em;
}
article > div {
	width: 100%;
	display: flex;
	justify-content: center;
	align-items: center;
}
div > div {
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
section {
	flex: 1 1 auto;
}
body > div::after {
	display: block;
	padding: 11.1111vh 11.1111vw;
}
body > div:empty::after {
	content: '…not yet. Maybe a refresh if this takes too long?';
	font-size: 100%;
	color: gray;
}
body > div.go::after {
	content: 'It works! You can start sliding now.';
	font-size: 200%;
	color: black;
}
#overlay {
	position: fixed;
	top: -100vh;
	height: 100vh;
	width: 100vw;
	opacity: 0;
	transition: opacity .25s;
}
#overlay.jep {
	top: 0;
	opacity: 1;
}

</style>
</head>
<body>
<div></div>
<div id="overlay"></div>
<script src="http://cdn.peerjs.com/0.3/peer.min.js"></script>
<script>
<?php include 'settings.php'; ?>
var peer = new Peer('<?php echo $teacher; ?>',{key: '<?php echo $key; ?>'});
peer.on('open', function(id) {
  document.querySelector('div').classList.add('go');
});
peer.on('connection', function(conn) { 
	conn.on('open', function() {
	  // Receive messages
	  conn.on('data', function(data) {
	  	document.querySelector('div').classList.remove('go');
	    exists = document.getElementById('d'+conn.peer);
	    if(exists) {
	    	exists.innerHTML = data;
	    }
	    else {
	    	var newDiv = '<article id="d' + conn.peer + '">';
	    	newDiv += data;
	    	newDiv += '</article>';
	    	document.querySelector('div').innerHTML = newDiv + document.querySelector('div').innerHTML;
	    }
	  });

	  // Send messages
	  conn.send('Hello!');
	});
});

var el = document.querySelector('div');
el.addEventListener("click", function(e){showOne(e)}, false);
var el1 = document.querySelector('#overlay');
el1.addEventListener("click", function(e){hideOne(e)}, false);

function showOne(e) {
	var toShow = e.target.parentNode.innerHTML;
	document.getElementById('overlay').innerHTML = toShow;
	document.getElementById('overlay').classList.add('jep');
}
function hideOne(e) {
	document.getElementById('overlay').classList.remove('jep');
}
</script>
</body>
</html>
