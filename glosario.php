<?php

    include_once 'plantilla.php';

        if(isset($_GET ['letra'])) {
        $termino = $_GET ['letra'];
    }else {
        $termino = 'A';
    }

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
                    <form action="php/glosario.php" method="POST">
                        <div class="form-row">
                            <h4>Término a Definir.</h4>
                            <input type="text" class="form-control" name="termino" placeholder="Ejem. Menear, Batir, Cocer, etc." required>
                        </div>

                        <hr>

                        <div>
                            <h4>Definición</h4>
                            <textarea name="definicion" class="form-control textarea_resize" maxlength="3000" rows="10" cols="30" 
                            placeholder="Describa detalladamente la definición del término..." required></textarea>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn boton_generico" style="font-size: 20px;">Agregar</button>
                        </div>
                    </form>
                </div>


            </div>
        </div>
    </div>
    <div class="container-fluid definicion">

        <div class="letra">
            <li type= "circle"><?php echo $termino ?></h1>
        </div>

        <div>
            <dl>
                <?php
                include 'php/conexion.php';
                $query = "SELECT * FROM termino WHERE palabra LIKE '$termino%' ORDER BY palabra ASC" ;
                $rs = mysqli_query ($conexion, $query);
                while(($row=mysqli_fetch_assoc($rs))) {
                   $video= ($row['video']);
                ?>
                <dt id="termino"><hr><?php echo $row['palabra']?></dt>
                    
                <dd><?php echo $row['definicion']?></dd>

                <?php if (isset ($video)) { ?>

                <div class="video">
                    <button type="button" name="ver_video" value="Video" class="btn boton_generico" data-toggle="modal" data-target="#modal_video" style="float:left;">Video</button>
                    
                    <div class="modal fade" id="modal_video" tabindex="-1" role="dialog" aria-labelledby="ver_video" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="ver_video"><?php echo $row['palabra']?></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">                               
                                    <video src="<?php echo $row['video'] ?>" controls></video>                            
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 

            <?php }
                 } ?>       
            </dl>
        
        </div>
        

 
        
        
        
    </div>

    <nav aria-label="Page navigation example" class="fixed-bottom">
            <ul class="pagination pagination-sm justify-content-center align-content-end">
                <li class="page-item disabled">
                </li>
                <?php foreach( range( 'A', 'Z' ) as $letra ) {?>
                <li class="page-item"><a class="page-link" href="glosario.php?letra=<?php echo $letra ?>"><?php echo $letra ?></li></a>
              <?php  }  ?>
                
                <li class="page-item">
                </li>
            </ul>
            </nav>

    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/popper.min.js"></script>


    </body>

</html>
