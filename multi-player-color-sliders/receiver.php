<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Receiving colours</title>
	<style>
html {
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
});
peer.on('connection', function(conn) { 
	//console.log(conn);
	conn.on('open', function() {
	  // Receive messages
	  conn.on('data', function(data) {
	    console.log('Received from' + conn.peer, data);
	    exists = document.getElementById('d'+conn.peer);
	    if(exists) {
	    	exists.style.background = 'hsl('+data[0]+','+data[1]+'%,'+data[2]+'%)';
	    }
	    else {
	    	var newDiv = document.createElement('article');
	    	newDiv.setAttribute('id','d'+conn.peer);
	    	newDiv.style.background = 'hsl('+data[0]+','+data[1]+'%,'+data[2]+'%)';
	    	document.querySelector('div').innerHTML = newDiv + document.querySelector('div').innerHTML;
	    	// works?
	    }
	  });

	  // Send messages
	  conn.send('Hello!');
	});
});
</script>
</body>
</html>
