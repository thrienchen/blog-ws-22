<?php

session_start();
$benutzername = $_SESSION['benutzername'];
error_reporting(0);


?>

<!DOCTYPE html>
<html>
    <head>
	

	  <title>Eintrag erstellen</title>
  <link rel="icon" type="image/x-icon" href="favicon.ico">
	

    
    <style>
        .container {
			display: flex;
			justify-content: space-around;
			width: 100%;
			height: 30%
        }
		
        .body {
			background-color:#dbc9b8;
			}

			
        h1 {
			margin: 1em 0 0.5em 0;
			color: #333;
			font-weight: normal;
			font-size: 36px;
			line-height: 42px;
			text-transform: uppercase;
			text-shadow: 0 2px white, 0 3px
			}
		
		textarea {
			outline: none;
			resize: none;
		}
		
		input {
			outline: none
		}
			
		.alles {
			align: center;
		}


		button {
		border-radius: 4px;
		background-color: #A48166;
		border: none;
		color: #fff;
		text-align: center;
		font-size: 30px;
		padding: 13px;
		width: 220px;
		transition: all 0.5s;
		cursor: pointer;
		margin: 36px;
		box-shadow: 0 10px 20px -8px rgba(0, 0, 0,.7);
		}

		button{
		cursor: pointer;
		display: inline-block;
		position: relative;
		transition: 0.5s;
		}

		button:after {
		content: '»';
		position: absolute;
		opacity: 0;  
		top: 14px;
		right: -20px;
		transition: 0.5s;
		}

		button:hover{
		padding-right: 24px;
		padding-left:8px;
		}

		button:hover:after {
		opacity: 1;
		right: 10px;
		}



    </style>
    </head>
     <body class="body">



    <h1 align="center">Teile dein Rezept :)</h1>
    
	 <div class="alles">
	 
            <form action="blogeintragerstellen.php" method="POST" enctype="multipart/form-data">

			 
			 <input type="text" name="titel" placeholder="Titel" style="background-color: #e7e2e2">
			 
			 <select name="kategorie" id="kategorie" style="background-color: #e7e2e2">
    <datalist id="kategorie">
      <option value="vorspeise">Vorspeise</option>
      <option value="hauptspeise">Hauptspeise</option>
	  <option value="nachspeise">Nachspeise</option>
	  <option value="vegetarisch">Vegetarisch</option>
    </datalist>
	</select>

	<input type="file" name="images"><i>Datei muss kleiner als 60KB sein :D</i></input>



      <br> <br>

    
    
    <div class="container" style="padding-bottom: 30%;">
         
	<div style="width:45%; height:100%>
            <label for ="zutaten">Zutaten:</label>
            <br>
	
            <textarea name="zutaten" id="zutaten" style="background-color:#e7e2e2; font-family: Arial; width: 100%; height: 300%;" placeholder="Was sind deine Zutaten?"></textarea>
    </div>       
   
        

        
    
     <div style="width:45%; height:100%>
			<label for ="zubereitung">Zubereitung:</label>
                
            <textarea name="zubereitung" id="zubereitung" style="background-color:#e7e2e2; width:100%; height:300%; font-family: Arial" placeholder="Wie kann ich dein Rezept nachmachen? :)"></textarea>
    
	</div>


                      

    </div>
  

    
   <div style="display: flex;
   				justify-content: space-evenly;">

 	<button type="submit" name="abschicken"><span>abschicken!</span></button>
 	</form>



 	<form action="Startseite.php" method="POST">	
 		<button type="submit">zur Startseite</button>
	</form>
      
</div>  


	</div>

     
	 
	 
 
	 
	 <?php
	 
	 include'conn.php';

   
	 if (isset($_POST['abschicken']))
        
		//  && (!empty($_POST['name']))
		// && (!empty($_POST['zutaten']))
		// && (!empty($_POST['zubereitung'])))
		
		{
            $titel = $_POST['titel'];
			$zutaten = $_POST['zutaten'];
			$zubereitung = $_POST['zubereitung'];
			$kategorie = $_POST['kategorie'];
			$image = addslashes(file_get_contents($_FILES['images']['tmp_name']));
			
	//	SQL Befehl zum Einfügen eines Beitrags
		
		$eintragen="INSERT INTO blogeintrag (titel , zutaten, zubereitung, datum, benutzername, kategorie , jpeg)
						VALUES('$titel','$zutaten','$zubereitung' , now() , '$benutzername', '$kategorie' , '$image')";
						
	//	Eintrag eintragen
			
			if (mysqli_query($conn,$eintragen)) {
                echo "Daten wurden übermittelt.";
            }else{
                echo "Daten konnten nicht übermittelt werden.";
                echo mysqli_error($conn);

            }
			
		}
	
	 ?>	 
	 
	
	 
	 
	 
	 
	 
	 
 
    
    </body>
</html>
