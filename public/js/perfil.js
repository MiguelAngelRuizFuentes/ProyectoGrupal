$(document).ready(function() {
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
    //Ajax o introducir datos en la base de datos
    function changeName(name) {
        $.ajax({
            type: "GET",
            url: "/changename",
            data: { newName: name },

            // ------v-------use it as the callback function
            success: function(data) {
                console.log(data);
                window.location.reload();
            },
            error: function(request, error) {
                console.log(request, error);
            }
        });        
    }

    $("#nombre .mostrar button").on("click",function(){
        changeName($(this).siblings("input[type='text']").val());
    });

    function changeApellido1(name) {
        $.ajax({
            type: "GET",
            url: "/changeapellido1",
            data: { newApellido1: name },

            // ------v-------use it as the callback function
            success: function(data) {
                console.log(data);
                window.location.reload();
            },
            error: function(request, error) {
                console.log(request, error);
            }
        });        
    }

    $("#apellido1 .mostrar button").on("click",function(){
        changeApellido1($(this).siblings("input[type='text']").val());
    });

    function changeApellido2(name) {
        $.ajax({
            type: "GET",
            url: "/changeapellido2",
            data: { newApellido2: name },

            // ------v-------use it as the callback function
            success: function(data) {
                console.log(data);
                window.location.reload();
            },
            error: function(request, error) {
                console.log(request, error);
            }
        });        
    }

    $("#apellido2 .mostrar button").on("click",function(){
        changeApellido2($(this).siblings("input[type='text']").val());
    });

    function changeDni(name) {
        $.ajax({
            type: "GET",
            url: "/changedni",
            data: { newDni: name },

            // ------v-------use it as the callback function
            success: function(data) {
                console.log(data);
                window.location.reload();
            },
            error: function(request, error) {
                console.log(request, error);
            }
        });        
    }

    $("#dni .mostrar button").on("click",function(){
        changeDni($(this).siblings("input[type='text']").val());
    });

    function changeFechaNacimiento(name) {
        $.ajax({
            type: "GET",
            url: "/changefechanacimiento",
            data: { newFechaNacimiento: name },

            // ------v-------use it as the callback function
            success: function(data) {
                console.log(data);
                window.location.reload();
            },
            error: function(request, error) {
                console.log(request, error);
            }
        });        
    }

    $("#fechaNacimiento .mostrar button").on("click",function(){
        changeFechaNacimiento($(this).siblings("input[type='date']").val());
    });

});