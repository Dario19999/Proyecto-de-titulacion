    
<html>
<?php
    include 'php/conexion.php';
$query =("SELECT * FROM cronometros WHERE id_receta=30");
$rs = mysqli_query ($conexion, $query);
    while(($row=mysqli_fetch_array($rs))) {
        $horas=$row['horas'];
        $minutos=$row['minutos'];
        $segundos=$row['segundos'];
    }                            
?>

<h2>Temporizador</h2>
<h1 id="tiempo"><?php echo $horas ?>:<?php echo $minutos ?>
:<?php echo $segundos ?></h1>

<button type="button" onclick="Empezar()">Empezar</button>
<button type="button" id="detener">Detener</button>
<button type="button" id="reiniciar">Continuar</button>
<!-- <button type="button" id="eliminar">Eliminar</button> -->


<script>
// audio=new Audio(.mp3);
function Empezar(){
    // audio.pause();
    // audio.currentTime=0;
    // $("#tiempo").timer('remove');
    //pause an existing timer
    $("#detener").on('click', function(){
        $("#tiempo").timer('pause')
    });
    //resume a paused timer
    $("#reiniciar").on('click', function(){
        $("#tiempo").timer('resume')
    });
    // $("#eliminar").on('click', function(){
    //     $("#tiempo").timer('remove')
    // });
    $("#tiempo").timer({
        countdown:true,
        duration:'<?php  echo $horas ?>'+'h'+
        '<?php echo $minutos ?>'+'m'+'<?php echo $segundos ?>'+'s',
        callback:function(){
            // audio.addEventListener('ended', function(){
            //     this.currentTime=0;
            //     this.play();
            //     }, false);
            //     audio.play();
            alert('Time up!');
            },
            format:'%H:%M:%S'
        
    });
}
</script>

<script src="js/jquery-3.3.1.slim.min.js"></script>
<script src="js/timer.jquery.min.js"></script>

</html>