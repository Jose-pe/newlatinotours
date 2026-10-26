<?php
session_start();
// Validación estricta de seguridad al inicio
if (!isset($_SESSION['user']) || $_SESSION['user'] !== "FranciscoLatino01") {
    header("Location: ../index.html");
    exit();
}

require 'conexion_sql.php';

// Obtener el ID del artículo de forma segura
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$stmt = $conn->prepare("SELECT * FROM posts WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    header("Location: panel_administrador.php");
    exit();
}

$post = $result->fetch_assoc();
$stmt->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Artículo | Panel de Administración Latino Tours</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    
    <style>
        :root {
            --primary-color: #f39c12;
            --primary-hover: #d68910;
            --dark-color: #212529;
            --text-color: #333333;
            --bg-light: #f8f9fa;
        }
        body {
            font-family: 'Poppins', sans-serif;
            color: var(--text-color);
            background-color: var(--bg-light);
        }
        .admin-card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 5px 25px rgba(0,0,0,0.05);
            background: #ffffff;
        }
        .form-control {
            border-radius: 10px;
            padding: 12px 15px;
            font-size: 0.95rem;
            border: 1px solid #dee2e6;
        }
        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.25rem rgba(243, 156, 18, 0.25);
        }
        .section-title {
            font-weight: 700;
            color: #1a1a1a;
            text-transform: uppercase;
            font-size: 1.1rem;
            letter-spacing: 0.5px;
        }
        .preview-img {
            max-height: 80px;
            border-radius: 8px;
            object-fit: cover;
        }
    </style>
