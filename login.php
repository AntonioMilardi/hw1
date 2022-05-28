<!DOCTYPE.html>

<?php
    // Avvia la sessione
    session_start();
    // Verifica l'accesso
    if(isset($_SESSION["username"]))
    {
        // Vai alla home
        header("Location: Home.php");
        exit;
    }

    // Verifica l'esistenza di dati POST
    if(isset($_POST["username"]) && isset($_POST["password"]))
    {
        // Connetti al database
        $conn = mysqli_connect("localhost", "root", "", "utenti");
        // Verifico la connessione
        if (!$conn) {
            die("Connessione Fallita");
            }


        //escapde delle credenziali
        $username = mysqli_real_escape_string($conn, $_POST["username"]);
        $password = mysqli_real_escape_string($conn, $_POST["password"]);
        $hashedpassword =  md5($password);;
        // Cerca utenti con quelle credenziali
        $query = "SELECT * FROM login WHERE username = '$username'";
        $res = mysqli_query($conn, $query);
        $num_rows = mysqli_num_rows($res);
        if($num_rows>0)
        {
            $row = mysqli_fetch_object($res);
             $passwordnuova= $row->Pass;
            
            if($hashedpassword==$passwordnuova){

            $_SESSION["username"] = $_POST["username"];
            $_SESSION["password"] = $_POST["password"];

            header("Location: Home.php");
            mysqli_free_result($res);
            mysqli_close($conn);
            exit;
            }
            else
            {
                $errore = true;
            }
        }
        else
        {
            $errore = true;
        }

}
?>


<html>

      <head>
      <meta name="viewport"
    
    content="width=device-width, initial-scale=1">
      <link href="https://fonts.googleapis.com/css2?family=Hurricane&family=Lobster&family=Oswald:wght@200&family=Playfair+Display:ital@1&display=swap" rel="stylesheet">
        <link rel='stylesheet' href='login.css'>
        <script src='login.js' defer></script>
    </head>

    <body>

                <?php
                if(isset($errore)){
					echo '<script>alert("Errore credenziali")</script>';
                }
                ?>

<div class="container">
                 <h1>The Truth</h1>
                <form name='form' method='post' action="login.php">
                    <p><label>Username <input type='text' name='username'></label></p>
                    <p><label>Password <input type='password' name='password'></label></p>
                    <button type="submit">Entra</button>
					<button onclick="location.href='registrazione.php'" type="button">Registrati</button>       
				 </form>
        </div>
</div>

           

        
    </body>

</html>
