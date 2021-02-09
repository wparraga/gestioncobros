
	$("#datos_prestamos").submit(function(event) {
    $('#guardar_datos').attr("disabled", true);

    var parametros = $(this).serialize();
    $.ajax({
        type: "POST",
        url: "php/ajax/prestamos/nuevo_prestamo.php",
        data: parametros,
        beforeSend: function(objeto) {
            $("#resultado_ajax_prestamos").html("Mensaje: Cargando...");
        },
        success: function(datos) {
            $('#guardar_datos').attr("disabled", false);
            swal({
                type: "success",
                title: " Generado Exitosamente.",
                showConfirmButton: true,
                confirmButtonColor: "#d9534f",
                confirmButtonText: "Aceptar",
                closeOnConfirm: false
                }).then(function(result){
                if (result.value) {
                    window.location.replace("prestamos.php");
                }
                })
            
            load(1);
        }
    });
    event.preventDefault();
})