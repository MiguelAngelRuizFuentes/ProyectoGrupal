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

    //CAMBIAR PLATAFORMAS JUEGO
    function changePlataformasJuego(consolaSobremesa, consolaPortatil, movil, pcGaming, simulador, arcade, vr, icloud, otros) {
        $.ajax({
            type: "GET",
            url: "/changeplataformasjuego",
            data: { 
                consolaSobremesa: consolaSobremesa,
                consolaPortatil: consolaPortatil,
                movil: movil,
                pcGaming: pcGaming,
                simulador: simulador,
                arcade: arcade,
                vr: vr,
                icloud: icloud,
                otros: otros
            },

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

    $("#plataformas .mostrar button").on("click",function(){
        var consolaSobremesa = $(this).siblings("input[name='consolaSobremesa']").is(":checked") ? $(this).siblings("input[name='consolaSobremesa']").val() : null;
        var consolaPortatil = $(this).siblings("input[name='consolaPortatil']").is(":checked") ? $(this).siblings("input[name='consolaPortatil']").val() : null;
        var movil = $(this).siblings("input[name='movil']").is(":checked") ? $(this).siblings("input[name='movil']").val() : null;
        var pcGaming = $(this).siblings("input[name='pcGaming']").is(":checked") ? $(this).siblings("input[name='pcGaming']").val() : null;
        var simulador = $(this).siblings("input[name='simulador']").is(":checked") ? $(this).siblings("input[name='simulador']").val() : null;
        var arcade = $(this).siblings("input[name='arcade']").is(":checked") ? $(this).siblings("input[name='arcade']").val() : null;
        var vr = $(this).siblings("input[name='vr']").is(":checked") ? $(this).siblings("input[name='vr']").val() : null;
        var icloud = $(this).siblings("input[name='icloud']").is(":checked") ? $(this).siblings("input[name='icloud']").val() : null;
        var otros = $(this).siblings("input[name='otros']").is(":checked") ? $(this).siblings("input[name='otros']").val() : null;
        changePlataformasJuego(consolaSobremesa, consolaPortatil, movil, pcGaming, simulador, arcade, vr, icloud, otros);
    });

    //CAMBIAR TIPOS JUEGO
    function changeTiposJuego(moba, shooter, deportivo, accion, aventuras, lucha, simulacion, plataformas, rpg, estrategia) {
        $.ajax({
            type: "GET",
            url: "/changetiposjuego",
            data: { 
                moba: moba, 
                shooter: shooter, 
                deportivo: deportivo, 
                accion: accion, 
                aventuras: aventuras, 
                lucha: lucha, 
                simulacion: simulacion, 
                plataformas: plataformas, 
                rpg: rpg, 
                estrategia: estrategia
            },

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

    $("#tiposJuego .mostrar button").on("click",function(){
        var moba = $(this).siblings("input[name='moba']").is(":checked") ? $(this).siblings("input[name='moba']").val() : null;
        var shooter = $(this).siblings("input[name='shooter']").is(":checked") ? $(this).siblings("input[name='shooter']").val() : null;
        var deportivo = $(this).siblings("input[name='deportivo']").is(":checked") ? $(this).siblings("input[name='deportivo']").val() : null;
        var accion = $(this).siblings("input[name='accion']").is(":checked") ? $(this).siblings("input[name='accion']").val() : null;
        var aventuras = $(this).siblings("input[name='aventuras']").is(":checked") ? $(this).siblings("input[name='aventuras']").val() : null;
        var lucha = $(this).siblings("input[name='lucha']").is(":checked") ? $(this).siblings("input[name='lucha']").val() : null;
        var simulacion = $(this).siblings("input[name='simulacion']").is(":checked") ? $(this).siblings("input[name='simulacion']").val() : null;
        var plataformas = $(this).siblings("input[name='plataformas']").is(":checked") ? $(this).siblings("input[name='plataformas']").val() : null;
        var rpg = $(this).siblings("input[name='rpg']").is(":checked") ? $(this).siblings("input[name='rpg']").val() : null;
        var estrategia = $(this).siblings("input[name='estrategia']").is(":checked") ? $(this).siblings("input[name='estrategia']").val() : null;
        changeTiposJuego(moba, shooter, deportivo, accion, aventuras, lucha, simulacion, plataformas, rpg, estrategia);
    });

    //CAMBIAR SOCIAL MEDIA
    function changeSocialMedia(twitter, facebook, instagram, youtube, twitch, psn, steam, nintendo, epicgames) {
        $.ajax({
            type: "GET",
            url: "/changesocialmedia",
            data: { 
                twitter: twitter, 
                facebook: facebook, 
                instagram: instagram, 
                youtube: youtube, 
                twitch: twitch, 
                psn: psn, 
                steam: steam, 
                nintendo: nintendo, 
                epicgames: epicgames   
            },

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

    $("#socialMedia .mostrar button").on("click",function(){
        var twitter = $(this).siblings("input[name='twitter']") != "" ? $(this).siblings("input[name='twitter']").val() : $(".twitter").text();
        var facebook = $(this).siblings("input[name='facebook']") != "" ? $(this).siblings("input[name='facebook']").val() : $(".facebook").text();
        var instagram = $(this).siblings("input[name='instagram']") != "" ? $(this).siblings("input[name='instagram']").val() : $(".instagram").text();
        var youtube = $(this).siblings("input[name='youtube']") != "" ? $(this).siblings("input[name='youtube']").val() : $(".youtube").text();
        var twitch = $(this).siblings("input[name='twitch']") != "" ? $(this).siblings("input[name='twitch']").val() : $(".twitch").text();
        var psn = $(this).siblings("input[name='psn']") != "" ? $(this).siblings("input[name='psn']").val() : $(".psn").text();
        console.log($(".psn").text());
        var steam = $(this).siblings("input[name='steam']") != "" ? $(this).siblings("input[name='steam']").val() : $(".steam").text();
        var nintendo = $(this).siblings("input[name='nintendo']") != "" ? $(this).siblings("input[name='nintendo']").val() : $(".nintendo").text();
        var epicgames = $(this).siblings("input[name='epicgames']") != "" ? $(this).siblings("input[name='epicgames']").val() : $(".epicgames").text();
        changeSocialMedia(twitter, facebook, instagram, youtube, twitch, psn, steam, nintendo, epicgames);
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

    //CAMBIAR ACEPTACIONES
    function changeAceptaciones(almacenarDatos, comunicaciones, salud) {
        $.ajax({
            type: "GET",
            url: "/changeaceptaciones",
            data: { 
                almacenarDatos: almacenarDatos,
                comunicaciones: comunicaciones,
                salud: salud
            },

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

    $("#booleans .mostrar button").on("click",function(){
        var almacenarDatos = $(this).siblings("input[name='almacenarDatos']").is(":checked");
        var comunicaciones = $(this).siblings("input[name='comunicaciones']").is(":checked");
        var salud = $(this).siblings("input[name='salud']").is(":checked");
        changeAceptaciones(almacenarDatos, comunicaciones, salud);
    });

});