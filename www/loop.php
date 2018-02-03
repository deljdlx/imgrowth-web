<html>
<body>

<div id="content">Console</div>

<script>

var index=0;

setInterval(function() {

	var url='http://192.168.0.12/write'+index;
	index++;
	document.getElementById('content').innerHTML= 'Testing : '+url + '<img src="'+url+'"/>';
	if(index ==8) {
		index=0;
	}

}, 5000);


</script>


</body>


</html>