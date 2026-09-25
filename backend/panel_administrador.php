 <?php 
     session_start();
     if ($_SESSION['user'] !== "FranciscoLatino01") {
     header("Location: ../index.html");
    
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/ratstrapp.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Panel de Administración</title>
</head>
<body>
      <div class="container-is-fluid">
         <header  class="container navmenu" id="head">
       <div class="row justify-content-center g-0" id="superiorhead">
               
                <div class="col-12 text-center">
                    <h2 class="title p-4">Gestor de contenido Latino Tours</h2>
                </div>
              
       </div> 
       
    </header> 
     
    </div>
    <section class="container pt-8">
        <div class="row justify-content-center">
            <div class="col-10 text-center">
            <a type="button" href="/backend/creararticulo.php" class="btn btn-primary btn-lg">Crear articulo</a>
            <a type="button"  href="#"  class="btn btn-primary btn-lg">Listar articulos</a>
            <a type="button" href="/backend/end_session.php"  class="btn btn-secondary btn-lg">Cerrar sesion</a>
            </div>
            
        </div>
    </section>
    <section class="container mt-5">
    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Titulo</th>
      <th scope="col">Estado</th>
      <th scope="col">Accion</th>
    </tr>
  </thead>
  <tbody>
    <?php 

    require 'conexion_sql.php';

$sql = "SELECT * FROM posts         
        WHERE estado = 'publicado'
        ORDER BY created_at DESC";

$result = $conn->query($sql);

while ($post = $result->fetch_assoc()) {
   
    echo '<tr>';
    echo '  <th scope="row">'.$post["id"].'</th>';
    echo '  <td>'.$post["titulo"].'</td>';
    echo '  <td>'.$post["estado"].'</td>';
    echo '  <td><a href="eliminar_articulo.php?id='.$post["id"].'" type="button" class="btn btn-danger">Eliminar</a></td>';
    echo '</tr>';
} 
   
    
    ?>
    
    
  </tbody>
</table>
    </section>
</body>
</html>