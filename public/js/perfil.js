//Ocultar inputs
$(".mostrar").hide();
//Redimensionar input text
$("input[type='text']").attr("size","50");

//Generar mostrado y ocultado de inputs
$("#nombre a").on("click",function(){
    if($(this).siblings(".mostrar").is(":hidden")){
        $(this).siblings(".mostrar").show();
        $(this).text("Ocultar");
    }else{
        $(this).siblings(".mostrar").hide();
        $(this).text("Editar nombre");
    }
});

$("#apellido1 a").on("click",function(){
    if($(this).siblings(".mostrar").is(":hidden")){
        $(this).siblings(".mostrar").show();
        $(this).text("Ocultar");
    }else{
        $(this).siblings(".mostrar").hide();
        $(this).text("Editar primer apellido");
    }
});

$("#apellido2 a").on("click",function(){
    if($(this).siblings(".mostrar").is(":hidden")){
        $(this).siblings(".mostrar").show();
        $(this).text("Ocultar");
    }else{
        $(this).siblings(".mostrar").hide();
        $(this).text("Editar segundo apellido");
    }
});

$("#dni a").on("click",function(){
    if($(this).siblings(".mostrar").is(":hidden")){
        $(this).siblings(".mostrar").show();
        $(this).text("Ocultar");
    }else{
        $(this).siblings(".mostrar").hide();
        $(this).text("Editar DNI");
    }
});

$("#fechaNacimiento a").on("click",function(){
    if($(this).siblings(".mostrar").is(":hidden")){
        $(this).siblings(".mostrar").show();
        $(this).text("Ocultar");
    }else{
        $(this).siblings(".mostrar").hide();
        $(this).text("Editar fecha de nacimiento");
    }
});

$("#genero a").on("click",function(){
    if($(this).siblings(".mostrar").is(":hidden")){
        $(this).siblings(".mostrar").show();
        $(this).text("Ocultar");
    }else{
        $(this).siblings(".mostrar").hide();
        $(this).text("Editar género");
    }
});

$("#calle a").on("click",function(){
    if($(this).siblings(".mostrar").is(":hidden")){
        $(this).siblings(".mostrar").show();
        $(this).text("Ocultar");
    }else{
        $(this).siblings(".mostrar").hide();
        $(this).text("Editar género");
    }
});

$("#numeroDireccion a").on("click",function(){
    if($(this).siblings(".mostrar").is(":hidden")){
        $(this).siblings(".mostrar").show();
        $(this).text("Ocultar");
    }else{
        $(this).siblings(".mostrar").hide();
        $(this).text("Editar número de domicilio");
    }
});

$("#escaleraPiso a").on("click",function(){
    if($(this).siblings(".mostrar").is(":hidden")){
        $(this).siblings(".mostrar").show();
        $(this).text("Ocultar");
    }else{
        $(this).siblings(".mostrar").hide();
        $(this).text("Editar escalera/piso/etc.");
    }
});

$("#municipio a").on("click",function(){
    if($(this).siblings(".mostrar").is(":hidden")){
        $(this).siblings(".mostrar").show();
        $(this).text("Ocultar");
    }else{
        $(this).siblings(".mostrar").hide();
        $(this).text("Editar municipio");
    }
});

$("#provincia a").on("click",function(){
    if($(this).siblings(".mostrar").is(":hidden")){
        $(this).siblings(".mostrar").show();
        $(this).text("Ocultar");
    }else{
        $(this).siblings(".mostrar").hide();
        $(this).text("Editar provincia");
    }
});

$("#codigoPostal a").on("click",function(){
    if($(this).siblings(".mostrar").is(":hidden")){
        $(this).siblings(".mostrar").show();
        $(this).text("Ocultar");
    }else{
        $(this).siblings(".mostrar").hide();
        $(this).text("Editar codigo postal");
    }
});

$("#movil a").on("click",function(){
    if($(this).siblings(".mostrar").is(":hidden")){
        $(this).siblings(".mostrar").show();
        $(this).text("Ocultar");
    }else{
        $(this).siblings(".mostrar").hide();
        $(this).text("Editar telefono móvil");
    }
});

$("#fijo a").on("click",function(){
    if($(this).siblings(".mostrar").is(":hidden")){
        $(this).siblings(".mostrar").show();
        $(this).text("Ocultar");
    }else{
        $(this).siblings(".mostrar").hide();
        $(this).text("Editar telefono fijo");
    }
});

$("#webPersonal a").on("click",function(){
    if($(this).siblings(".mostrar").is(":hidden")){
        $(this).siblings(".mostrar").show();
        $(this).text("Ocultar");
    }else{
        $(this).siblings(".mostrar").hide();
        $(this).text("Editar web personal");
    }
});

$("#plataformas a").on("click",function(){
    if($(this).siblings(".mostrar").is(":hidden")){
        $(this).siblings(".mostrar").show();
        $(this).text("Ocultar");
    }else{
        $(this).siblings(".mostrar").hide();
        $(this).text("Editar plataformas de juego");
    }
});

$("#tiposJuego a").on("click",function(){
    if($(this).siblings(".mostrar").is(":hidden")){
        $(this).siblings(".mostrar").show();
        $(this).text("Ocultar");
    }else{
        $(this).siblings(".mostrar").hide();
        $(this).text("Editar tipos de juego");
    }
});

$("#socialMedia a").on("click",function(){
    if($(this).siblings(".mostrar").is(":hidden")){
        $(this).siblings(".mostrar").show();
        $(this).text("Ocultar");
    }else{
        $(this).siblings(".mostrar").hide();
        $(this).text("Editar tipos de juego");
    }
});

$("#playerName a").on("click",function(){
    if($(this).siblings(".mostrar").is(":hidden")){
        $(this).siblings(".mostrar").show();
        $(this).text("Ocultar");
    }else{
        $(this).siblings(".mostrar").hide();
        $(this).text("Editar nombre de jugador");
    }
});

$("#booleans a").on("click",function(){
    if($(this).siblings(".mostrar").is(":hidden")){
        $(this).siblings(".mostrar").show();
        $(this).text("Ocultar");
    }else{
        $(this).siblings(".mostrar").hide();
        $(this).text("Editar aceptaciones");
    }
});

//Ajax o introducir datos en la base de datos
$(document).ready(function() {

});