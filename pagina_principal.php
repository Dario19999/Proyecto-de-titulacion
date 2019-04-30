<!DOCTYPE html>
<html>
<!--Aquí se establece el título e ícono de la página, se realizan los enlaces necesarios a los archivos css
y se agregan las fuentes a utilizar mediante Google Fonts-->
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <title>La Cousine</title>
        <link rel="icon" href="img/icon1.png">
        <link rel="stylesheet" href="CSS/pagina_principal.css">
        <link rel="stylesheet" href="CSS/plantilla.css">
        <link rel="stylesheet" href="css/pagina_principal.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link href="https://fonts.googleapis.com/css?family=Inconsolata|Sacramento|Overlock|Yellowtail|Bree+Serif" rel="stylesheet">
        
        
    </head>
    
    <body>

<!-----------------------------------[Inicio de Plantilla]------------------------------------------>
<!--Aquí, como en todas las páginas, se agrega la barra de navegación. La clase navbar es propia de
Bootstrap; nos permite definir en qué tamaño de dispositivo se va a expandir (mediano en este caso)
y que debe estar fijo en la parte superior

Se define el botón que aparecerá cuando el tamaño del dispositivo sea uno menor al mediano, de forma
que la barra de navegación sea colapsable al presionarlo. Luego agregamos los botones que enlazarán
al resto de las páginas y el dropdown para que se desplieguen las opciones de editar perfil y salir
al presionar un botón con ícono de configuarción-->

    <nav class="navbar navbar-expand-md inicio fixed-top" role="navigation">

        <a href="pagina_principal.html" class="navbar-brand" style="color: #fffaa3; font-family: 'Yellowtail', cursive; font-size: 40px;">La Cousine</a>

        <button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
        </button>
                    
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
    
            <ul class="navbar-nav nav-justified w-100 mr-auto">

                <li class="nav-item">
                    <a href="buscar_receta.html" class="nav-link nav_button">Buscar</a>
                </li>

                <li class="nav-item">
                    <a href="glosario.html" class="nav-link nav_button">Glosario</a>
                </li>

                <li class="nav-item">
                    <a href="subir_receta.html" class="nav-link nav_button">Subir</a>
                </li>

                <li class="nav-item">
                    <a href="perfil.html" class="nav-link nav_button">Perfil</a>
                </li>

                <li class="nav-item dropdown">

                    <button class="btn btn-default dropdown-toggle nav_button" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="img/iconfinder_Configuration-01_1976051.svg" width="40px" height="40px" alt="Settings">
                    </button>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a href="editar_perfil.html" class="dropdown-item">Editar Perfil</a>
                        <div class="dropdown-divider"></div>
                        <a href="logout.php" class="dropdown-item">Cerrar Sesi&oacute;n</a>
                    </div>

                </li>

            </ul>
        </div>
    </nav>
<!-----------------------------------[Fin de Plantilla]------------------------------------------>





    <div class="container-fluid encabezado"> <!--Contenedor fluid - abarca la pantalla completa. Clase encabezado-->
        <div class="row justify-content-center align-items-center"> <!--Alinea contenido al centro horizontal y verticalmente-->
            <div class="col-md-9"> <!--Tamaño de 9 columnas del grid a partir de dispositivos medianos hacia arriba-->
                <div class="jumbotron"> <!--Recuadro-->
                    <h1>¡Bienvenido! </h1>
                    <p>&Eacute;sta es la p&aacute;gina de recetas especializada que estabas buscando.</p>
                    <p>La única con dictado automático, cotizaciones y cálculo de porciones seg&uacute;n tus necesidades</p>
                </div>
            </div>
        </div>
            
    </div>      

    <div class="section"> <!--Nueva sección-->

            <div class="container-fluid contenido">

                    <div>
                        <h1>Recetas populares</h1>
                    </div>

                    <div class="row align-items-center justify-content-around"><!--Alinear contenido vertical y horizontalmente-->
                        <div class="col-lg-5"> <!--Valor de 5 columnas a partir de dispositivo grandes-->
                            <div id="c_postres" class="carousel slide" data-ride="carousel"> <!--Carrusel para postres populares-->
                                <div class="carousel-inner"> <!--Clase que dentro de la cual se definen los elementos del carrusel-->
                                    <div class="carousel-item active"> <!--Para indicar la selección que esté activa-->
                                    <img src="img/postres.png" class=" w-100" alt="Postres"> <!--Imagen 1 que se mostrará-->
                                    <div class="carousel-caption"> <!--Texto que se escribirá dentro del carrusel-->
                                        <h3>Postres</h3>
                                        <p>...</p>
                                        </div>
                                    </div>
                                    <div class="carousel-item"> 
                                        <img src="img/comida.png" class="w-100" alt="Postres"> <!--Siguiente imagen-->
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#c_postres" role="button" data-slide="prev"><!--Botón previo-->
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span><!--Ícono previo-->
                                    <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#c_postres" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span><!--Screen readers only-->
                                    </a>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div id="c_comida" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                    <img src="img/comida.png" class=" w-100" alt="Comidas">
                                    <div class="carousel-caption">
                                        <h3>Comidas</h3>
                                        <p>...</p>
                                        </div>
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#c_comida" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#c_comida" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                    </a>
                            </div>
                        </div>
                        
                    </div>
            
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div id="c_cocteles" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                    <img src="img/cocteles.png" class=" w-100" alt="Cocteles">
                                    <div class="carousel-caption">
                                        <h3>Cocteles</h3>
                                        <p>...</p>
                                        </div>
                                    </div>
                                </div>
                            <a class="carousel-control-prev" href="#c_cocteles" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#c_cocteles" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                </div>
    </div>    
        
   




    
        <script src="js/jquery-3.3.1.slim.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/popper.min.js"></script>
    </body>

</html>