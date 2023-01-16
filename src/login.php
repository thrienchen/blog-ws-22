<?php
session_start();
error_reporting(0);

		include'conn.php';


	if (isset($_POST["Login"]) ) 
		{

		$benutzername = $_POST["benutzername"];
		$passwort = $_POST["passwort"];

			$sqlbefehl = "SELECT * from benutzer 
						  WHERE benutzername = '$benutzername' 
						  AND passwort = '$passwort'";
					
			$datenbankabfrage = mysqli_query($conn, $sqlbefehl );


			$row = mysqli_fetch_array($datenbankabfrage);

				$benutzernamedb = $row['benutzername'];
				$passwortdb = $row['passwort'];



		if (($benutzername == $benutzernamedb) && ($passwort == $passwortdb)) {
			
			$_SESSION['benutzername'] = $benutzername;
			header("Location: https://bob.rewi.uni-mainz.de/edv598/live-version/Startseite.php");
			
		}

	}
?>



<!DOCTYPE html>
<html>
<head>

	  <title>Login</title>
  <link rel="icon" type="image/x-icon" href="favicon.ico">
	
	<style>
	.itemLogin {display:flex;
					justify content:flex-end;
		}
/*		.button {
			background-color: #e08a9e; 
			border: none;
			color: white;
			padding: 10px 15px;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			font-size: 16px;
			border-radius: 2px;
			}  
		.button:hover {
			background-color: #4CAF50;
			color: white;
			transition-duration: 0.4s;
		}
		.buttonlogin:hover {
			box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
		}

*/




	
	

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




.wrapper{
  position: fixed;
  top: 80%;
  left: 50%;
  transform: translate(-50%, -50%);
}

.link_wrapper{
  position: relative;
}

a{
  display: block;
  width: 250px;
  height: 50px;
  line-height: 50px;
  font-weight: bold;
  text-decoration: none;
  background: #333;
  text-align: center;
  color: #fff;
  text-transform: uppercase;
  letter-spacing: 1px;
  border: 3px solid #333;
  transition: all .35s;
}

.icon{
  width: 50px;
  height: 50px;
  border: 3px solid transparent;
  position: absolute;
  transform: rotate(45deg);
  right: 0;
  top: 0;
  z-index: -1;
  transition: all .35s;
}

.icon svg{
  width: 30px;
  position: absolute;
  top: calc(50% - 15px);
  left: calc(50% - 15px);
  transform: rotate(-45deg);
  fill: #964c2c;
  transition: all .35s;
}

a:hover{
  width: 200px;
  border: 3px solid #964c2c;
  background: transparent;
  color: black;
}

a:hover + .icon{
  border: 3px solid #964c2c;
  right: -25%;
}








	</style>
	
	<title> Login </title>
</head>

<br>

<body style="background-color: #dbc9b8;">

	<br><br>

	<h1 align="center">Logge dich mit deinen Anmeldedaten ein, um einen Eintrag zu verfassen.</h1>

	<br><br><br>

	<div style="display: flex;
				justify-content: center;
				align-items: center;">
		<div class="itemLogin">
		
		<table border="0"> 
		<tr> 
		<td width="250px"  bgcolor="#dbc9b8">
		
		<form action="login.php" method="POST">


	<div style="display: flex;
				justify-content: center;
				flex-direction: column;">
			<input style="margin-bottom: 15px;" name="benutzername" type="text" size="15px" maxlength="255px" placeholder="Benutzername"> 
				<br><br><br><br>
			<input name="passwort" type="password" size="15px" maxlength="255px" placeholder="Passwort"> 
				<br><br>
	</div>
<br><br>


				<button class="glow-on-hover" style="color: white;" type="submit" name="Login" value="login">login</button>
				<button class="glow-on-hover" style="color: white;" type="reset" name="zurücksetzen" onclick="popup()">zurücksetzten</button>
			




		</form>
		</td>
		</tr>
		</table>
	
		</div>	
	</div>


<br><br><br>

<div>
	<div class="wrapper">
	  <div class="link_wrapper">
	    <a href="Startseite.php">zur Startseite</a>
	    <div class="icon">
	      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 268.832 268.832">
	        <path d="M265.17 125.577l-80-80c-4.88-4.88-12.796-4.88-17.677 0-4.882 4.882-4.882 12.796 0 17.678l58.66 58.66H12.5c-6.903 0-12.5 5.598-12.5 12.5 0 6.903 5.597 12.5 12.5 12.5h213.654l-58.66 58.662c-4.88 4.882-4.88 12.796 0 17.678 2.44 2.44 5.64 3.66 8.84 3.66s6.398-1.22 8.84-3.66l79.997-80c4.883-4.882 4.883-12.796 0-17.678z"/>
	      </svg>
	    </div>
	  </div>
	  
	</div>


</div>



<script>
function popup() {
  alert("Alle Eingaben werden gelöscht :(");
}
</script>


	</body>
</html>

