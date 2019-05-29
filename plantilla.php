<!DOCTYPE html>
<html>
<!--Aquí se establece el título e ícono de la página, se realizan los enlaces necesarios a los archivos css
y se agregan las fuentes a utilizar mediante Google Fonts-->
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="icon" href="img/icon1.png">
        <link rel="stylesheet" href="css/plantilla.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link href="https://fonts.googleapis.com/css?family=Inconsolata|Sacramento|Overlock|Yellowtail|Bree+Serif" rel="stylesheet">
        <script src="js/redirigir.js"></script>

        <?php
            $archivo = basename($_SERVER["PHP_SELF"]);
            $pagina = str_replace(".php", "", $archivo);

            if($pagina == 'buscar_receta'){
                echo "<title>Buscar</title>";
                echo "<link rel = 'stylesheet' type = 'text/css' href = 'css/buscar_receta.css'>";
            }else if($pagina == 'editar_perfil'){
                echo "<title>Editar Perfil</title>";
                echo "<link rel = 'stylesheet' type = 'text/css' href = 'css/editar_perfil.css'>";
            }else if($pagina == 'glosario'){
                echo "<title>Glosario</title>";
                echo "<link rel = 'stylesheet' type = 'text/css' href = 'css/glosario.css'>";
            }else if($pagina == 'index'){
                echo "<title>La Cousine</title>";
                echo "<link rel = 'stylesheet' type = 'text/css' href = 'css/pagina_principal.css'>";
            }else if($pagina == 'perfil'){
                echo "<title>Perfil</title>";
            }else if($pagina == 'receta_dictado'){
                echo "<title>Dictado</title>";
                echo "<link rel = 'stylesheet' type = 'text/css' href = 'css/receta_lectura.css'>";
                echo "<link rel = 'stylesheet' type = 'text/css' href = 'css/receta_dictado.css'>";
                echo "<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.1/css/all.css' integrity='sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr' crossorigin='anonymous'>";
            }else if($pagina == 'receta_edicion'){
                echo "<title>Editar Receta</title>";
                echo "<link rel = 'stylesheet' type = 'text/css' href = 'css/receta_lectura.css'>";
                echo "<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.1/css/all.css' integrity='sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr' crossorigin='anonymous'>";
            }else if($pagina == 'receta_lectura'){
                echo "<title>Lectura</title>";
                echo "<link rel = 'stylesheet' type = 'text/css' href = 'css/receta_lectura.css'>";
                echo "<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.1/css/all.css' integrity='sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr' crossorigin='anonymous'>";
            }else if($pagina == 'subir_receta'){
                echo "<title>Subir Receta</title>";
                echo "<link rel = 'stylesheet' type = 'text/css' href = 'css/subir_receta.css'>";
                echo "<link rel='stylesheet' type='text/css' href='css\select2.min.css'>";
            }else if($pagina == 'pagina_principal'){
                echo "<title>Página principal</title>";
                echo "<link rel = 'stylesheet' type = 'text/css' href = 'css/pagina_principal.css'>";
            }else if($pagina == 'success'){
                echo "<title>Subir receta</title>";
                echo "<link rel = 'stylesheet' type = 'text/css' href = 'css/plantilla.css'>";
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

            <button class="navbar-brand btn" id="btn_brand" onclick="redirigir(this.id)" style="color: #fffaa3; background-color: #ff7e05; font-family: 'Yellowtail', cursive; font-size: 40px;">La Cousine</button>

            <button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
            </button>
                        
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
        
                <ul class="navbar-nav nav-justified w-100 mr-auto">

                    <li class="nav-item">
                        <button class="nav_button btn" id="btn_buscar" onclick="redirigir(this.id)" style="width: 100%; font-size: 25px;">Buscar</button>
                    </li>

                    <li class="nav-item">
                        <button class="nav_button btn" id="btn_glosario" onclick="redirigir(this.id)" style="width: 100%; font-size: 25px;">Glosario</button>
                    </li>

                    <li class="nav-item">
                        <button class="nav_button btn" id="btn_subir" onclick="redirigir(this.id)" style="width: 100%; font-size: 25px;">Subir</button>
                    </li>

                    <li class="nav-item">
                        <button class="nav_button btn" id="btn_perfil" onclick="redirigir(this.id)" style="width: 100%; font-size: 25px;">Perfil</button>
                    </li>

                    <li class="nav-item dropdown">

                        <button class="btn btn-default dropdown-toggle nav_button" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="img/iconfinder_Configuration-01_1976051.svg" width="40px" height="40px" alt="Settings">
                        </button>

                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" id="btn_editar_perfil" onclick="redirigir(this.id)" style="cursor: pointer;">Editar Perfil</a>
                            <div class="dropdown-divider"></div>
                            <a href="logout.php" class="dropdown-item" id="btn_logout" style="cursor: pointer;">Cerrar Sesi&oacute;n</a>
                        </div>

                    </li>

                </ul>
            </div>
        </nav>