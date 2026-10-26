<?php
session_start();
require 'conexion_sql.php';

// Verificar autenticación de forma segura
if (isset($_SESSION['user']) && $_SESSION['user'] === 'FranciscoLatino01') {

    /**
     * Función reutilizable para procesar y subir imágenes de forma segura
     */
    function subirImagen($fileKey, $targetDir = "img_post/") {
        if (isset($_FILES[$fileKey]) && $_FILES[$fileKey]['error'] === UPLOAD_ERR_OK) {
            $filename = basename($_FILES[$fileKey]["name"]);
            $uniqueName = uniqid() . "_" . preg_replace("/[^a-zA-Z0-9\._-]/", "", $filename);
            $targetFile = $targetDir . $uniqueName;
            $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
            $allowed = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

            // Validar si es una imagen real y su extensión está permitida
            $check = @getimagesize($_FILES[$fileKey]["tmp_name"]);
            if ($check !== false && in_array($imageFileType, $allowed)) {
                if (move_uploaded_file($_FILES[$fileKey]["tmp_name"], $targetFile)) {
                    return $targetFile;
                }
            }
        }
        return 'img_post/holder.jpg';
    }

    // Capturar datos del formulario
    $titulo = trim($_POST['titulo'] ?? '');
    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $titulo)));
    $descripcion_corta = trim($_POST['descripcion_corta'] ?? '');
    
    // El cuerpo del artículo conserva intactos los saltos de línea y espacios originales del textarea
    $cuerpo_articulo = $_POST['cuerpo_articulo'] ?? ''; 
    
    $tags = trim($_POST['tags'] ?? '');
    $metatags = trim($_POST['metatags'] ?? '');
    $estado = "publicado";

    // Subir imágenes utilizando la función modular
    $image_path_one = subirImagen('image_one');
    $image_path_two = subirImagen('image_two');
    $image_path_three = subirImagen('image_three');

    // Insertar en la base de datos de forma segura
    $stmt = $conn->prepare("INSERT INTO posts (titulo, slug, descripcion_corta, cuerpo_articulo, image_one, image_two, image_three, tags, metatags, estado) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    
    if ($stmt) {
        $stmt->bind_param("ssssssssss", $titulo, $slug, $descripcion_corta, $cuerpo_articulo, $image_path_one, $image_path_two, $image_path_three, $tags, $metatags, $estado);
        $stmt->execute();
        $stmt->close();
    }

    header("Location: panel_administrador.php");
    exit();

} else {
    header("Location: ../index.html");
    exit();
}
?>