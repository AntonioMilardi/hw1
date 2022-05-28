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

    <script src="Profilo.js" defer></script>
    <title> The Truth </title>

    
    <link href="https://fonts.googleapis.com/css2?family=Hurricane&family=Lobster&family=Oswald:wght@200&family=Playfair+Display:ital@1&display=swap" rel="stylesheet">
    

     <link rel="stylesheet" href="Profilo.css">
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


            <div class= "pre-section"> Gentile Utente,</br> ecco le tue credenziali </div> 

                <section>

                <?php

    $utente_c = $_SESSION['username'];

    // Connetti al database
    $conn = mysqli_connect("localhost", "root", "", "utenti");
    // Verifico la connessione
    if (!$conn) {
        die("Connessione Fallita");
        }	

        $query = "SELECT * FROM login WHERE username = '$utente_c' ";
        $res = mysqli_query($conn, $query);
        while($row= mysqli_fetch_object($res))
        {
            $_SESSION['display-user']="<div class='display-user-style'> <h1>Nome: $row->Nome</h1>  <h1>Cognome: $row->Cognome</h1>   <h1>Username: $row->Username</h1> </div>";
           //echo "<h1></h1>" .$row ->Nome. "<h1></h1>" .$row ->Cognome. "<h1></h1>" .$row ->Username. "<h1></h1>" .$row ->Password. "<h1></h1>";
           echo $_SESSION['display-user'];
        }
        mysqli_free_result($res);
        mysqli_close($conn);

?>
            <div class="container">
                <form name="cambio" id="cambio">
                 <label>Vuoi cambiarne qualcuna?</label>
                 <button onclick="location.href='controlloPassword.php'" type="button">Voglio Cambiarle</button> </br> 
                 <label>Vuoi eliminare l'account?</label>
                 <button type="submit">Elimina</button>
                 </form>
            </div>    

                </section>

                <footer>Pagina progettata e sviluppata da Antonio Milardi O46002063</footer>


   </body>
</html>   




