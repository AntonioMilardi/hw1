<?php

    // Avvia la sessione
    session_start();
    // Verifica se l'utente è loggato
    if(!isset($_SESSION['username']))
    {
        // Vai alla login
        header("Location: login.php");
        exit;
    }
    
    if(isset($_POST["password"])) {

             // Connetti al database
            $password = $_POST["password"];
           
            if($_SESSION["password"] == $password) {

                header("Location: cambioCredenziali.php");
                mysqli_free_result($res);
                mysqli_close($conn);
                exit;

            } else {

                    $errore = true;   
            }

       }
    ?>



<!DOCTYPE html>

<html>
 <head>
    <meta name="viewport"
    
    content="width=device-width, initial-scale=1">

    
    <title> The Truth </title>

    <link href="https://fonts.googleapis.com/css2?family=Hurricane&family=Lobster&family=Oswald:wght@200&family=Playfair+Display:ital@1&display=swap" rel="stylesheet">
    

     <link rel="stylesheet" href="Home.css">
 </head>

     <body>

     <?php
                if(isset($errore)){
					echo '<script>alert("La password inserita non corrisponde")</script>';
                }
                ?>



        <nav> 
            <div id="menu1"> 
              <a href='Home.php'>Home</a> 
                <a  href="Profilo.php"> Profilo </a>
                <a href="NotizieTue.php"> Le tue Notizie</a>
                <a href="logout.php">Logout</a>
             </div>
               
            
        </nav>
        <header> 
            <div id="overlay"> </div>
              <div class="Titolo"> The Truth </div> 
              
            </header>

            <section>

             <h1>Per favore, dacci conferma che sei veramente tu!</h1>

             <p>Reinserisci la tua password</p>  
             
             <form name='form' method='post'>
              <input type='password' name='password'>
             <button type="submit">Entra</button>
             </form>

            </section> 
            
                  

          <footer>Pagina progettata e sviluppata da Antonio Milardi O46002063</footer>


     </body>
</html>   
