<!DOCTYPE html>
<html>
<!--Aquí se establece el título e ícono de la página, se realizan los enlaces necesarios a los archivos css
y se agregan las fuentes a utilizar mediante Google Fonts-->
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="icon" href="img/icon1.png">
        <link rel="stylesheet" href="CSS/plantilla.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link href="https://fonts.googleapis.com/css?family=Inconsolata|Sacramento|Overlock|Yellowtail|Bree+Serif" rel="stylesheet">
        <?php
            $archivo = basename($_SERVER["PHP_SELF"]);
            $pagina = str_replace(".php", "", $archivo);

            if($pagina == 'buscar_receta'){
                echo "<title>Buscar</title>";
                echo "<link rel = 'stylesheet' type = 'text/css' href = 'css/buscar_receta.css'";
            }else if($pagina == 'editar_perfil'){
                echo "<title>Editar Perfil</title>";
                echo "<link rel = 'stylesheet' type = 'text/css' href = 'css/editar_perfil.css'";
            }else if($pagina == 'glosario'){
                echo "<title>Glosario</title>";
                echo "<link rel = 'stylesheet' type = 'text/css' href = 'css/glosario.css'";
            }else if($pagina == 'pagina_principal'){
                echo "<title>La Cousine</title>";
                echo "<link rel = 'stylesheet' type = 'text/css' href = 'css/pagina_principal.css'";
            }else if($pagina == 'perfil'){
                echo "<title>Perfil</title>";
            }else if($pagina == 'receta_dictado'){
                echo "<title>Dictado</title>";
                echo "<link rel = 'stylesheet' type = 'text/css' href = 'css/receta_lectura.css'";
                echo "<link rel = 'stylesheet' type = 'text/css' href = 'css/receta_dictado.css'";
                 echo "<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.1/css/all.css' integrity='sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr' crossorigin='anonymous'>";
            }else if($pagina == 'receta_edicion'){
                echo "<title>Editar Receta</title>";
                echo "<link rel = 'stylesheet' type = 'text/css' href = 'css/receta_lectura.css'";
                echo "<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.1/css/all.css' integrity='sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr' crossorigin='anonymous'>";
            }else if($pagina == 'receta_lectura'){
                echo "<title>Lectura</title>";
                echo "<link rel = 'stylesheet' type = 'text/css' href = 'css/receta_lectura.css'";
                 echo "<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.1/css/all.css' integrity='sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr' crossorigin='anonymous'>";
            }else if($pagina == 'subir_receta'){
                echo "<title>Subir Receta</title>";
                echo "<link rel = 'stylesheet' type = 'text/css' href = 'css/subir_receta.css'";
            }
        ?>
    </head>
 <!-----------------------------------[Inicio de Plantilla]------------------------------------------>
<!--Aquí, como en todas las páginas, se agrega la barra de navegación. La clase navbar es propia de
Bootstrap; nos permite definir en qué tamaño de dispositivo se va a expandir (mediano en este caso)
y que debe estar fijo en la parte superior

Se define el botón que aparecerá cuando el tamaño del dispositivo sea uno menor al mediano, de forma
que la barra de navegación sea colapsable al presionarlo. Luego agregamos los botones que enlazarán
al resto de las páginas y el dropdown para que se desplieguen las opciones de editar perfil y salir
al presionar un botón con ícono de configuarción-->
    <body>
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
                            <a href="login.html" class="dropdown-item">Cerrar Sesi&oacute;n</a>
                        </div>

                    </li>

                </ul>
            </div>
        </nav>