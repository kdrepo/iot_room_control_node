<?php
session_start();
if(!isset($_SESSION['username'])){
	header("Location: login.php");
}
$currentuser =  $_SESSION['name'] ;
//echo "<h3>Welcome $currentuser</h3>";
?>

<html lang="en">
  <head>
    <title>Control Panel</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<script src="mqttws31.js" type="text/javascript"></script>
	<link href="css/bootstrap.css" rel="stylesheet" />
	<link href="css/bootstrap-theme.css" rel="stylesheet" />
	<script src="js/bootstrap.min.js"></script>
	
	
	
    <!-- Bootstrap CSS 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
	
	<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/paho-mqtt/1.0.1/mqttws31.js" type="text/javascript"></script>
	-->

<script>	
	// Create a client instance

// var urlip = "ws://192.168.43.175:9001/mqtt"; //this is the url of the broker over websockets and not http, for online it is going to be that you currenlty use"ws://broker.mqttdashboard.com:8000/mqtt"
var urlip = "ws://broker.mqttdashboard.com:8000/mqtt"
var Client_ID = "webclientkiller";


client = new Paho.MQTT.Client(urlip, Client_ID);

// set callback handlers
client.onConnectionLost = onConnectionLost;
client.onMessageArrived = onMessageArrived;

// connect the client
client.connect({onSuccess:onConnect});


// called when the client connects
function onConnect() {
  // Once a connection has been made, make a subscription and send a message.
  console.log("onConnect");
  client.subscribe("killer/l");
  message = new Paho.MQTT.Message("Connection Succesful My Friend!");
  message.destinationName = "killer/l";
  client.send(message);
}

// called when the client loses its connection
function onConnectionLost(responseObject) {
  if (responseObject.errorCode !== 0) {
    console.log("onConnectionLost:"+responseObject.errorMessage);
  }
}

// called when a message arrives
function onMessageArrived(message) {
  console.log("onMessageArrived:"+message.payloadString);
  var istring = message.payloadString;
	document.getElementById("demo").innerHTML = istring;
}

 </script>
 
 
<style>
.jumbotron{
	
	
	padding-bottom: 25px;
	padding-top: 25px;
	
	
} 
</style>
 
	
<script>
function changeImage() {
    var image = document.getElementById('light');
    if (image.src.match("bulboff")) {
        image.src = "pic_bulbon.gif";
    } 
	
	//client.subscribe("killer/l");
	message = new Paho.MQTT.Message("1");
	message.destinationName = "killer/l";
	client.send(message);
	//alert("onMessageArrived:"+message.payloadString);
	//var istring = message.payloadString;
	//document.getElementById("demo").innerHTML = istring;
	
	// bulb on function
}
</script>

<script>
function changeImageoff() {
    var image = document.getElementById('light');
    if (image.src.match("bulbon")) {
        image.src = "pic_bulboff.gif";
    } 
	//client.subscribe("killer/l");
	message = new Paho.MQTT.Message("0");
	message.destinationName = "killer/l";
	client.send(message);
	//alert("onMessageArrived:"+message.payloadString);
	//var istring = message.payloadString;
	//document.getElementById("demo").innerHTML = istring;
	
	// bulb off function
}
</script>

<script>
function fchangeImage() {
    var image = document.getElementById('fan');
    if (image.src.match("fanoff")) {
        image.src = "fanon.gif";
    } 
	//client.subscribe("killer/l");
	message = new Paho.MQTT.Message("2");
	message.destinationName = "killer/l";
	client.send(message);
	//alert("onMessageArrived:"+message.payloadString);
	//var istring = message.payloadString;
	//document.getElementById("demo").innerHTML = istring;
	
	// fan on function
}
</script>

<script>
function fchangeImageoff() {
    var image = document.getElementById('fan');
    if (image.src.match("fanon")) {
        image.src = "fanoff.gif";
    } 
	//client.subscribe("killer/l");
	message = new Paho.MQTT.Message("3");
	message.destinationName = "killer/l";
	client.send(message);
	//alert("onMessageArrived:"+message.payloadString);
	//var istring = message.payloadString;
	//document.getElementById("demo").innerHTML = istring;
	
	// fan off function
}
</script>

<script>
function dchangeImage() {
    var image = document.getElementById('door');
    if (image.src.match("dooroff")) {
        image.src = "dooron.gif";
    } 
	//client.subscribe("killer/l");
	message = new Paho.MQTT.Message("4");
	message.destinationName = "killer/l";
	client.send(message);
	//alert("onMessageArrived:"+message.payloadString);
	//var istring = message.payloadString;
	//document.getElementById("demo").innerHTML = istring;
	
}
</script>

<script>
function dchangeImageoff() {
    var image = document.getElementById('door');
    if (image.src.match("dooron")) {
        image.src = "dooroff.gif";
    } 
	//client.subscribe("killer/l");
	message = new Paho.MQTT.Message("5");
	message.destinationName = "killer/l";
	client.send(message);
	//**** alert("onMessageArrived:"+message.payloadString);
	//var istring = message.payloadString;
	//document.getElementById("demo").innerHTML = istring;
	
	// door off function
}
</script>


 </head>
 <body>
   <div class = "container" align="center">
    <div class="jumbotron">
	<h1 class="display-6">Hello, <?php echo $currentuser ?>!</h1>
	<p class="lead">You have admin access of my room now!</p>
	</div>
	</div><br>

<div class="container" align="center">

  <div class="row" align="center">
     <div class="col-sm">
      <h3>Light Control</h3><br>
	  <div class="thumbnail">
		<img id="light" src="pic_bulboff.gif" width="75" height="140"><br><br>
		<button type="button" class="btn btn-success btn-block" onclick="changeImage()">   Switch On   </button>
		<button type="button" class="btn btn-danger btn-block" onclick="changeImageoff()">   Switch Off  </button>
    </div>
	</div>
	<br>
    <div class="col-sm">
      <h3>Fan Control</h3><br>
	  <div class="thumbnail">
		<img id="fan"src="fanoff.gif" width="200" height="140"><br><br>
		<button type="button" class="btn btn-success btn-block" onclick="fchangeImage()">   Switch On   </button>
		<button type="button" class="btn btn-danger btn-block" onclick="fchangeImageoff()">   Switch Off  </button>
    </div>
    </div>
    <div class="col-sm">
      <h3>Door Control</h3><br>
	  <div class="thumbnail">
		<img id="door" src="dooroff.gif" width="85" height="140"><br><br>
		<button type="button" class="btn btn-success btn-block" onclick="dchangeImage()">   Switch On   </button>
		<button type="button" class="btn btn-danger btn-block" onclick="dchangeImageoff()">    Switch Off  </button>
    </div>
	</div>
   </div>
   
 </div>
 <br><br> 
 
<div class="container">
<footer class="page-footer center-on-small-only">

    <!--Footer Links-->
    <div class="container-fluid">
        <div class="row">

            <!--First column-->
            <div class="col-md-6">
                <h5 class="title">Curren Live Status</h5>
                <p id="demo">Your Current Status will be displayed here!</p>
            </div>
            <!--/.First column-->

            <!--Second column-->
            <div class="col-md-6">
                <h5 class="title" align="right">Logout Link</h5>
				<p align = "right"><a href="logout.php">Log Out <?php echo $currentuser ?></a><p>
             </div>
            <!--/.Second column-->
        </div>
    </div>
  
</footer

</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  </body>
</html>