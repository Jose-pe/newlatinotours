<?php
session_start();
require 'conexion_sql.php';
$id = intval($_GET['id']);
     if ($_SESSION['user']  !== "FranciscoLatino01") {
     header("Location: ../index.html");
   
    }else{
          $deleteStmt = $conn->prepare("DELETE FROM posts WHERE id = ?");
        $deleteStmt->bind_param("i", $id);
        $deleteStmt->execute();
    
    header("Location: panel_administrador.php");   
    }


  

    // Obtener imagen (si existe) para eliminarla del servidor
      

?>