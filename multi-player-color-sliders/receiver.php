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
.go::after {
	content: 'It works! You can start sliding now.';
	display: block;
	padding: 11.1111vh 11.1111vw;
	font-size: 200%;
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
  console.log('My peer ID is: ' + id);
  document.querySelector('div').classList.add('go');
});
peer.on('connection', function(conn) { 
	//console.log(conn);
	conn.on('open', function() {
	  // Receive messages
	  conn.on('data', function(data) {
	  	document.querySelector('div').classList.remove('go');
	    console.log('Received from' + conn.peer, data);
	    exists = document.getElementById('d'+conn.peer);
	    if(exists) {
	    	exists.style.background = 'hsl('+data[0]+','+data[1]+'%,'+data[2]+'%)';
	    }
	    else {
	    	var newDiv = document.createElement('article');
	    	newDiv.setAttribute('id','d'+conn.peer);
	    	newDiv.style.background = 'hsl('+data[0]+','+data[1]+'%,'+data[2]+'%)';
	    	if(document.querySelector('div').childNodes.length === 1){
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
