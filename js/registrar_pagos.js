	$(document).ready(function(){
		load(1);
		$( "#resultados" ).load( "php/ajax/pagos/mostrar_cuotas.php" );
	});


	function load(page){
		var q= $("#q").val();
		$("#loader").fadeIn('slow');
		$.ajax({
			url:'./php/ajax/pagos/mostrar_cuotas.php?action=ajax&page='+page+'&q='+q,
			beforeSend: function(objeto){
				$('#loader').html('<img src="./img/ajax-loader.gif"> Cargando...');
			},
			success:function(data){
				$(".outer_div").html(data).fadeIn('slow');
				$('#loader').html('');
			}
		})
	}

	function obtenerdatoscuota(id){
	    var cuo_fechapago = $("#cuo_fechapago" + id).val();
	    var cuo_numero = $("#cuo_numero" + id).val();
	    var cuo_montocuota = $("#cuo_montocuota" + id).val();
	    var cuo_estado = $("#cuo_estado" + id).val();
	    $("#mod_id").val(id);
	    $("#mod_fechapago").val(cuo_fechapago);
	    $("#mod_numero").val(cuo_numero);
	    $("#mod_montocuota").val(cuo_montocuota);
	    $("#mod_estado").val(cuo_estado);
	}

	$("#ejecutarpago_cuota").submit(function(event) {
    $('#actualizar_datos').attr("disabled", true);
    var parametros = $(this).serialize();
    $.ajax({
        type: "POST",
        url: "php/ajax/pagos/ejecutarpago_cuota.php",
        data: parametros,
        beforeSend: function(objeto) {
            $("#resultados_ajax3").html("Mensaje: Cargando...");
        },
        success: function(datos) {
            $("#resultados_ajax3").html(datos);
            $('#actualizar_datos').attr("disabled", false);
            load(1);
        }
    });
    event.preventDefault();
})



	