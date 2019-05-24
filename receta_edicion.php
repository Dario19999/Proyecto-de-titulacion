<html>
<?php

    include_once 'plantilla.php';

?>
        
    <div class="container-fluid receta">

            
        <div class="btn_editar">
            <div style="float:right;">
                    <a href="#" class="btn boton_generico"> Editar</a>
        </div>
            

        
            <div class="nombre_receta">
                <h1>Nombre receta</h1>
            </div>
        
            
            <div class="row align-items-end">
                <div class="col-7 col-sm-5 col-md-4 ingredientes">
                    <h3>Ingredientes</h3>
                    <ul class="list-group">
                            <li class="list-group-item">Obo <small> 2 cucharadas</small></li>
                            
                            <li class="list-group-item">Dapibus ac facilisis in</li>
                            <li class="list-group-item">Morbi leo risus</li>
                            <li class="list-group-item">Porta ac consectetur ac</li>
                            <li class="list-group-item">Vestibulum at eros</li>
                    </ul>
                </div>
                <div class="col-2 col-md-1">
    
                    <label class="my-1 mr-2" for="porciones">Porciones</label>
                    <select class="custom-select my-1 mr-sm-2" id="porciones">
                        <option selected>1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </div>
    
            </div>
    
            <div class="procedimiento">
                <ol>
    
                    <li value="1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum, mollitia dolorem temporibus officiis eos facilis nemo omnis totam magni illum deserunt. Consequatur voluptas sint tempore a nemo nulla omnis reprehenderit?.</li>
                    <li value="2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut fuga fugit, odit eos tempore quam sit deserunt eaque, ex odio vel quibusdam iusto deleniti neque delectus repellat doloremque labore sequi!.</li>
                    <li value="3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla rerum laudantium dignissimos omnis eligendi ullam eveniet enim corrupti ad est illum veritatis itaque voluptate, quis minima exercitationem laborum qui similique..</li>
                        
                </ol>
    
            </div>
 
        </div>
    
        <div class="container-fluid botones">    
    
                <div class="btn_dictado">
                        <a href="receta_dictado.html" class="btn boton_generico">Dictado</a>  
                </div>
            
        </div>


        <div class="container-fluid cotizacion">
            <div class="row align-items-center justify-content-center">
                <div class="col col-xs-4 col-md-3 ">
                    <div class="card">
                            <div class="card-body">
                                <h5 class="card-title" id="super">Walmart</h5>
                                <h6 class="card-subtitle mb-2 text-muted" id="precio">$$$</h6>
                                <p class="card-text">Es la cotización aproximada en este supermercado.</p>
                                <a href="https://www.walmart.com.mx/?gclid=CjwKCAiAy-_iBRAaEiwAYhSlA4PQlONBDovv8-Z34GW2HqZ-yU14y7im4fMdLky41LtWH0PCeGcNSBoCdy4QAvD_BwE" target="_blank" class="card-link">Ir a la p&aacute;gina</a>
                            </div>
                    </div>

                </div>

                <div class="col col-xs-4 col-md-3 ">

                    <div class="card" >
                            <div class="card-body">
                                <h5 class="card-title" id="super1">Sam's</h5>
                                <h6 class="card-subtitle mb-2 text-muted" id="precio1">$$$</h6>
                                <p class="card-text">Es la cotización aproximada en este supermercado.</p>
                                <a href="https://www.sams.com.mx/?gclid=CjwKCAiAy-_iBRAaEiwAYhSlA-r4joKi7ty26ohaw2a36Rubjgn86ppcNByhGLz9fNpTqKnt6A8DNRoCA_wQAvD_BwE"  target="_blank" class="card-link">Ir a la p&aacute;gina</a>
                            </div>
                    </div>
                </div>
                <div class="col col-xs-4 col-md-3 ">

                        <div class="card" >
                                <div class="card-body">
                                    <h5 class="card-title" id="super2">Costco</h5>
                                    <h6 class="card-subtitle mb-2 text-muted" id="precio2">$$$</h6>
                                    <p class="card-text">Es la cotización aproximada en este supermercado.</p>
                                    <a href="https://www.costco.com.mx/"  target="_blank" class="card-link">Ir a la p&aacute;gina</a>
                                </div>
                        </div>
                    </div>
            </div>

        </div>


        <i class="descarga fas fa-arrow-down"></i> 


         
  







    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/popper.min.js"></script>

    </body>

</html>