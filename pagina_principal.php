

<!DOCTYPE html>
<html>

<?php include 'plantilla.php';?>

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
