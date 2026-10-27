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
    <title>Panel de Administración | Latino Tours</title>
    
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
        .table th {
            font-weight: 600;
            color: #495057;
            background-color: #f8f9fa !important;
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
                    <a href="creararticulo.php" class="btn btn-warning text-white fw-semibold px-4 rounded-pill shadow-sm">
                        <i class="fa-solid fa-plus me-2"></i> Crear Artículo
                    </a>
                    <a href="panel_administrador.php" class="btn btn-dark fw-semibold px-4 rounded-pill">
                        <i class="fa-solid fa-list me-2"></i> Listar Artículos
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content Section -->
    <main class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h2 class="fw-bold text-dark m-0"><i class="fa-solid fa-newspaper text-warning me-2"></i> Gestión de Artículos</h2>
                </div>

                <!-- Tabla de Artículos en Tarjeta -->
                <div class="admin-card p-4">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead>
                                <tr>
                                    <th scope="col" class="py-3">#ID</th>
                                    <th scope="col" class="py-3">Título</th>
                                    <th scope="col" class="py-3">Estado</th>
                                    <th scope="col" class="py-3 text-end">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                require 'conexion_sql.php';

                                // Listamos todos los artículos ordenados por fecha (eliminamos el filtro estricto de 'publicado')
                                $sql = "SELECT id, titulo, estado FROM posts ORDER BY created_at DESC";
                                $result = $conn->query($sql);

                                if ($result && $result->num_rows > 0):
                                    while ($post = $result->fetch_assoc()): 
                                        $esPublicado = ($post["estado"] === 'publicado');
                                ?>
                                        <tr>
                                            <th scope="row" class="fw-semibold text-muted">#<?php echo $post["id"]; ?></th>
                                            <td class="fw-semibold text-dark"><?php echo htmlspecialchars($post["titulo"], ENT_QUOTES, 'UTF-8'); ?></td>
                                            <td>
                                                <?php if ($esPublicado): ?>
                                                    <span class="badge bg-success bg-opacity-15 text-white px-3 py-2 rounded-pill fw-semibold">
                                                        Publicado
                                                    </span>
                                                <?php else: ?>
                                                    <span class="badge bg-secondary bg-opacity-15 text-white px-3 py-2 rounded-pill fw-semibold">
                                                        Borrador
                                                    </span>
                                                <?php endif; ?>
                                            </td>
                                            <td class="text-end">
                                                <!-- Botón para cambiar estado dinámicamente -->
                                                <a href="cambiar_estado.php?id=<?php echo $post["id"]; ?>" 
                                                   class="btn btn-outline-secondary btn-sm px-3 rounded-pill fw-semibold me-1"
                                                   title="Cambiar estado">
                                                    <i class="fa-solid fa-rotate me-1"></i> <?php echo $esPublicado ? 'Hacer Borrador' : 'Publicar'; ?>
                                                </a>
                                                
                                                <!-- Botón Editar -->
                                                <a href="editar_articulo.php?id=<?php echo $post["id"]; ?>" 
                                                   class="btn btn-outline-warning btn-sm px-3 rounded-pill fw-semibold me-1">
                                                    <i class="fa-solid fa-pen-to-square me-1"></i> Editar
                                                </a>

                                                <!-- Botón Eliminar -->
                                                <a href="eliminar_articulo.php?id=<?php echo $post["id"]; ?>" 
                                                   class="btn btn-outline-danger btn-sm px-3 rounded-pill fw-semibold"
                                                   onclick="return confirm('¿Estás seguro de que deseas eliminar este artículo?');">
                                                    <i class="fa-solid fa-trash-can me-1"></i> Eliminar
                                                </a>
                                            </td>
                                        </tr>
                                <?php 
                                    endwhile;
                                else:
                                ?>
                                    <tr>
                                        <td colspan="4" class="text-center py-4 text-muted">No hay artículos registrados por el momento.</td>
                                    </tr>
                                <?php 
                                endif; 
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </main>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>