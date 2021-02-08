$(document).ready(function(){
	load(1);
});

function load(page){
	var q= $("#q").val();
	$("#loader").fadeIn('slow');
	$.ajax({
		url:'./php/ajax/clientes/buscar_clientes.php?action=ajax&page='+page+'&q='+q,
		beforeSend: function(objeto){
			$('#loader').html('<img src="./views/img/ajax-loader.gif"> Cargando...');
		},
		success:function(data){
		$(".outer_div").html(data).fadeIn('slow');
		$('#loader').html('');
	}
})
}


function eliminar (id){
	var q= $("#q").val();
	swal({
		title: '¿Está seguro de eliminar el cliente?',
		text: "¡Una vez eliminado, no se podrá recuperar la información!",
		type: 'question',
		showCancelButton: true,
		confirmButtonColor: '#d9534f',
		cancelButtonColor: '#aaaaaa',
		cancelButtonText: 'Cancelar',
		confirmButtonText: 'Si '
	}).then(function(result){
	if (result.value) {
		$.ajax({
			type: "GET",
		    url: "./php/ajax/clientes/buscar_clientes.php",
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

	
$( "#guardar_cliente" ).submit(function( event ) {
$('#guardar_datos').attr("disabled", true);
 var parametros = $(this).serialize();
	 $.ajax({
			type: "POST",
			url: "php/ajax/clientes/nuevo_cliente.php",
			data: parametros,
			 beforeSend: function(objeto){
				$("#resultados_ajax").html("Mensaje: Cargando...");
			  },
			success: function(datos){
			$("#resultados_ajax").html(datos);
			$('#guardar_datos').attr("disabled", false);
			load(1);
		  }
	});
  event.preventDefault();
})


$( "#editar_cliente" ).submit(function( event ) {
$('#actualizar_datos').attr("disabled", true);
 var parametros = $(this).serialize();
	 $.ajax({
			type: "POST",
			url: "php/ajax/clientes/editar_cliente.php",
			data: parametros,
			 beforeSend: function(objeto){
				$("#resultados_ajax2").html("Mensaje: Cargando...");
			  },
			success: function(datos){
			$("#resultados_ajax2").html(datos);
			$('#actualizar_datos').attr("disabled", false);
			load(1);
		  }
	});
  event.preventDefault();
})


function obtener_datos(id){
	var cli_cedula = $("#cli_cedula"+id).val();
	var cli_nombres = $("#cli_nombres"+id).val();
	var cli_telefono = $("#cli_telefono"+id).val();
	var cli_dirdomicilio = $("#cli_dirdomicilio"+id).val();
	var cli_dirtrabajo = $("#cli_dirtrabajo"+id).val();
	var cli_referencia = $("#cli_referencia"+id).val();
	$("#mod_id").val(id);
	$("#mod_cedula").val(cli_cedula);
	$("#mod_nombres").val(cli_nombres);
	$("#mod_telefono").val(cli_telefono);
	$("#mod_direcciondo").val(cli_dirdomicilio);
	$("#mod_direcciontr").val(cli_dirtrabajo);
	$("#mod_Referencia").val(cli_referencia);
	
}