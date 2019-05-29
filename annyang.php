<script>

        if (annyang) {

        var paso_actual=<?php echo $paso_actual ?>;
        var total_pasos = <?php echo $total_pasos ?>;
        var paso_inicial =0;

    // Let's define our first command. First the text we expect, and then the function it should call
    var commands = {

        'siguiente': function() {

        alert("Siguiente");
        if ( paso_actual < total_pasos ){
            paso_actual = paso_actual+1;
            location.replace(window.location.href + "&paso=" + paso_actual) ;
        }

        },
        
        'repetir': function() {

        alert("Repetir");
            paso_actual = paso_actual;
            location.replace(window.location.href + "&paso=" + paso_actual) ;

        },
        'anterior': function() {

        alert("Anterior");
            if ( paso_actual > paso_inicial){
                paso_actual = paso_actual-1;
                location.replace(window.location.href + "&paso=" + paso_actual) ;
            }
        },

    };

    // Add our commands to annyang
    annyang.addCommands(commands);
    annyang.setLanguage ("es-MX");

    // Start listening. You can call this here, or attach this call to an event, button, etc.
    annyang.start();
    }