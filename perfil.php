<?php

    include_once 'plantilla.php';

?>

        <div class="container-fluid">

            <div style="float: right;">
                <button class="boton_generico btn" id="btn_editar_perfil" onclick="redirigir(this.id)" style="width: 100%;">Editar Perfil</button>
            </div>

            <div class="row justify-content-center align-items-center">
                <div class="col d-inline text-center">
                    <img src="img/abstract-user-icon-3.svg" alt="Foto de perfil" width="300" height="300">
                </div>

                <div class="datos col d-inline">
                    <h2>Nombre</h2>
                    <h2>Nacionalidad</h2>
                    <h2>Recetas</h2>
                    <h2>Genero</h2>
                </div>
            </div>
            
            <br>
            <hr>
            <br>

            <div class="row d-block">
                <div class="col mx-auto" style="width: 100px">
                    <h2>Insignias</h2>
                </div>
            </div>

            <br>
            <br>

            <div class="row insignias">
                <div class="col">
                    <div class="text-center">
                        <img src="https://previews.123rf.com/images/petrnutil/petrnutil1610/petrnutil161000135/63703025-pr%C3%B3ximamente-vector-insignia.jpg"
                        width="230" height="230">
                    </div>
                </div>

                <div class="col">
                    <div class="text-center">
                        <img src="https://previews.123rf.com/images/petrnutil/petrnutil1610/petrnutil161000135/63703025-pr%C3%B3ximamente-vector-insignia.jpg" 
                        width="230" height="230">
                    </div>
                </div>

                <div class="col">
                    <div class="text-center">
                        <img src="https://previews.123rf.com/images/petrnutil/petrnutil1610/petrnutil161000135/63703025-pr%C3%B3ximamente-vector-insignia.jpg"
                        width="230" height="230">
                    </div>
                </div>
            </div>
        </div>
        
        <script src="js/jquery-3.3.1.slim.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/popper.min.js"></script>
    </body>
</html>