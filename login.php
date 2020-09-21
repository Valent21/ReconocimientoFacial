<?php

    session_start();
    $_SESSION['usuario'] = $_POST["usuario"];

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "test";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if(!$conn){
    die("no hay conexión: " .mysqli_connect_error());
}

$nombre = $_POST["usuario"];
$password = $_POST["password"];

$query = mysqli_query($conn, "SELECT * FROM login WHERE usuario= '" .$nombre."' and password='".$password ."'");

$nr = mysqli_num_rows($query);

if($nr ==1){
    echo "lo hiciste";
    header("Location: inicio.php");
} else if($nr == 0){
    header("Location: registrate_view.php");
    echo "no pasa nada";
}


?>