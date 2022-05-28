
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
    ?>

<!DOCTYPE html>

<html>
 <head>
    <meta name="viewport"
    
    content="width=device-width, initial-scale=1">

    <script src="NotizieTue.js" defer></script>
    <title> The Truth </title>

    <link href="https://fonts.googleapis.com/css2?family=Hurricane&family=Lobster&family=Oswald:wght@200&family=Playfair+Display:ital@1&display=swap" rel="stylesheet">
    

     <link rel="stylesheet" href="Home.css">
     <link rel="stylesheet" href="preferiti.css">
 </head>

     <body>

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
            <p> Ecco le tue notizie  preferite </p>

            <div id="informazioni"></div> 

          <p> Se non ne vedi aggiungine qualcuna dalla Home </p>

          <footer>Pagina progettata e sviluppata da Antonio Milardi O46002063</footer>


     </body>
</html>   