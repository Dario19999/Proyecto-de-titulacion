<?php

    include_once 'plantilla.php';

?>
    <!-----------------------------------[Fin de Plantilla]------------------------------------------>
    
    <div>
        <button type="button" class="btn boton_generico"  style="float: right;" data-toggle="modal" data-target="#modal_boton">Agregar Término</button>
    </div> 
        
    <div class="modal fade" id="modal_boton" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="font-family: 'Bree Serif', serif;" role="document">
            <div class="modal-content">
                
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Término al Glosario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form>
                        <div class="form-row">
                            <h4>Término a Definir.</h4>
                            <input type="text" class="form-control" placeholder="Ejem. Menear, Batir, Cocer, etc.">
                        </div>

                        <hr>

                        <div>
                            <h4>Definición</h4>
                            <textarea class="form-control textarea_resize" maxlength="3000" rows="10" cols="30" 
                            placeholder="Describa detalladamente la definición del término..."></textarea>

                        </div>

                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn boton_generico" style="font-size: 20px;">Agregar</button>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid definicion">

        <div class="letra">
            <li type= "circle" value="J">J</h1>
        </div>

        <div>
            <dl>

                <dt id="termino">Juliana</dt>
                    
                <dd>La juliana es una técnica culinaria que consiste en cortar las verduras en tiras alargadas y muy finas, con ayuda de un cuchillo o de una mandolina.</dd>
                        
            </dl>
        
        </div>
        

        <div class="video">
            <button type="button" name="ver_video" value="Video" class="btn boton_generico" data-toggle="modal" data-target="#modal_video" style="float:left;">Video</button>
            
            <div class="modal fade" id="modal_video" tabindex="-1" role="dialog" aria-labelledby="ver_video" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="ver_video">Juliana</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">                               
                            <video src="vid/juliana.mp4" controls></video>                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
        
        
        
    </div>

    <nav aria-label="Page navigation example" class="fixed-bottom">
            <ul class="pagination pagination-sm justify-content-center align-content-end">
                <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Anterior</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">A</a></li>
                <li class="page-item"><a class="page-link" href="#">B</a></li>
                <li class="page-item"><a class="page-link" href="#">C</a></li>
                <li class="page-item"><a class="page-link" href="#">D</a></li>
                <li class="page-item"><a class="page-link" href="#">F</a></li>
                <li class="page-item"><a class="page-link" href="#">G</a></li>
                <li class="page-item"><a class="page-link" href="#">H</a></li>
                <li class="page-item"><a class="page-link" href="#">I</a></li>
                <li class="page-item"><a class="page-link" href="#">J</a></li>
                <li class="page-item"><a class="page-link" href="#">K</a></li>
                <li class="page-item"><a class="page-link" href="#">L</a></li>
                <li class="page-item"><a class="page-link" href="#">M</a></li>
                <li class="page-item"><a class="page-link" href="#">N</a></li>
                <li class="page-item"><a class="page-link" href="#">Ñ</a></li>
                <li class="page-item"><a class="page-link" href="#">O</a></li>
                <li class="page-item"><a class="page-link" href="#">P</a></li>
                <li class="page-item"><a class="page-link" href="#">Q</a></li>
                <li class="page-item"><a class="page-link" href="#">R</a></li>
                <li class="page-item"><a class="page-link" href="#">S</a></li>
                <li class="page-item"><a class="page-link" href="#">T</a></li>
                <li class="page-item"><a class="page-link" href="#">U</a></li>
                <li class="page-item"><a class="page-link" href="#">V</a></li>
                <li class="page-item"><a class="page-link" href="#">W</a></li>
                <li class="page-item"><a class="page-link" href="#">X</a></li>
                <li class="page-item"><a class="page-link" href="#">Y</a></li>
                <li class="page-item"><a class="page-link" href="#">Z</a></li>
                <li class="page-item">
                <a class="page-link" href="#">Siguiente</a>
                </li>
            </ul>
            </nav>

            





    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/popper.min.js"></script>


    </body>

</html>
