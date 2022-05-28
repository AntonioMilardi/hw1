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



if(isset($_POST["nome"]) && isset($_POST['cognome']) && 
       isset($_POST['username']) && isset($_POST['password'])){


        if(strlen($_POST['username']) == 0) {

            $errore_username1 = true;

        }


        $nome = $_POST["nome"];
        $cognome = $_POST["cognome"];
        $username = $_POST["username"];
        $password = $_POST["password"];

        if(strlen($_POST["password"])<8) {

            $errore_password = true;  

      }

      if(!preg_match('/^[a-zA-Z0-9_]{1,15}$/', $_POST['nome'])) {
        $errore_nome = true;
    } 

    if(!preg_match('/^[a-zA-Z0-9_]{1,15}$/', $_POST['cognome'])) {
        $errore_cognome = true;
    } 


        $conn = mysqli_connect("localhost", "root", "", "prova");
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $query = "SELECT username FROM login where username='$username'";
        $res = mysqli_query($conn, $query);
        if (mysqli_num_rows($res) > 0)
            $errore_username = true;
        mysqli_free_result($res);
        mysqli_close($conn);

        if(!isset($errore_username) && !isset($errore_password)){
            // Connetti al database
            $conn = mysqli_connect("localhost", "root", "", "utenti");
            if (!$conn) {
                die("Connessione Fallita");
                }

                $nome = mysqli_real_escape_string($conn, $_POST['nome']);
                $cognome = mysqli_real_escape_string($conn, $_POST['cognome']);
                $username = mysqli_real_escape_string($conn, $_POST['username']);
                $password = mysqli_real_escape_string($conn, $_POST['password']);
                $hashedpassword =  md5($password);
               
                $vecchio_username =  $_SESSION["username"];
                $query = "UPDATE login SET Nome = '$nome' , Cognome = '$cognome' , Username = '$username' , Pass = '$hashedpassword' where Username = '$vecchio_username'";
                echo($query);
                $res = mysqli_query($conn, $query);
        mysqli_close($conn);
        $_SESSION["username"] = $username;
        $_SESSION["password"] = $_POST["password"];
        header("Location: login.php");
        exit;
         }
       }

        ?>


<html>
      <head>
      <meta name="viewport"
    
    content="width=device-width, initial-scale=1">
        <link rel='stylesheet' href='login.css'>
        <script src='registrazione.js' defer></script>
        <link href="https://fonts.googleapis.com/css2?family=Hurricane&family=Lobster&family=Oswald:wght@200&family=Playfair+Display:ital@1&display=swap" rel="stylesheet">
    </head>

    <body>
    <?php

               if (isset($errore_username1)) {
                echo '<script>alert("Inserisci un username")</script>';
            }

               if (isset($errore_username)) {
                echo '<script>alert("Username esistente")</script>';
            }

            if (isset($errore_password)) {
                echo '<script>alert("password troppo corta")</script>';
            }

            if (isset($errore_nome)) {
                echo '<script>alert("Formato Nome errato")</script>';
            }

                
               if (isset($errore_cognome)) {
                echo '<script>alert("Formato Cognome errato")</script>';
            }


       ?>
              

 
<div class="container">
<h1>Inserisci i nuovi dati</h1>
                <form name='form' method='post'>
                <p><label>Nome <input type='text' name='nome'></label></p>

                <p><label>Cognome <input type='text' name='cognome'></label></p>

                    <p><label>Username <input type='text' name='username'></label></p>
                    <p><label>Password <input type='password' name='password'></label></p>
                    <button type="submit">Cambia credenziali</button>
                    <button onclick="location.href='Profilo.php'" type="button">Indietro</button>       
       
				 </form>
        </div>
</div>
    </body>
</html>
