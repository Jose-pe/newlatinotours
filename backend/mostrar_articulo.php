<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latino Tours Cusco | Specializing in arrangements tours</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Favicons -->
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    
    <style>
        :root {
            --primary-color: #f39c12; /* Naranja/Dorado para acentos */
            --text-color: #333333;
        }
        body {
            font-family: 'Poppins', sans-serif;
            color: var(--text-color);
            background-color: #f8f9fa;
        }
        /* Top Bar */
        .top-bar {
            background-color: #212529;
            color: #fff;
            font-size: 0.85rem;
        }
        .top-bar a {
            color: #fff;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        .top-bar a:hover {
            color: var(--primary-color);
        }
        /* Navbar */
        .navbar {
            background-color: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(10px);
        }
        .navbar-brand img {
            max-height: 65px;
        }
        .nav-link {
            font-weight: 500 !important;
            color: #444 !important;
            text-transform: uppercase;
            font-size: 0.9rem;
            margin: 0 5px;
            transition: color 0.3s ease;
        }
        .nav-link:hover {
            color: var(--primary-color) !important;
        }
        /* Hero Carousel */
        .carousel-item {
            height: 70vh;
            min-height: 400px;
            background-color: #000;
        }
        .carousel-item img {
            object-fit: cover;
            height: 100%;
            width: 100%;
            opacity: 0.6; /* Overlay oscuro para que resalte el texto */
        }
        .carousel-caption {
            bottom: 20%;
            z-index: 10;
        }
        .carousel-caption h5 {
            font-size: 3rem;
            font-weight: 700;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
            text-transform: uppercase;
        }
        .carousel-caption p {
            font-size: 1.2rem;
            text-shadow: 1px 1px 3px rgba(0,0,0,0.5);
        }
        /* Sections */
        .section-padding {
            padding: 80px 0;
        }
        .section-title {
            font-weight: 700;
            color: #1a1a1a;
            margin-bottom: 40px;
            text-transform: uppercase;
            position: relative;
            display: inline-block;
        }
        .section-title::after {
            content: "";
            position: absolute;
            width: 50%;
            height: 3px;
            background-color: var(--primary-color);
            bottom: -10px;
            left: 25%;
        }
        /* Cards */
        .tour-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: none;
            border-radius: 12px;
            overflow: hidden;
        }
        .tour-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.1) !important;
        }
        .tour-card img {
            height: 250px;
            object-fit: cover;
        }
        .card-title {
            font-weight: 600;
        }

        .gallery-card {
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.gallery-card:hover {
  transform: translateY(-6px);
  box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15) !important;
}

.img-wrapper {
  overflow: hidden;
  height: 260px; /* Controla la altura uniforme de las fotos */
}

.gallery-img {
  height: 100%;
  width: 100%;
  object-fit: cover; /* Evita que las imágenes se distorsionen */
  transition: transform 0.5s ease;
}

.gallery-card:hover .gallery-img {
  transform: scale(1.08); /* Efecto suave de zoom al pasar el cursor */
}
        /* Footer */
        footer {
            background-color: #212529;
            color: #bbb;
            padding: 40px 0 20px;
        }
        footer .icons {
            color: #fff;
            margin: 0 10px;
            transition: color 0.3s;
        }
        footer .icons:hover {
            color: var(--primary-color);
        }
    </style>
