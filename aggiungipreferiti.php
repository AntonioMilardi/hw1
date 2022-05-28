<?php

session_start();
$conn = mysqli_connect("localhost", "root", "", "utenti");
$correnteuser = $_SESSION["username"];
$immagine=$_GET['q'];
$titolo=$_GET['b'];
$autore=$_GET['a'];
$query = "INSERT INTO preferiti VALUES ('$correnteuser', '$titolo', '$autore', '$immagine')";
$res = mysqli_query($conn, $query);
mysqli_close($conn);
exit;
?>

