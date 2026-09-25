<!DOCTYPE html>
<html lang="en">   
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/ratstrapp.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Crear articulo</title>    
</head>
<body>
      <div class="container-is-fluid">
         <div class="container">
       <div class="row justify-content-center g-0">
               
                <div class="col-12 text-center">
                    <h2 class="title p-4">Gestor de contenido Latino Tours</h2>
                </div>
              
       </div> 
        <section class="container ">
        <div class="row justify-content-center pb-5">
            <div class="col-10 text-center">
            <a type="button" href="#" class="btn btn-primary btn-lg">Crear articulo</a>
            <a type="button" href="/backend/panel_administrador.php" class="btn btn-primary btn-lg">Listar articulos</a>
            <a type="button" href="/backend/end_session.php" class="btn btn-secondary btn-lg">Cerrar sesion</a>
            </div>
            
        </div>
    </section>
      <?php 
     session_start();
     if ($_SESSION['user']  !== "FranciscoLatino01") {
     header("Location: ../index.html");
   
    }
?>
   
    </div> 
    </div>
   
    <section class="container is-fluid pt-6">
        <div class="row justify-content-center mt-5">
        <div class="col-10">
            <form action="crear_articulo.php"  method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                    <label for="titulo" class="form-label">Titulo</label>
                    <input type="text" class="form-control" name="titulo" id="titulo" placeholder="Titulo del articulo">
                    </div>                     
                    <div class="mb-3">
                    <label for="descripcion_corta" class="form-label">Descripcion corta</label>                   
                    <textarea name="descripcion_corta" name="descripcion_corta" id="descripcion_corta" class="form-control" rows="3" cols="50" placeholder="Ingrese una descripcion corta del articulo"></textarea>
                    </div>                   
                    <div class="mb-3">
                     <label for="cuerpo_articulo" class="form-label">Cuerpo Articulo</label>                   
                    <textarea wrap="hard" name="cuerpo_articulo" id="cuerpo_articulo"  class="form-control" rows="15" cols="50" placeholder="Escriba el cuerpo del articulo. Para separar parrafos ingrese <br><br>"></textarea>
                    </div>
                    <div class="mb-3">
                    <label for="image_one" class="form-label">Imagen principal</label>
                    <input class="form-control" type="file" id="image_one" name="image_one" >
                    </div>
                    <div class="mb-3">
                    <label for="image_two" class="form-label">Imagen secundaria</label>
                    <input class="form-control" type="file" id="image_two" name="image_two" >
                    </div>
                     <div class="mb-3">
                    <label for="image_three" class="form-label">Imagen terciaria</label>
                    <input class="form-control" type="file" id="image_three" name="image_three" >
                    </div>
                    <div class="mb-3">
                    <label for="tags" class="form-label">Tag's</label>
                    <input type="text" class="form-control" name="tags" id="tags" placeholder="Ingrese etiquetas separadas por comas. ejem. tours, cusco, viajes, turismo ">
                    </div>
                     <div class="mb-3">
                    <label for="metatags" class="form-label">MetaTag's</label>
                    <input type="text" class="form-control" name="metatags" id="metatags" placeholder="Ingrese una muy breve descripcion del articulo">
                    </div>
                  
                    <div class="row pb-5">
                        <div class="col-12 text-center ">
                         <button type="submit" class="btn btn-warning primarybutton mt-3">Guardar articulo</button>
                        </div>
                       
                    </div>
                    
            </form>
        </div>
        </div> 
   
    </section>

</body>
</html>