</head>
<body>

    <!-- Top Contact Bar -->
    <div class="top-bar py-2 d-none d-md-block">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <a href="mailto:latinotourscusco@hotmail.com" class="me-4">
                        <i class="fa-solid fa-envelope me-2"></i>latinotourscusco@hotmail.com
                    </a>
                </div>
                <div class="col-md-6 text-end">
                    <a href="tel:+51984939276">
                        <i class="fa-brands fa-whatsapp me-2"></i>+51 984 939 276
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Sticky Navbar -->
    <nav class="navbar navbar-expand-xl navbar-light sticky-top shadow-sm py-3">
        <div class="container-fluid">
            <a class="navbar-brand" href="../index.html">
                <img src="../img/logo.png" alt="Latino Tours Cusco">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mainNav">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 text-center">
                    <li class="nav-item"><a class="nav-link" href="../index.html">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="../traditionaltours.html">Traditional Tours</a></li>
                    <li class="nav-item"><a class="nav-link" href="../adventuretours.html">Adventure Tours</a></li>
                    <li class="nav-item"><a class="nav-link" href="../perudestinations.html">Perú Destinations</a></li>
                    <li class="nav-item"><a class="nav-link" href="../touristcircuit.html">Tourist Circuits of Cusco</a></li>
                    <li class="nav-item"><a class="nav-link" href="../folklorefeast.html">Folklore Tours</a></li>
                    <li class="nav-item"><a class="nav-link" href="../spanish-school.html">Spanish School</a></li>
                    <li class="nav-item"><a class="nav-link" href="../social-programs.html">Social Programs</a></li>
                    <li class="nav-item"><a class="nav-link  active" href="/backend/mostrar_articulos.php">Blog</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Carousel -->
    <header>
        <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="5000">
                    <img src="../img/header-1-machupicchu.jpg" alt="Machu Picchu Tours">
                    <div class="carousel-caption">
                        <h5>Machu Picchu Tours</h5>
                        <p class="d-none d-md-block">The best and safest way to discover Machu Picchu. Enjoy our 1-day tour at your own pace.</p>
                    </div>
                </div>
                <div class="carousel-item" data-bs-interval="5000">
                    <img src="../img/header-2-rainbow-mountains.jpg" alt="Rainbow Mountains">
                    <div class="carousel-caption">
                        <h5>Rainbow Mountains</h5>
                        <p class="d-none d-md-block">Hike through a vibrant green valley with magnificent views of snow-capped mountains.</p>
                    </div>
                </div>

                  <div class="carousel-item" data-bs-interval="5000">
                    <img src="../img/header-3-moray.jpg" alt="Maras Moray">
                    <div class="carousel-caption">
                        <h5>MORAY PERÚ TOUR</h5>
                        <p class="d-none d-md-block">This half day tour experience to Moray & Salt Mines, will take you off the beaten track to enjoy the stunning scenery of snow-capped mountains of the Andes.</p>
                    </div>
                </div>

                <div class="carousel-item" data-bs-interval="5000">
                    <img src="../img/header-4-humantay.jpg" alt="Humantay Lake">
                    <div class="carousel-caption">
                        <h5>HUMANTAY LAKE</h5>
                        <p class="d-none d-md-block">Humantay Lake Tour offers high altitude ecotourism in the mountains, in complicity with nature, witness this new experience in the Andes.</p>
                    </div>
                </div>

                
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
            </button>
        </div>
    </header>
    


   
    <section class="container-fluid pt-5" id="traditionaltours">
      
         <?php
            require 'conexion_sql.php';
            //$slug = 'hola-33332dddsdsds';
            $slug = $_GET['slug'];

            $stmt = $conn->prepare("SELECT * FROM posts WHERE slug = ? AND estado = 'publicado'");
            $stmt->bind_param("s", $slug);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows) {
                $post = $result->fetch_assoc();
              
        echo '     <div class="row justify-content-center g-0 text-center" id="firstrowpopular">';
        echo   '<h2 class="primarytitle">'.$post["titulo"].'</h2>';
        echo   ' <div class="row justify-content-center rowicons">';
        echo   '  <div class="col-2 colicons">';
        
        echo   '      <p><i class="fa-solid fa-user" style="color: #000000;"></i> Francisco Astete</p>';
        echo   '  </div>';
        echo   '  <div class="col-2 colicons">';
        echo   '        <p> <i class="fa-solid fa-map-location"></i> Cusco</p>';
        echo   '  </div>';
        //echo   '  <div class="col-2 colicons">';
       // echo   '       <p> <i class="fa-solid fa-users-line"></i> 5 - 10 people</p>';
       //  echo   '  </div>';
        
        echo   '   <hr>';
        echo   ' </div>';
       echo   '  <div class="row justify-content-center flexrow2">';
       echo   '    <div class="col-10 text-start p-5 flexcol2">';
            echo   '     <p class="textsecundary">';
       echo   ''.$post["descripcion_corta"].' </p>';
       echo   '     <div style="white-space: pre-wrap;"><p class="textsecundary" style="white-space: pre-wrap;">';
       echo   ''.$post["cuerpo_articulo"].' </p> </div>';
      
        echo   '  </div>      ';
       echo   ' </div>';
   echo   '   </div>';

      

     
    
     
    echo   '</section>';

    echo   '<section class="container-fluid" id="ourexperience">';
     
     echo   ' <div class="row justify-content-center text-center" id="ourexperienceone" >';
     echo   '   <h2 class="primarytitle">Gallery</h2>';
    echo   '    <div class="col-4 justify-content-center colbanners" id="imgcontent">';
   echo   '       <div class="img-contenedor">';
   echo   '         <img src="'.$post["image_one"].'" class="img-fluid imgexperience" alt="Cusco Traditional tour">';

   echo   '       </div>';
          
   echo   '     </div>';
   echo   '     <div class="col-4 justify-content-center colbanners"  id="imgcontent">';
   echo   '       <div class="img-contenedor">';
   echo   '       <img src="'.$post["image_two"].'" class="img-fluid imgexperience" alt="inca trail">';
        
   echo   '       </div>';
  echo   '      </div>';
echo   '        <div class="col-4 justify-content-center colbanners"  id="imgcontent">';
  echo   '        <div class="img-contenedor">';
  echo   '        <img src="'.$post["image_three"].'" class="img-fluid imgexperience" alt="Machu Picchu Treks">';
          
  echo   '        </div>';
  echo   '      </div>    ';
  echo   '    </div>';




            } else {
                echo "Post no encontrado";
            }
    ?>
    </section>


    
     


    <!-- Footer -->
    <footer class="text-center">
        <div class="container">
            <div class="row justify-content-center mb-4">
                <div class="col-md-6">
                              <img src="../img/payment-logo.png" class="img-fluid mb-4" style="max-height: 40px;" alt="Modos de pago">

                    <div class="d-flex justify-content-center gap-3">
                        <a href="https://www.facebook.com/LatinoToursCusco" target="_blank" class="icons"><i class="fa-brands fa-facebook-f fa-xl"></i></a>
                        <a href="tel:+51984939276" class="icons"><i class="fa-brands fa-whatsapp fa-xl"></i></a>
                        <a href="mailto:latinotourscusco@hotmail.com" class="icons"><i class="fa-solid fa-envelope fa-xl"></i></a>
                        <a href="https://www.google.com/maps/place/Latino+Tours/@-13.5210487,-71.9762007,15z" target="_blank" class="icons"><i class="fa-solid fa-location-dot fa-xl"></i></a>
                    </div>
                </div>
            </div>
            <p class="mb-0 small">&copy; 2026 Latino Tours Cusco. All rights reserved.</p>
        </div>
    </footer>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>