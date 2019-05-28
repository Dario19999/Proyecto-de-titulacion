<?php
    require_once 'plantilla.php'
?>
        <br>
        <br>
        <br>
        <br>        
        <br>
        <br>
        <br>

        <div class="container-fluid">

            <div class="row">
                <div class="col"></div>
                <div class="col">
                    <div class="alert alert-success">
                        <div class="text-center">
                            <h4 class="alert-heading">¡Enhorabuena!</h4>
                            <p>Se ha subido la receta con éxito.</p>
                            <hr>
                            <a class="alert-link" style="cursor:pointer;" id="btn_success" onclick="redirigir(this.id)">Volver al inicio.</a>
                        </div>
                    </div>
                </div>
                <div class="col"> </div>
            </div>

        </div>
        <script src="js/jquery-3.3.1.slim.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/redirigir.js"></script>
    </body>

</html>