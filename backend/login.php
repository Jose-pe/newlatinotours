<?php 

session_start();
$user = $_POST["user"];
$password = $_POST["password"];
 
if ($user == "FranciscoLatino01" and $password == "latinoto2025*99") {
   
    $_SESSION["user"] = $user; 
    header("Location: panel_administrador.php");
}else
{
     header("Location: ../index.html");
     session_destroy();
}


?>