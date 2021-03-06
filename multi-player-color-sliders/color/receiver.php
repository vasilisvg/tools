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
div {
	height: 100vh;
  	display: flex;
  	flex-wrap: wrap;
  	align-items: stretch;
  	align-content: stretch;
}
article {
	flex: 1 1 20vw;
}
article:nth-last-of-type(n+4),
article:nth-last-of-type(4) ~ * {
	-webkit-flex: 1 1 50vmax;
	    -ms-flex: 1 1 50vmax;
	        flex: 1 1 50vmax;
}
article:nth-last-of-type(n+8),
article:nth-last-of-type(8) ~ * {
	-webkit-flex: 1 1 25vmax;
	    -ms-flex: 1 1 25vmax;
	        flex: 1 1 25vmax;
}
article:nth-last-of-type(n+20),
article:nth-last-of-type(20) ~ * {
	-webkit-flex: 1 1 20vmax;
	    -ms-flex: 1 1 20vmax;
	        flex: 1 1 20vmax;
}
article:nth-last-of-type(n+40),
article:nth-last-of-type(40) ~ * {
	-webkit-flex: 1 1 10vmax;
	    -ms-flex: 1 1 10vmax;
	        flex: 1 1 10vmax;
}
article:nth-last-of-type(n+120),
article:nth-last-of-type(120) ~ * {
	-webkit-flex: 1 1 5vmax;
	    -ms-flex: 1 1 5vmax;
	        flex: 1 1 5vmax;
}
div::after {
	display: block;
	padding: 11.1111vh 11.1111vw;
}
div:empty::after {
	content: '…not yet. Maybe a refresh if this takes too long?';
	font-size: 100%;
	color: gray;
}
div.go::after {
	//content: 'It works! You can start sliding now.';
	font-size: 200%;
	color: black;
}
h1 {
	display: none;
	font-weight: normal;
	font-size: 290%;
}
.go h1,
h1:nth-last-child(n + 2) {
	position: absolute;
	width: 100%;
	text-align: center;
	top: 30vh;
	opacity: 1;
	display: block;
	width: 20vw;
	background: white;
	left: 50vw;
	margin-left: -10vw;
}
h1:nth-last-child(n+3) { opacity: .9; }
h1:nth-last-child(n+6) { opacity: .8; }
h1:nth-last-child(n+9) { opacity: .7; }
h1:nth-last-child(n+12) { opacity: .6; }
h1:nth-last-child(n+15) { opacity: .5; }
h1:nth-last-child(n+18) { opacity: .4; }
h1:nth-last-child(n+21) { opacity: .3; }
h1:nth-last-child(n+24) { opacity: .2; }
h1:nth-last-child(n+27) { opacity: .1; }
h1:nth-last-child(n+30) { opacity: 0; }

</style>
</head>
<body>
<div><h1>vvg.gr/nr</h1></div>
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
	    	exists.style.background = 'hsl('+data[0]+','+data[1]+'%,'+data[2]+'%)';
	    }
	    else {
	    	var newDiv = document.createElement('article');
	    	newDiv.setAttribute('id','d'+conn.peer);
	    	newDiv.style.background = 'hsl('+data[0]+','+data[1]+'%,'+data[2]+'%)';
	    	if(document.querySelector('div').childNodes.length === 0){
	    		document.querySelector('div').appendChild(newDiv);
	    	}
	    	else {
	    		document.querySelector('div').insertBefore(newDiv,document.querySelector('div > article'));
	    	}
	    }
	  });

	  // Send messages
	  conn.send('Hello!');
	});
});
</script>
</body>
</html>
