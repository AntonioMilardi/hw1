<?php

session_start();
$conn = mysqli_connect("localhost", "root", "", "utenti");
$correnteuser = $_SESSION["username"];
$titolo=$_GET['q'];
$query = "DELETE FROM preferiti WHERE user = '$correnteuser' && titolo = '$titolo'";
$res = mysqli_query($conn, $query);
mysqli_close($conn);
exit;
?>