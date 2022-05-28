<?php

    // Avvia la sessione
    session_start();
   
    $conn = mysqli_connect("localhost", "root", "", "utenti");
    $vecchio_username = $_SESSION["username"];
    $query = "DELETE  FROM login WHERE Username = '".$vecchio_username."'";
    $res = mysqli_query($conn, $query);
    
    $query = "SELECT * FROM login WHERE username ='".$vecchio_username."'";
    $res = mysqli_query($conn, $query);
    $num_rows = mysqli_num_rows($res);
    if($num_rows>0){

        $eliminato = 0;
    } else {

        $eliminato = 1;
        session_destroy();
        mysqli_close($conn);       
    }
   
    echo $eliminato;
    
?>

