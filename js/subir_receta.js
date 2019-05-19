 function agregar_paso(){
    var paso = querySelector('div #pasos');
    var nuevoPaso = paso[0].cloneNode(true);

    var nuevoPasoLocation = document.querySelector('#paso_specific');
    nuevoPasoLocation.insertBefore(nuevoPaso, nuevoPasoLocation[1]);
}
