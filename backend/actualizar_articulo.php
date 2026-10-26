<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['user'] !== 'FranciscoLatino01') {
    header("Location: ../index.html");
    exit();
}

require 'conexion_sql.php';

// Capturar el ID y datos del formulario de edición
$id = intval($_POST['id'] ?? 0);
$titulo = trim($_POST['titulo'] ?? '');
$slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $titulo)));
$descripcion_corta = trim($_POST['descripcion_corta'] ?? '');
$cuerpo_articulo = $_POST['cuerpo_articulo'] ?? '';
$tags = trim($_POST['tags'] ?? '');
$metatags = trim($_POST['metatags'] ?? '');

// Consultar las imágenes actuales en la base de datos para conservarlas si no se sube una nueva
$stmt_img = $conn->prepare("SELECT image_one, image_two, image_three FROM posts WHERE id = ?");
$stmt_img->bind_param("i", $id);
$stmt_img->execute();
$existing_images = $stmt_img->get_result()->fetch_assoc();
$stmt_img->close();

/**
 * Función para actualizar imágenes de forma segura
 */
function actualizarImagen($fileKey, $currentImage, $targetDir = "img_post/") {
    if (isset($_FILES[$fileKey]) && $_FILES[$fileKey]['error'] === UPLOAD_ERR_OK) {
        $filename = basename($_FILES[$fileKey]["name"]);
        $uniqueName = uniqid() . "_" . preg_replace("/[^a-zA-Z0-9\._-]/", "", $filename);
        $targetFile = $targetDir . $uniqueName;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        $allowed = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

        $check = @getimagesize($_FILES[$fileKey]["tmp_name"]);
        if ($check !== false && in_array($imageFileType, $allowed)) {
            if (move_uploaded_file($_FILES[$fileKey]["tmp_name"], $targetFile)) {
                return $targetFile; // Retorna la nueva imagen subida
            }
        }
    }
    return $currentImage; // Si no hay nueva imagen, mantiene la anterior
}

// Procesar imágenes
$image_one = actualizarImagen('image_one', $existing_images['image_one']);
$image_two = actualizarImagen('image_two', $existing_images['image_two']);
$image_three = actualizarImagen('image_three', $existing_images['image_three']);

// Actualizar en la base de datos con sentencia preparada
$stmt = $conn->prepare("UPDATE posts SET titulo = ?, slug = ?, descripcion_corta = ?, cuerpo_articulo = ?, image_one = ?, image_two = ?, image_three = ?, tags = ?, metatags = ? WHERE id = ?");

if ($stmt) {
    $stmt->bind_param("sssssssssi", $titulo, $slug, $descripcion_corta, $cuerpo_articulo, $image_one, $image_two, $image_three, $tags, $metatags, $id);
    $stmt->execute();
    $stmt->close();
}

header("Location: panel_administrador.php");
exit();
?>