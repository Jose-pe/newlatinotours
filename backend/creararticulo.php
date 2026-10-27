<?php
session_start();
// Validación estricta de seguridad al inicio del archivo
if (!isset($_SESSION['user']) || $_SESSION['user'] !== "FranciscoLatino01") {
    header("Location: ../index.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Artículo | Panel de Administración Latino Tours</title>
    
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
                    <a href="crear_articulo.php" class="btn btn-warning text-white fw-semibold px-4 rounded-pill shadow-sm">
                        <i class="fa-solid fa-plus me-2"></i> Crear Artículo
                    </a>
                    <a href="panel_administrador.php" class="btn btn-outline-dark fw-semibold px-4 rounded-pill">
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
                    <h2 class="fw-bold text-dark text-uppercase"><i class="fa-solid fa-pen-nib text-warning me-2"></i> Nuevo Artículo</h2>
                    <p class="text-muted small">Completa los campos para publicar un nuevo artículo en el blog.</p>
                </div>

                <!-- Formulario conectado a tu script PHP (guardar_articulo.php) -->
                <form action="crear_articulo.php" method="POST" enctype="multipart/form-data" class="admin-card p-4 p-md-5">
                    
                    <!-- Sección 1: Información General -->
                    <div class="mb-4">
                        <h5 class="section-title mb-3 pb-2 border-bottom text-primary">
                            <i class="fa-solid fa-circle-info me-2"></i> Información Principal
                        </h5>
                        
                        <div class="mb-3">
                            <label for="titulo" class="form-label fw-semibold">Título <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="titulo" id="titulo" placeholder="Título del artículo" required>
                            <div class="form-text small">El slug se generará automáticamente a partir de este título.</div>
                        </div>

                        <div class="mb-3">
                            <label for="descripcion_corta" class="form-label fw-semibold">Descripción Corta <span class="text-danger">*</span></label>
                            <textarea name="descripcion_corta" id="descripcion_corta" class="form-control" rows="3" placeholder="Ingrese una descripción corta del artículo" required></textarea>
                        </div>
                    </div>

                    <!-- Sección 2: Contenido -->
                    <div class="mb-4">
                        <h5 class="section-title mb-3 pb-2 border-bottom text-primary">
                            <i class="fa-solid fa-file-lines me-2"></i> Contenido Principal
                        </h5>
                        
                        <div class="mb-3">
                            <label for="cuerpo_articulo" class="form-label fw-semibold">Cuerpo del Artículo <span class="text-danger">*</span></label>
                            <textarea name="cuerpo_articulo" id="cuerpo_articulo" class="form-control" rows="12" placeholder="Escriba el cuerpo del artículo. Los saltos de línea y párrafos se mantendrán tal como los escribas." required></textarea>
                        </div>
                    </div>

                    <!-- Sección 3: Imágenes -->
                    <div class="mb-4">
                        <h5 class="section-title mb-3 pb-2 border-bottom text-primary">
                            <i class="fa-solid fa-images me-2"></i> Imágenes del Artículo (Hasta 3)
                        </h5>
                        
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label for="image_one" class="form-label fw-semibold small">Imagen principal</label>
                                <input class="form-control form-control-sm" type="file" id="image_one" name="image_one" accept="image/*">
                            </div>
                            <div class="col-md-4">
                                <label for="image_two" class="form-label fw-semibold small">Imagen secundaria</label>
                                <input class="form-control form-control-sm" type="file" id="image_two" name="image_two" accept="image/*">
                            </div>
                            <div class="col-md-4">
                                <label for="image_three" class="form-label fw-semibold small">Imagen terciaria</label>
                                <input class="form-control form-control-sm" type="file" id="image_three" name="image_three" accept="image/*">
                            </div>
                        </div>
                        <div class="form-text small mt-2">Si no seleccionas alguna imagen, el sistema asignará una por defecto automáticamente.</div>
                    </div>

                    <!-- Sección 4: SEO y Tags -->
                    <div class="mb-4">
                        <h5 class="section-title mb-3 pb-2 border-bottom text-primary">
                            <i class="fa-solid fa-tags me-2"></i> Etiquetas y SEO
                        </h5>
                        
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="tags" class="form-label fw-semibold">Tag's (Etiquetas)</label>
                                <input type="text" class="form-control" name="tags" id="tags" placeholder="ejem. tours, cusco, viajes, turismo">
                            </div>
                            <div class="col-md-6">
                                <label for="metatags" class="form-label fw-semibold">MetaTag's (Descripción SEO)</label>
                                <input type="text" class="form-control" name="metatags" id="metatags" placeholder="Ingrese una muy breve descripción para buscadores">
                            </div>
                        </div>
                    </div>

                    <!-- Botón Guardar -->
                    <div class="text-center mt-5">
                        <button type="submit" class="btn btn-warning btn-lg px-5 text-white fw-bold shadow-sm">
                            <i class="fa-solid fa-cloud-arrow-up me-2"></i> Guardar Artículo
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