<?php

	if (isset($_POST['speichern'])) {
		
		$speichern = $_POST['speichern'];

		if ($speichern ) {

			$cookie = setcookie('banner', 123, time() + (10 * 365 * 24 * 60 * 60));
			$_COOKIE['banner'] = true;
		}
	}	


	if (isset($_COOKIE['banner'])) {
		
		session_start();

	}

	$isteingeloggt = !empty($_SESSION["benutzername"]);

?>


<!DOCTYPE html>
<html>
<head>
	<?php

		include 'conn.php';

	?>

  <title>Startseite</title>
  <link rel="icon" type="image/x-icon" href="favicon.ico">


	<style>
		.navbar {
			width: 100%;
			/*background-color: #557206;*/
			background-color: #B99976;
			height: 70px;
			position: fixed;
			display: flex;
			justify-content: space-around;
			align-items: center;
		}
		.seitliche_werbung{
			width: calc(40% - 30px);
			background-color: #f7e8da;
			padding-top: 50px;
		}
		.navbarschriftart{
			font-weight: bold;
			box-shadow: 2px 1px 2px grey;
			background-color: black;
			padding: 10px;
			margin: 4px 10px 4px 10px;
			color: white;
			border-radius: 20%;
		}
		.navbarschriftart:hover{
			color: black ;
			background-color: white;
			font-size: larger;
	/*		background-color: #DAF7A6;
			border-radius: 10%;
			padding: 10px;
	*/
			cursor: pointer;
		}
		.navbarschriftart:active{
			cursor: pointer;
			margin: 6px 10px 2px 10px;
			box-shadow: 0 0 0 white;
			transition-duration: 0.2s;
		}
		.tabelle_datenbankabfrage{
			border: none;
		}
		.a:link{
			text-decoration: none;
		}
		.a:visited{
			text-decoration: none;
		}
		.blogeintrag_ausgabe_karte{
			box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  			transition: 0.3s;
  			width: calc(50% - 30px);
  			margin: 15px 15px 15px 15px;
  			background-color: #dbc9b8;
  			display: flex;
  			justify-content: flex-start;
		}
		.blogeintrag_ausgabe_karte:hover{
			box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
		}


		.cookiebanner {
			background-color: white;
			border: solid grey 15px;
			width: 70%;
			height: 70%;
			position: fixed;
			left: 50%;
    		top: 50%;
    		transform: translate(-50%, -50%);
    		z-index: 11;
    		text-align: center;
		}
		.cookiebanner_container{
			display: flex;
			justify-content: space-around;
			/*margin-right: 30%;*/
		}
		.cookiebanner_hintergrund_blur{
			position: fixed;
			height: 80%;
			width: 80%;
			z-index: 10;
			/*backdrop-filter: blur(30px);*/
		}

		.banner_background {
			position: fixed;
			height: 100%;
			width: 100%;
			z-index: 10;
			background-color: rgba(176, 167, 146, 0.87);
		}
		.container_im_cookiebanner{
			display: flex;
			justify-content: space-evenly;
		}






		.spezialknopfan{
			cursor: pointer;
		}

		.knopf:disabled, .spezialknopfan[disabled]{
			background-color: grey;
			cursor: not-allowed;
		}
		
		.knopf {
			cursor: pointer;
			background-color: #FFA07A;
			transition: 
			background-color 1s ease,
			color .3s ease;
			border: none;
			border-radius: 5px;
			text-align: center;
			text-decoration: none;
			margin-top: 5px;
			padding: 2px;
		}
		.knopf:enabled:hover {
			color: white;
			background-color: purple;
		}
		.container {
			display: flex;
			justify-content: flex-end;
		}
		.container > * {
			margin-right: 10px;
		}



		/*AB HIER SIND DIE KLASSEN FÜR DIE SCHIEBEKNÖPFE */

 		/* The switch - the box around the slider */
		.switch {
		  position: relative;
		  display: inline-block;
		  width: 44px;
		  height: 27px;
		}

			/* Hide default HTML checkbox */
		.switch input {
		  opacity: 0;
		  width: 0;
		  height: 0;
		}

			/* The slider */
		.slider {
		  position: absolute;
		  cursor: pointer;
		  top: 0;
		  left: 0;
		  right: 0;
		  bottom: 0;
		  background-color: #ccc;
		  -webkit-transition: .4s;
		  transition: .4s;
		}

		.slider:before {
		  position: absolute;
		  content: "";
		  height: 23px;
		  width: 24px;
		  left: 2px;
		  bottom: 2px;
		  background-color: white;
		  -webkit-transition: .4s;
		  transition: .4s;
		}

		input:checked + .slider {
		  background-color: #2196F3;
		}

		input:focus + .slider {
		  box-shadow: 0 0 1px #2196F3;
		}

		input:checked + .slider:before {
		  -webkit-transform: translateX(15px);
		  -ms-transform: translateX(15px);
		  transform: translateX(15px);
		}

		/* Rounded sliders */
		.slider.round {
		  border-radius: 34px;
		}

		.slider.round:before {
		  border-radius: 50%;
		} 




