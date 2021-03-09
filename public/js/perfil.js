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

    //-----------
    //Ajax o introducir datos en la base de datos
    //-----------

    //CAMBIAR NOMBRE
    function changeName(name) {
        $.ajax({
            type: "GET",
            url: "/changename",
            data: { new: name },

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

    //CAMBIAR APELLIDO1
    function changeApellido1(name) {
        $.ajax({
            type: "GET",
            url: "/changeapellido1",
            data: { new: name },

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

    //CAMBIAR APELLIDO2
    function changeApellido2(name) {
        $.ajax({
            type: "GET",
            url: "/changeapellido2",
            data: { new: name },

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

    //CAMBIAR DNI
    function changeDni(name) {
        $.ajax({
            type: "GET",
            url: "/changedni",
            data: { new: name },

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

    //CAMBIAR FECHA NACIMIENTO
    function changeFechaNacimiento(name) {
        $.ajax({
            type: "GET",
            url: "/changefechanacimiento",
            data: { new: name },

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

    //CAMBIAR GENERO
    function changeGenero(name) {
        $.ajax({
            type: "GET",
            url: "/changegenero",
            data: { new: name },

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

    $("#genero .mostrar button").on("click",function(){
        changeGenero($(this).siblings("input[type='radio']:checked").val());
    });

    //CAMBIAR CALLE
    function changeCalle(name) {
        $.ajax({
            type: "GET",
            url: "/changecalle",
            data: { new: name },

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

    $("#calle .mostrar button").on("click",function(){
        changeCalle($(this).siblings("input[type='text']").val());
    });

    //CAMBIAR NUMERO DOMICILIO
    function changeNumeroDireccion(name) {
        $.ajax({
            type: "GET",
            url: "/changenumerodireccion",
            data: { new: name },

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

    $("#numeroDireccion .mostrar button").on("click",function(){
        changeNumeroDireccion($(this).siblings("input[type='number']").val());
    });

    //CAMBIAR ESCALERA/PISO/ETC
    function changeEscaleraPiso(name) {
        $.ajax({
            type: "GET",
            url: "/changeescalerapiso",
            data: { new: name },

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

    $("#escaleraPiso .mostrar button").on("click",function(){
        changeEscaleraPiso($(this).siblings("input[type='text']").val());
    });

    //CAMBIAR MUNICIPIO
    function changeMunicipio(name) {
        $.ajax({
            type: "GET",
            url: "/changemunicipio",
            data: { new: name },

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

    $("#municipio .mostrar button").on("click",function(){
        changeMunicipio($(this).siblings("input[type='text']").val());
    });

    //CAMBIAR PROVINCIA
    function changeProvincia(name) {
        $.ajax({
            type: "GET",
            url: "/changeprovincia",
            data: { new: name },

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

    $("#provincia .mostrar button").on("click",function(){
        changeProvincia($(this).siblings("input[type='text']").val());
    });

    //CAMBIAR CODIGO POSTAL
    function changeCodigoPostal(name) {
        $.ajax({
            type: "GET",
            url: "/changecodigopostal",
            data: { new: name },

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

    $("#codigoPostal .mostrar button").on("click",function(){
        changeCodigoPostal($(this).siblings("input[type='number']").val());
    });

    //CAMBIAR TELEFONO MOVIL
    function changeTelefonoMovil(name) {
        $.ajax({
            type: "GET",
            url: "/changetelefonomovil",
            data: { new: name },

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

    $("#movil .mostrar button").on("click",function(){
        changeTelefonoMovil($(this).siblings("input[type='number']").val());
    });

    //CAMBIAR TELEFONO FIJO
    function changeTelefonoFijo(name) {
        $.ajax({
            type: "GET",
            url: "/changetelefonofijo",
            data: { new: name },

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

    $("#fijo .mostrar button").on("click",function(){
        changeTelefonoFijo($(this).siblings("input[type='number']").val());
    });

    //CAMBIAR WEB PERSONAL
    function changeWebPersonal(name) {
        $.ajax({
            type: "GET",
            url: "/changewebpersonal",
            data: { new: name },

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

    $("#webPersonal .mostrar button").on("click",function(){
        changeWebPersonal($(this).siblings("input[type='text']").val());
    });

    //CAMBIAR NOMBRE JUGADOR
    function changeNombreJugador(name) {
        $.ajax({
            type: "GET",
            url: "/changenombrejugador",
            data: { new: name },

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

    $("#playerName .mostrar button").on("click",function(){
        changeNombreJugador($(this).siblings("input[type='text']").val());
    });

});