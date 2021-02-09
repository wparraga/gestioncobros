$(document).ready(function() {
    load(1);
});

function load(page) {
    var q = $("#q").val();
    $("#loader").fadeIn('slow');
    $.ajax({
        url: 'php/ajax/prestamos/buscar_prestamos.php?action=ajax&page=' + page + '&q=' + q,
        beforeSend: function(objeto) {
            $('#loader').html('<img src="views/img/ajax-loader.gif"> Cargando...');
        },
        success: function(data) {
            $(".outer_div").html(data).fadeIn('slow');
            $('#loader').html('');
            $('[data-toggle="tooltip"]').tooltip({ html: true });
        }
    })
}


function procesoVerCuotas(id_prestamo,numero,fecha,cliente,total,interes,montototal){
    var resultado=""; 
    var parametros = {
        "id_prestamo" : id_prestamo,
        "numero" : numero,
        "fecha" : fecha,
        "cliente" : cliente,
        "total" : total,
        "interes" : interes,
        "montototal" : montototal,
    };
    request = $.ajax({
    data:  parametros,
    url:   'php/ajax/prestamos/detalle_cuotas.php',
    type:  'post',
    success: function (response) {
        $("#resultado").html(response);
    }
    });
}


function eliminar(id){
    var q= $("#q").val();
        swal({
            title: '¿Está seguro de eliminar el Tarifario?',
            text: "¡Si no lo está, puede cancelar la accíón!",
            type: 'question',
            showCancelButton: true,
            confirmButtonColor: '#5fb45c',
            cancelButtonColor: '#aaaaaa',
            cancelButtonText: 'Cancelar',
            confirmButtonText: 'Si, eliminar Tarifario!'
        }).then(function(result){
            if (result.value) {
                $.ajax({
                    type: "GET",
                    url: "./php/ajax/tarifarios/buscar_tarifario.php",
                    data: "id="+id,"q":q,
                    beforeSend: function(objeto){
                        $("#resultados").html("Mensaje: Cargando...");
                    },
                    success: function(datos){
                        $("#resultados").html(datos);
                        load(1);
                    }
                });
            }
        })
}