/*DIE SUBMIT BUTTONS DES COOKIE BANNERS*/
	.glow-on-hover {
	    width: 110px;
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
	    left: 0;
	    top: 0;
	    border-radius: 10px;
	}

	@keyframes glowing {
	    0% { background-position: 0 0; }
	    50% { background-position: 400% 0; }
	    100% { background-position: 0 0; }
	}
	.glow-on-hover:disabled{
		background: grey !important;
	}
	.glow-on-hover[disabled]:before{
		background: grey !important;
	}







/*SUCHE BAR*/

.searchBox {
    position: absolute;
    top: 50%;
    left: 50%;
    transform:  translate(-50%,50%);
    background: #2f3640;
    height: 40px;
    border-radius: 40px;
    padding: 10px;

}

.searchBox:hover > .searchInput {
    width: 240px;
    padding: 0 6px;
}

.searchBox:hover > .searchButton {
  background: white;
  color : #2f3640;
}

.searchButton {
    color: white;
    float: right;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: #2f3640;
    display: flex;
    justify-content: center;
    align-items: center;
    transition: 0.4s;
}

.searchInput {
    border:none;
    background: none;
    outline:none;
    float:left;
    padding: 0;
    color: white;
    font-size: 16px;
    transition: 0.4s;
    line-height: 40px;
    width: 0px;

}

@media screen and (max-width: 620px) {
.searchBox:hover > .searchInput {
    width: 150px;
    padding: 0 6px;
}
}






/*ZURÜCKSETZEN BUTTON SUCHE*/
		.zurucksetzen {
			background-color: black; 
			border: none;
			color: white;
			padding: 10px 15px;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			font-size: 16px;
			border-radius: 2px;
			font-family: arial;
			}  
		.zurucksetzen:hover {
			background-color: white;
			color: black;
			transition-duration: 0.4s;
		}
		.buttonlogin:hover {
			box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
		}

















/*SUCHLEISTE*/
* {
  padding: 0;
  margin: 0;
}


.flexbox {
  width: 100%;
  height: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
}

.search {
  margin: 20px;
}

.search > h3 {
  font-weight: normal;
}

.search > h1,
.search > h3 {
  color: black;
  margin-bottom: 15px;
  text-shadow: 0 1px #0091c2;
}