</head>
<body>

    <!-- Top Admin Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm py-3">
        <div class="container">
            <a class="navbar-brand fw-bold" href="panel_administrador.php">
                <i class="fa-solid fa-gauge-high me-2 text-warning"></i> Gestor de Contenido | Latino Tours
            </a>
            <div class="d-flex align-items-center">
                <span class="text-light me-3 small d-none d-md-inline">Hola, <strong><?php echo htmlspecialchars($_SESSION['user']); ?></strong></span>
                <a href="end_session.php" class="btn btn-outline-warning btn-sm fw-semibold">Cerrar Sesión</a>
            </div>
        </div>
    </nav>

    <!-- Navigation Action Buttons -->
    <div class="container my-4">
        <div class="row justify-content-center">
            <div class="col-md-10 text-center">
                <div class="d-flex justify-content-center gap-2 flex-wrap">
                    <a href="creararticulo.php" class="btn btn-outline-dark fw-semibold px-4 rounded-pill">
                        <i class="fa-solid fa-plus me-2"></i> Crear Artículo
                    </a>
                    <a href="panel_administrador.php" class="btn btn-dark fw-semibold px-4 rounded-pill">
                        <i class="fa-solid fa-list me-2"></i> Listar Artículos
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Form Section -->
    <main class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                
                <div class="text-center mb-4">
                    <h2 class="fw-bold text-dark text-uppercase"><i class="fa-solid fa-pen-to-square text-warning me-2"></i> Editar Artículo</h2>
                    <p class="text-muted small">Modifica los campos necesarios y guarda los cambios.</p>
                </div>

                <!-- Formulario conectado a actualizar_articulo.php -->
                <form action="actualizar_articulo.php" method="POST" enctype="multipart/form-data" class="admin-card p-4 p-md-5">
                    
                    <!-- ID Oculto para identificar el registro -->
                    <input type="hidden" name="id" value="<?php echo $post['id']; ?>">

                    <!-- Sección 1: Información General -->
                    <div class="mb-4">
                        <h5 class="section-title mb-3 pb-2 border-bottom text-primary">
                            <i class="fa-solid fa-circle-info me-2"></i> Información Principal
                        </h5>
                        
                        <div class="mb-3">
                            <label for="titulo" class="form-label fw-semibold">Título <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="titulo" id="titulo" value="<?php echo htmlspecialchars($post['titulo'], ENT_QUOTES, 'UTF-8'); ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="descripcion_corta" class="form-label fw-semibold">Descripción Corta <span class="text-danger">*</span></label>
                            <textarea name="descripcion_corta" id="descripcion_corta" class="form-control" rows="3" required><?php echo htmlspecialchars($post['descripcion_corta'], ENT_QUOTES, 'UTF-8'); ?></textarea>
                        </div>
                    </div>

                    <!-- Sección 2: Contenido -->
                    <div class="mb-4">
                        <h5 class="section-title mb-3 pb-2 border-bottom text-primary">
                            <i class="fa-solid fa-file-lines me-2"></i> Contenido Principal
                        </h5>
                        
                        <div class="mb-3">
                            <label for="cuerpo_articulo" class="form-label fw-semibold">Cuerpo del Artículo <span class="text-danger">*</span></label>
                            <textarea name="cuerpo_articulo" id="cuerpo_articulo" class="form-control" rows="12" required><?php echo htmlspecialchars($post['cuerpo_articulo'], ENT_QUOTES, 'UTF-8'); ?></textarea>
                        </div>
                    </div>

                    <!-- Sección 3: Imágenes -->
                    <div class="mb-4">
                        <h5 class="section-title mb-3 pb-2 border-bottom text-primary">
                            <i class="fa-solid fa-images me-2"></i> Imágenes del Artículo
                        </h5>
                        
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label for="image_one" class="form-label fw-semibold small">Imagen principal</label>
                                <?php if (!empty($post['image_one'])): ?>
                                    <div class="mb-2"><img src="<?php echo htmlspecialchars($post['image_one'], ENT_QUOTES, 'UTF-8'); ?>" class="preview-img" alt="Actual 1"></div>
                                <?php endif; ?>
                                <input class="form-control form-control-sm" type="file" id="image_one" name="image_one" accept="image/*">
                            </div>
                            <div class="col-md-4">
                                <label for="image_two" class="form-label fw-semibold small">Imagen secundaria</label>
                                <?php if (!empty($post['image_two'])): ?>
                                    <div class="mb-2"><img src="<?php echo htmlspecialchars($post['image_two'], ENT_QUOTES, 'UTF-8'); ?>" class="preview-img" alt="Actual 2"></div>
                                <?php endif; ?>
                                <input class="form-control form-control-sm" type="file" id="image_two" name="image_two" accept="image/*">
                            </div>
                            <div class="col-md-4">
                                <label for="image_three" class="form-label fw-semibold small">Imagen terciaria</label>
                                <?php if (!empty($post['image_three'])): ?>
                                    <div class="mb-2"><img src="<?php echo htmlspecialchars($post['image_three'], ENT_QUOTES, 'UTF-8'); ?>" class="preview-img" alt="Actual 3"></div>
                                <?php endif; ?>
                                <input class="form-control form-control-sm" type="file" id="image_three" name="image_three" accept="image/*">
                            </div>
                        </div>
                        <div class="form-text small mt-2">Si dejas un campo de imagen vacío, el sistema conservará la imagen actual que ya tenía el artículo.</div>
                    </div>

                    <!-- Sección 4: SEO y Tags -->
                    <div class="mb-4">
                        <h5 class="section-title mb-3 pb-2 border-bottom text-primary">
                            <i class="fa-solid fa-tags me-2"></i> Etiquetas y SEO
                        </h5>
                        
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="tags" class="form-label fw-semibold">Tag's (Etiquetas)</label>
                                <input type="text" class="form-control" name="tags" id="tags" value="<?php echo htmlspecialchars($post['tags'], ENT_QUOTES, 'UTF-8'); ?>">
                            </div>
                            <div class="col-md-6">
                                <label for="metatags" class="form-label fw-semibold">MetaTag's (Descripción SEO)</label>
                                <input type="text" class="form-control" name="metatags" id="metatags" value="<?php echo htmlspecialchars($post['metatags'], ENT_QUOTES, 'UTF-8'); ?>">
                            </div>
                        </div>
                    </div>

                    <!-- Botón Guardar Cambios -->
                    <div class="text-center mt-5">
                        <button type="submit" class="btn btn-warning btn-lg px-5 text-white fw-bold shadow-sm">
                            <i class="fa-solid fa-floppy-disk me-2"></i> Actualizar Artículo
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </main>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>