<html>
        <body>
            
    
<div id="keypress"></div>

<script src="js/jquery-3.3.1.slim.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/popper.min.js"></script>
<script>

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