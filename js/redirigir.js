 function redirigir(id){
     console.log(id);
     //con un switch case se compara el id para saber a dónde redirigirse
    switch (id){
        //ej. en este caso, si el id es "boton_buscar" se
        //regirige a la página "buscar_receta.php"
        case 'btn_buscar':
            window.location.replace("buscar_receta.php");
        break;
        case 'btn_glosario':
            window.location.replace("glosario.php");
        break;
        case 'btn_subir':
            window.location.replace("subir_receta.php");
        break;
        case 'btn_perfil':
            window.location.replace("perfil.php");
        break;
        case 'btn_brand':
            window.location.replace("index.php");
        break;
        case 'btn_editar_perfil':
            window.location.replace("editar_perfil.php");
        break;
        case 'btn_recuperar_contra':
            window.location.replace("recuperar_contraseña.php");
        break;
        case 'btn_cambiar_contra':
            window.location.replace("cambiar_contraseña.php");
        break;
        case 'btn_guardar_cambios':
            window.location.replace("perfil.php");
        break;
        case 'btn_logout':
            window.location.replace("login.php");
        break;
        case 'btn_registrar':
            window.location.replace("registro.php");
        break;
        case 'btn_success':
            window.location.replace("index.php");
        break;
        case 'btn_volver':
            window.location.replace("login.php");
        break;
    }
}