.search > div {
  display: inline-block;
  position: relative;
  filter: drop-shadow(0 1px #0091c2);
}

.search > div:after {
  content: "";
  background: black;
  width: 4px;
  height: 20px;
  position: absolute;
  top: 40px;
  right: 2px;
  transform: rotate(135deg);
}

.search > div > input {
  color: black;
  font-size: 16px;
  background: transparent;
  width: 25px;
  height: 25px;
  padding: 10px;
  border: solid 3px black;
  outline: none;
  border-radius: 35px;
  transition: width 0.5s;
}

.search > div > input::placeholder {
  color: black;
  opacity: 0;
  transition: opacity 150ms ease-out;
}

.search > div > input:focus::placeholder {
  opacity: 1;
}

.search > div > input:focus,
.search > div > input:not(:placeholder-shown) {
  width: 250px;
}



.hintergrundbild{
	background-image: url("https://images.unsplash.com/photo-1628070852047-dc2ea1da3ffd?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8NXx8ZmxvcmFsJTIwcGF0dGVybnxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=900&q=60");
	margin: 0px;
	width: 100%;
	background-position: top;
}









	</style>





</head>

<body class="hintergrundbild">


<?php  

if (!isset($_COOKIE["banner"])) {
	
?>


<!-- COOKIE BANNER -->

	<div class="banner_background">
		<div class="cookiebanner cookiebanner_hintergrund_blur">
			<div style="text-align: center;
						font-size: x-large;">
				<h1> LASST UNS KEKSE BACKEN. </h1>
			</div>
			<div style="text-align: block;
						margin-left: 20px;
						font-size: x-large;">
				<h4> Hilf uns, unsere Keksrezepte zu verbessern. Durch kleine Daten, die wie chocolate Chips in unseren Teig kommen, schmeckt das ganze Internet auf einmal viel besser! </h4>
			</div>
			<div style="margin-left: 20px;
						font-size: x-large;">
				<h4>Trage bei zu:</h4>
			</div>
			<div>

				<form 	method="POST"
						action="Startseite.php">

					<table style="margin-left: 300px;
								font-size: x-large;">
						<tr>
							<td>
								Chocolate chip cookies
							</td>
							<td style="padding-left: 250px;">
							<label class="switch"
									name="checkbox1">
								  <input type="checkbox" onchange="clickswitch()">
								  <span class="slider round"></span>
							</label>							
							</td>
						</tr>
						<tr>
							<td>
								Erdnussbutterkekse
							</td>
							<td  style="padding-left: 250px;">
							<label class="switch"
									name="checkbox2">
								  <input type="checkbox" onchange="clickswitch()">
								  <span class="slider round"></span>
							</label>							
							</td>
						</tr>
						<tr>
							<td>
								Weihnachtsplätzchen
							</td>
							<td  style="padding-left: 250px;">
							<label class="switch"
									name="checkbox3">
								  <input type="checkbox" onchange="clickswitch()">
								  <span class="slider round"></span>
							</label>							
							</td>
						</tr>	
						<tr>
							<td>
								Zimtschnecken
							</td>
							<td  style="padding-left: 250px;">
							<label class="switch"
									name="checkbox4">
								  <input type="checkbox" onchange="clickswitch()">
								  <span class="slider round"></span>
							</label>							
							</td>
						</tr>	
						<tr>
							<td>
								Hartekuche
							</td>
							<td  style="padding-left: 250px;">
							<label class="switch"
									name="checkbox5">
								  <input type="checkbox" onchange="clickswitch()">
								  <span class="slider round"></span>
							</label>							
							</td>
						</tr>
																					
					</table>


				</form>

			</div>
<br><br><br>
			<div style="color: black;
						display: flex;
						justify-content: center;">
				<form method="POST" action="https://de.wikipedia.org/wiki/HTTP-Cookie">

						<button  class  = "glow-on-hover" 
								name   = "ablehnen"
								type   = "submit"
								value  = "Ablehnen" 
								style  = "margin-right: 10px;">Ablehnen</button>
				</form>
			</div>

			<br>

			<div style="display: flex;
						justify-content: center;">
				<form 	method = "POST"
						action = "Startseite.php">
						<button  class  = "spezialknopfan glow-on-hover" 
								name   = "speichern"
								type   = "submit" 
								value  = "Einstellungen speichern" 
								disabled = "true"
								style  = "margin-right: 10px;">Speichern</button>					
				</form>						
			</div>

		 </div>

	</div>

			<script>
				function clickswitch() {
					on = false
					switches = document.querySelectorAll( '.switch > input');
					for (var i = switches.length - 1; i >= 0; i--) {
						if (switches[i].checked == true) {
							on = true;
						}
					}
					if ( on == true ) {
						document.querySelector('.spezialknopfan').disabled = false;
					} else {
						document.querySelector('.spezialknopfan').disabled = true
					}
				}
			</script>

<?php } ?>





<!-- DIE NAVBAR -->
	<div class="navbar">

	<?php if(!$isteingeloggt) { ?>
		<a class="navbarschriftart" style="text-decoration: none;" href="Registrierung2.php">
			Registrieren
		</a>
	<?php } ?>


	<?php if(!$isteingeloggt) { ?>
			<a href="login.php" class="a">
				<div class="navbarschriftart">
					Login
				</div>
			</a>
	<?php } ?>



				<?php
				if($isteingeloggt) { ?>	
					
				<a href="logout.php" class="a">
				<div class="navbarschriftart">
					Logout
				</div>
	
				
				<?php
				}
				?>

	<?php if($isteingeloggt) { ?>
			<a href="blogeintragerstellen.php" class="a">
				<div class="navbarschriftart">
					Rezept erstellen
				</div>
			</a>
	<?php } ?>

		<?php if($isteingeloggt) { ?>
			<a href="quiz1.php" class="a">
				<div class="navbarschriftart">
					Quiz
				</div>
			</a>
	<?php } ?>


	</div>














<!-- DIE BEIDEN DIVS SIND DER GRAUE/GRÜNE SCROLLFORTSCHRITTBALKEN OBEN -->
	<div style="background-color: grey;
				width: 100%;
				height: 8px;
				position: fixed;">
		<div id="scrollfortschritt" style="background:black; 
											width:50%;
											height: 8px;">		
		</div>
	</div>







	<div style="display: flex;
				justify-content: space-around;
				padding-top: 50px;">
		<div style="width: calc(60% - 30px);
					background-color: #f7e8da;
					padding: 50px 0px 100px 0px;">
					
					<br><br>
					<h1 style="text-align:center;">Willkommen!</h1>
					<br><br>
					<h3 style="text-align: center;
								margin: 0px 5px 0px 5px;">Schön, dass Du uns gefunden hast 😉. Möchtest Du nach einem Eintrag suchen, um Dich inspirieren zu lassen oder selbst ein Rezept verfassen und mit anderen Deine Lieblingsrezepte teilen? Sieh Dir jetzt die neuesten Einträge an! 
					<br><br>
					ODER: Klicke auf alles was du siehst und finde heraus, was passiert 😊!

					</h3>
					
					
					
					
		</div>
		<div class="seitliche_werbung" style="display:flex; justify-content: center;">

			<br>
	<div>
				<h2 style="text-align: center;">Check unseren Instagram-Account!</h2>

<!-- 				INSTAGRAM EINBETTUNG -->
			<blockquote class="instagram-media" data-instgrm-captioned data-instgrm-permalink="https://www.instagram.com/p/CYo80hXqiw6/?utm_source=ig_embed&amp;utm_campaign=loading" data-instgrm-version="14" style=" background:#FFF; border:0; border-radius:3px; box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15); margin: 1px; max-width:540px; min-width:326px; padding:0; width:99.375%; width:-webkit-calc(100% - 2px); width:calc(100% - 2px);"><div style="padding:16px;"> <a href="https://www.instagram.com/p/CYo80hXqiw6/?utm_source=ig_embed&amp;utm_campaign=loading" style=" background:#FFFFFF; line-height:0; padding:0 0; text-align:center; text-decoration:none; width:100%;" target="_blank"> <div style=" display: flex; flex-direction: row; align-items: center;"> <div style="background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 40px; margin-right: 14px; width: 40px;"></div> <div style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center;"> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 100px;"></div> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 60px;"></div></div></div><div style="padding: 19% 0;"></div> <div style="display:block; height:50px; margin:0 auto 12px; width:50px;"><svg width="50px" height="50px" viewBox="0 0 60 60" version="1.1" xmlns="https://www.w3.org/2000/svg" xmlns:xlink="https://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-511.000000, -20.000000)" fill="#000000"><g><path d="M556.869,30.41 C554.814,30.41 553.148,32.076 553.148,34.131 C553.148,36.186 554.814,37.852 556.869,37.852 C558.924,37.852 560.59,36.186 560.59,34.131 C560.59,32.076 558.924,30.41 556.869,30.41 M541,60.657 C535.114,60.657 530.342,55.887 530.342,50 C530.342,44.114 535.114,39.342 541,39.342 C546.887,39.342 551.658,44.114 551.658,50 C551.658,55.887 546.887,60.657 541,60.657 M541,33.886 C532.1,33.886 524.886,41.1 524.886,50 C524.886,58.899 532.1,66.113 541,66.113 C549.9,66.113 557.115,58.899 557.115,50 C557.115,41.1 549.9,33.886 541,33.886 M565.378,62.101 C565.244,65.022 564.756,66.606 564.346,67.663 C563.803,69.06 563.154,70.057 562.106,71.106 C561.058,72.155 560.06,72.803 558.662,73.347 C557.607,73.757 556.021,74.244 553.102,74.378 C549.944,74.521 548.997,74.552 541,74.552 C533.003,74.552 532.056,74.521 528.898,74.378 C525.979,74.244 524.393,73.757 523.338,73.347 C521.94,72.803 520.942,72.155 519.894,71.106 C518.846,70.057 518.197,69.06 517.654,67.663 C517.244,66.606 516.755,65.022 516.623,62.101 C516.479,58.943 516.448,57.996 516.448,50 C516.448,42.003 516.479,41.056 516.623,37.899 C516.755,34.978 517.244,33.391 517.654,32.338 C518.197,30.938 518.846,29.942 519.894,28.894 C520.942,27.846 521.94,27.196 523.338,26.654 C524.393,26.244 525.979,25.756 528.898,25.623 C532.057,25.479 533.004,25.448 541,25.448 C548.997,25.448 549.943,25.479 553.102,25.623 C556.021,25.756 557.607,26.244 558.662,26.654 C560.06,27.196 561.058,27.846 562.106,28.894 C563.154,29.942 563.803,30.938 564.346,32.338 C564.756,33.391 565.244,34.978 565.378,37.899 C565.522,41.056 565.552,42.003 565.552,50 C565.552,57.996 565.522,58.943 565.378,62.101 M570.82,37.631 C570.674,34.438 570.167,32.258 569.425,30.349 C568.659,28.377 567.633,26.702 565.965,25.035 C564.297,23.368 562.623,22.342 560.652,21.575 C558.743,20.834 556.562,20.326 553.369,20.18 C550.169,20.033 549.148,20 541,20 C532.853,20 531.831,20.033 528.631,20.18 C525.438,20.326 523.257,20.834 521.349,21.575 C519.376,22.342 517.703,23.368 516.035,25.035 C514.368,26.702 513.342,28.377 512.574,30.349 C511.834,32.258 511.326,34.438 511.181,37.631 C511.035,40.831 511,41.851 511,50 C511,58.147 511.035,59.17 511.181,62.369 C511.326,65.562 511.834,67.743 512.574,69.651 C513.342,71.625 514.368,73.296 516.035,74.965 C517.703,76.634 519.376,77.658 521.349,78.425 C523.257,79.167 525.438,79.673 528.631,79.82 C531.831,79.965 532.853,80.001 541,80.001 C549.148,80.001 550.169,79.965 553.369,79.82 C556.562,79.673 558.743,79.167 560.652,78.425 C562.623,77.658 564.297,76.634 565.965,74.965 C567.633,73.296 568.659,71.625 569.425,69.651 C570.167,67.743 570.674,65.562 570.82,62.369 C570.966,59.17 571,58.147 571,50 C571,41.851 570.966,40.831 570.82,37.631"></path></g></g></g></svg></div><div style="padding-top: 8px;"> <div style=" color:#3897f0; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:550; line-height:18px;">Sieh dir diesen Beitrag auf Instagram an</div></div><div style="padding: 12.5% 0;"></div> <div style="display: flex; flex-direction: row; margin-bottom: 14px; align-items: center;"><div> <div style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(0px) translateY(7px);"></div> <div style="background-color: #F4F4F4; height: 12.5px; transform: rotate(-45deg) translateX(3px) translateY(1px); width: 12.5px; flex-grow: 0; margin-right: 14px; margin-left: 2px;"></div> <div style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(9px) translateY(-18px);"></div></div><div style="margin-left: 8px;"> <div style=" background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 20px; width: 20px;"></div> <div style=" width: 0; height: 0; border-top: 2px solid transparent; border-left: 6px solid #f4f4f4; border-bottom: 2px solid transparent; transform: translateX(16px) translateY(-4px) rotate(30deg)"></div></div><div style="margin-left: auto;"> <div style=" width: 0px; border-top: 8px solid #F4F4F4; border-right: 8px solid transparent; transform: translateY(16px);"></div> <div style=" background-color: #F4F4F4; flex-grow: 0; height: 12px; width: 16px; transform: translateY(-4px);"></div> <div style=" width: 0; height: 0; border-top: 8px solid #F4F4F4; border-left: 8px solid transparent; transform: translateY(-4px) translateX(8px);"></div></div></div> <div style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center; margin-bottom: 24px;"> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 224px;"></div> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 144px;"></div></div></a><p style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; line-height:17px; margin-bottom:0; margin-top:8px; overflow:hidden; padding:8px 0 7px; text-align:center; text-overflow:ellipsis; white-space:nowrap;"><a href="https://www.instagram.com/p/CYo80hXqiw6/?utm_source=ig_embed&amp;utm_campaign=loading" style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:normal; line-height:17px; text-decoration:none;" target="_blank">Ein Beitrag geteilt von edv598 (@backebackekuchen598)</a></p></div></blockquote> <script async src="//www.instagram.com/embed.js"></script>
		


	</div>
		</div>
	</div>




	<div style="display: flex;
				justify-content: space-around;
				margin-top: 30px;">


	<!-- SPOTIFY	 -->
		<div style="background-color: #f7e8da;
					width: calc(50% - 30px);">
<br>
					<h3 style="text-align:center">Die perfekte Playlist für deine Penne:</h3>
					<br>

					<iframe src="https://open.spotify.com/embed/playlist/0uaL8RD8A5mn0SWMKAAlSj?utm_source=generator&theme=0" width="100%" height="340" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture"></iframe>
		</div>
		<div style="width: calc(50% - 30px);
		background-color: #f7e8da;">
			<!-- YOUTUBEVIDEO -->
			<br>
			<h3 style="text-align: center;">Für Anfänger:</h3>
			<br>
			<iframe width="605" height="340" src="https://www.youtube.com/embed/FTociictyyE" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
		</div>
	</div>



<!-- DIE SUCHLEISTE -->
	<div style="display:flex;
				justify-content: center;">

		<div style="background-color: #f7e8da;
					width: calc(100% - 30px);
					padding: 10px 0px 20px 0px;
					margin-top: 30px;">


					<form method="POST" action="Startseite.php">


			<div class="flexbox">
			  <div class="search">
			    <div>
			      <input type="text" name="suche" placeholder="Suchen" required>
			    </div>
			  </div>
			</div>
<!-- 						<input type="text" name="suche" placeholder="Suche" />
						<input type="submit" name="Los!"> -->
						
					</form> 


			<div style="display:flex;
						justify-content: center;">
				<a style="text-decoration: none;"
					class="zurucksetzen buttonlogin" 
					href="Startseite.php">Zurücksetzen</a>
			</div>


		</div>
	</div>



<!-- DATENBNKABFRAGE & ABLAGE DER ERGEBNISSE IN KARTEN MIT KLASSE BLOGEINTRAG_AUSGABE_KARTE -->
	<div style="background-color:#f7e8da;
				margin-top: 30px;
				margin-left: 15px;
				width: calc(100% - 30px);
				padding: 20px 0px 20px 0px;">
		<?php
		error_reporting(0);
			// Erstmal die Suche aus dem HTML-Formular holen:

	if (isset($_POST['suche'])) {
	
		$suche = $_POST['suche'] ?? "";



			$vergleichbefehl = "
				SELECT * from blogeintrag 
				WHERE zutaten LIKE '%${suche}%'
				OR zubereitung LIKE '%${suche}%'
				OR titel LIKE '%${suche}%'
				ORDER BY datum DESC";

				$datenbankabfrage_vergleich = mysqli_query($conn, $vergleichbefehl);
			
			
				while ($row = mysqli_fetch_row($datenbankabfrage_vergleich)) {
					?>
						<div class="blogeintrag_ausgabe_karte">

							<br>
							<div style="float: left;">
								<div style="font-weight: bolder;
											text-align: justify;
											margin: 0px 3px 3px 3px;">
								<?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $row[8] ).'"/>'; ?><br>
								Titel: <?= $row[0] ?><br>
								Datum:   <?= $row[4] ?><br>
								Ersteller:   <?= $row[6] ?><br>
								Kategorie:   <?= $row[7] ?><br>
								Zutaten: <br><?= $row[1] ?><br><br>
								Zubereitung:<br><?= $row[2] ?><br>

								</div>
							</div>
						</div>
				
					<?php
				}
	}else{
			
					$sqlbefehl = "SELECT * from blogeintrag ORDER BY id DESC";

					
						$datenbankabfrage = mysqli_query($conn, $sqlbefehl );
				?>
				<div style="display:flex;
							flex-wrap: wrap;
							flex-grow: 0;
							flex-shrink: 0;
							flex-basis: 100%;">					
				<?php

					while ($row = mysqli_fetch_row($datenbankabfrage)) {
				?>
					<div class="blogeintrag_ausgabe_karte">
						<br>
						<div style="float: left;">
							<div style="font-weight: bolder;
										text-align: justify;
										margin: 0px 3px 3px 3px;">
								<?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $row[8] ).'"/>'; ?><br>
								Titel: <?= $row[0] ?><br>
								Datum:   <?= $row[4] ?><br>
								Ersteller:   <?= $row[6] ?><br>
								Kategorie:   <?= $row[7] ?><br>
								Zutaten:<br><?= $row[1] ?><br><br>
								Zubereitung:<br><?= $row[2] ?><br>

								</div>
						</div>
					</div>
			
				<?php
						
					}


		} 	
		?>
		
		</div>	
	</div>




<!-- Funktion für das Scrollfortschritt-div -->
	<script>

		const updateScroll = function() {
	  		const winScroll = document.body.scrollTop || document.documentElement.scrollTop
	  		const height = document.documentElement.scrollHeight - document.documentElement.clientHeight
	  		const scrolled = (winScroll / height) * 100
	  		console.log(scrolled)
	  		document.getElementById("scrollfortschritt").style.width = scrolled + "%"
		}

		window.onscroll = updateScroll;
		updateScroll()

	</script>


<br><br>



</body>
</html>




