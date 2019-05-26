<?php

    include_once 'plantilla.php';

?>
<html>
<body>
        
    <div class="container-fluid receta">


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

        </div>

        <div class="procedimiento">
            <ol>

                <li value="1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum, mollitia dolorem temporibus officiis eos facilis nemo omnis totam magni illum deserunt. Consequatur voluptas sint tempore a nemo nulla omnis reprehenderit?.</li>
                <li value="2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut fuga fugit, odit eos tempore quam sit deserunt eaque, ex odio vel quibusdam iusto deleniti neque delectus repellat doloremque labore sequi!.</li>
                <li value="3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla rerum laudantium dignissimos omnis eligendi ullam eveniet enim corrupti ad est illum veritatis itaque voluptate, quis minima exercitationem laborum qui similique..</li>
                    
            </ol>

        </div>

    </div>
 
    <div class="reproductor">

        <a href="#"><i class="fas fa-redo"></i></a>
        <a href="#"><i class="fas fa-angle-double-left"></i></a>
        <a href="#"><i class="fas fa-play reproducir"></i></a>
        <a href="#"><i class="fas fa-angle-double-right"></i></a>
        <a href="#"><i class="far fa-clock"></i></a>

        <p id="escribe"></p>

        
    </div>


   
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/annyang/2.6.0/annyang.min.js"></script>

        
    <script>
    if (annyang) {
    // Let's define our first command. First the text we expect, and then the function it should call
    var commands = {
        'hola': function() {
        alert("Hola");
        }
    };

    // Add our commands to annyang
    annyang.addCommands(commands);
    annyang.setLanguage ("es-MX");

    // Start listening. You can call this here, or attach this call to an event, button, etc.
    annyang.start();
    }

    //Se establecen los comandos del teclado según el número equivalente a cada flecha 
        
    $(document).keydown(function(tecla){
        $('#keypress').html(tecla.keyCode);
        if (tecla.keyCode == 39){
            alert("Siguiente");
        }else if(tecla.keyCode == 37){
            alert("Anterior");
        }else if (tecla.keyCode == 40){
            alert("Repetir");
        }
    });


</script>

    </body>

</html>