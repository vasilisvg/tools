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
	display: flex;
	align-items: stretch;
	align-content: stretch;
}
section {
	flex: 1 1 auto;
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
	content: 'It works! You can start sliding now.';
	font-size: 200%;
	color: black;
}
</style>
</head>
<body>
<div></div>
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
	    	exists.querySelector('section').style.background = 'hsl('+data[0]+','+data[1]+'%,'+data[2]+'%)';
	    	exists.querySelector('section:last-of-type').style.background = 'hsl('+data[3]+','+data[4]+'%,'+data[5]+'%)';
	    }
	    else {
	    	var newDiv = '<article id="d' + conn.peer + '">';
	    	newDiv += '<section style="background:hsl('+data[0]+','+data[1]+'%,'+data[2]+'%);"></section>';
	    	newDiv += '<section style="background:hsl('+data[3]+','+data[4]+'%,'+data[5]+'%);"></section>';
	    	newDiv += '</article>';
	    	document.querySelector('div').innerHTML = newDiv + document.querySelector('div').innerHTML;
	    }
	  });

	  // Send messages
	  conn.send('Hello!');
	});
});
</script>
</body>
</html>
