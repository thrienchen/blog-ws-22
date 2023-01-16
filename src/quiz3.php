<!DOCTYPE html>
<html>
<head>

	<title>Frage 3</title>
	<link rel="icon" type="image/x-icon" href="favicon.ico">


<style>
	
	.mittig{
		display: flex;
		justify-content: center;
		
	}
	#bild{
		display: none;
	}
	#bild2{
		display: none;
	}
	#bild3{
		display: none;
	}



	.glow-on-hover {
	    width: 150px;
	    height: 50px;
	    border: none;
	    outline: none;
	    color: #fff;
	    background: #111;
	    cursor: pointer;
	    position: relative;
	    z-index: 0;
	    border-radius: 10px;
	}

	.glow-on-hover:before {
	    content: '';
	    background: linear-gradient(45deg, #ff0000, #ff7300, #fffb00, #48ff00, #00ffd5, #002bff, #7a00ff, #ff00c8, #ff0000);
	    position: absolute;
	    top: -2px;
	    left:-2px;
	    background-size: 400%;
	    z-index: -1;
	    filter: blur(5px);
	    width: calc(100% + 4px);
	    height: calc(100% + 4px);
	    animation: glowing 20s linear infinite;
	    opacity: 0;
	    transition: opacity .3s ease-in-out;
	    border-radius: 10px;
	}

	.glow-on-hover:active {
	    color: #000;
	}

	.glow-on-hover:active:after {
	    background: transparent;
	}

	.glow-on-hover:hover:before {
	    opacity: 1;
	}

	.glow-on-hover:after {
	    z-index: -1;
	    content: '';
	    position: absolute;
	    width: 100%;
	    height: 100%;
	    background: #111;
	    left: 0;
	    top: 0;
	    border-radius: 10px;
	}

	@keyframes glowing {
	    0% { background-position: 0 0; }
	    50% { background-position: 400% 0; }
	    100% { background-position: 0 0; }
	}



</style>



</head>
<body style="background-color: #dbc9b8;
			margin: 0px;">

<h1 style="text-align: center;">Lust auf ein kleines Rätsel?</h1><br>
<h3 style="text-align: center;">Frage 3: Wofür steht die Abkürzung EDV?
	
</h3>
<br><br><br>
<div>

	<div class="mittig">
		<button class="glow-on-hover" id="button" onclick="popupbild ()">Einfaches Drehvermögen</button>
		<img id="bild" alt="GFG bild" width="30%" src="whatifitoldyou.jpg">
	</div>
<br>
	<div class="mittig">
		<button class="glow-on-hover" id="button2" alt="GFG bild" onclick="popupbild2 ()">Eigenartige Diagrammverkürzung</button>
		<img id="bild2"  src="whatifitoldyou.jpg">
	</div>
<br>
	<div class="mittig">
		<button class="glow-on-hover" id="button3" onclick="popupbild3 ()">Extravagante Datenvermittlung</button>
		<img id="bild3"  src="whatifitoldyou.jpg">
	</div>

	<br><br><br>
	<br>
	<div class="mittig">
		<form action="belohnung.php">
			<button type="submit" style="margin-right: 10px;" class="glow-on-hover">zur Belohnung</button>
		</form>
		<form action="Startseite.php" method="POST">	
			<button type="submit" style="margin-left: 10px;" class="glow-on-hover">zur Startseite</button>
		</form>
	</div>


</div>
<script>

	function popupbild (){
		document.getElementById('bild')
				.style.display = "block";

		document.getElementById('button')
				.style.display = "none";		
	}

		function popupbild2 (){
		document.getElementById('bild2')
				.style.display = "block";

		document.getElementById('button2')
				.style.display = "none";		
	}

			function popupbild3 (){
		document.getElementById('bild3')
				.style.display = "block";

		document.getElementById('button3')
				.style.display = "none";		
	}

</script>


</body>
</html>