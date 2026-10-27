<?php
session_start();
// Validación estricta de seguridad
if (!isset($_SESSION['user']) || $_SESSION['user'] !== "FranciscoLatino01") {
    header("Location: ../index.html");
    exit();
}

require 'conexion_sql.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id > 0) {
    // 1. Consultar el estado actual del artículo
    $stmt = $conn->prepare("SELECT estado FROM posts WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        // 2. Invertir el estado (si está publicado pasa a borrador, y viceversa)
        $nuevo_estado = ($row['estado'] === 'publicado') ? 'borrador' : 'publicado';

        // 3. Actualizar en la base de datos
        $stmt_update = $conn->prepare("UPDATE posts SET estado = ? WHERE id = ?");
        $stmt_update->bind_param("si", $nuevo_estado, $id);
        $stmt_update->execute();
        $stmt_update->close();
    }
    $stmt->close();
}

header("Location: panel_administrador.php");
exit();
?>