$(document).ready(function() {
    load(1);
});

function load(page) {
    var q = $("#q").val();
    $("#loader").fadeIn('slow');
    $.ajax({
        url: 'php/ajax/usuarios/buscar_usuarios.php?action=ajax&page=' + page + '&q=' + q,
        beforeSend: function(objeto) {
            $('#loader').html('<img src="./views/img/ajax-loader.gif"> Cargando...');
        },
        success: function(data) {
            $(".outer_div").html(data).fadeIn('slow');
            $('#loader').html('');

        }
    })
}

$("#guardar_usuario").submit(function(event) {
    $('#guardar_datos').attr("disabled", true);
    var parametros = $(this).serialize();
    $.ajax({
        type: "POST",
        url: "php/ajax/usuarios/nuevo_usuario.php",
        data: parametros,
        beforeSend: function(objeto) {
            $("#resultados_ajax").html("Mensaje: Cargando...");
        },
        success: function(datos) {
            $("#resultados_ajax").html(datos);
            $('#guardar_datos').attr("disabled", false);
            load(1);
        }
    });
    event.preventDefault();
})


function get_user_id(id) {
    $("#user_id_mod").val(id);
}

function obtener_datos(id) {
    var nombres = $("#nombres" + id).val();
    var apellidos = $("#apellidos" + id).val();
    var usuario = $("#usuario" + id).val();
    var email = $("#email" + id).val();
    var perfil = $("#perfil" + id).val();
    var estado = $("#estado" + id).val();
    var foto = $("#foto" + id).val();
    $("#mod_id").val(id);
    $("#firstname2").val(nombres);
    $("#lastname2").val(apellidos);
    $("#user_name2").val(usuario);
    $("#user_email2").val(email);
    $("#user_king2").val(perfil);
    $("#user_status2").val(estado);
    $("#user_foto").val(foto);
    $(".previsualizar").attr("src", "views/users/"+foto);
}

$("#editar_usuario").submit(function(event) {
    $('#actualizar_datos2').attr("disabled", true);
    var parametros = $(this).serialize();
    $.ajax({
        type: "POST",
        url: "php/ajax/usuarios/editar_usuario.php",
        data: parametros,
        beforeSend: function(objeto) {
            $("#resultados_ajax2").html("Mensaje: Cargando...");
        },
        success: function(datos) {
            $("#resultados_ajax2").html(datos);
            $('#actualizar_datos2').attr("disabled", false);
            load(1);
        }
    });
    event.preventDefault();
})

$("#editar_password").submit(function(event) {
    $('#actualizar_datos3').attr("disabled", true);
    var parametros = $(this).serialize();
    $.ajax({
        type: "POST",
        url: "php/ajax/usuarios/editar_password.php",
        data: parametros,
        beforeSend: function(objeto) {
            $("#resultados_ajax3").html("Mensaje: Cargando...");
        },
        success: function(datos) {
            $("#resultados_ajax3").html(datos);
            $('#actualizar_datos3').attr("disabled", false);
            load(1);
        }
    });
    event.preventDefault();
})

$(window).load(function(){
 $(function() {
  $('#file-input').change(function(e) {
      addImage(e); 
     });

     function addImage(e){
      var file = e.target.files[0],
      imageType = /image.*/;
    
      if (!file.type.match(imageType))
       return;
  
      var reader = new FileReader();
      reader.onload = fileOnload;
      reader.readAsDataURL(file);
     }
  
     function fileOnload(e) {
      var result=e.target.result;
      $('#imgSalida').attr("src",result);
     }
    });
});

$(window).load(function(){
 $(function() {
  $('#file-edit').change(function(e) {
      addImage(e); 
     });

     function addImage(e){
      var file = e.target.files[0],
      imageType = /image.*/;
    
      if (!file.type.match(imageType))
       return;
  
      var reader = new FileReader();
      reader.onload = fileOnload;
      reader.readAsDataURL(file);
     }
  
     function fileOnload(e) {
      var result=e.target.result;
      $('#imgEdit').attr("src",result);
     }
    });
});