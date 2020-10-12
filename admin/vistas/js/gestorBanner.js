/*=============================================
CARGAR LA TABLA DINÁMICA DE CATEGORÍAS
=============================================*/
// $.ajax({

// 	url: "ajax/tablaBanner.ajax.php",
// 	success: function (respuesta) {

// 		console.log(respuesta)
// 	}

// })


$(".tablaBanners").DataTable({
	"ajax": "ajax/tablaBanner.ajax.php",
	"deferRender": true,
	"retrieve": true,
	"processing": true,
	"language": {

		"sProcessing": "Procesando...",
		"sLengthMenu": "Mostrar _MENU_ registros",
		"sZeroRecords": "No se encontraron resultados",
		"sEmptyTable": "Ningún dato disponible en esta tabla",
		"sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
		"sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0",
		"sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
		"sInfoPostFix": "",
		"sSearch": "Buscar:",
		"sUrl": "",
		"sInfoThousands": ",",
		"sLoadingRecords": "Cargando...",
		"oPaginate": {
			"sFirst": "Primero",
			"sLast": "Último",
			"sNext": "Siguiente",
			"sPrevious": "Anterior"
		},
		"oAria": {
			"sSortAscending": ": Activar para ordenar la columna de manera ascendente",
			"sSortDescending": ": Activar para ordenar la columna de manera descendente"
		}

	}


});

/*=============================================
ACTIVAR CATEGORÍA
=============================================*/

$(".tablaBanners tbody").on("click", ".btnActivar", function () {

	var idBanner = $(this).attr("idBanner");
	var estadoBanner = $(this).attr("estadoBanner");

	var datos = new FormData();
	datos.append("activarId", idBanner);
	datos.append("activarBanner", estadoBanner);

	$.ajax({

		url: "ajax/banner.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		success: function (respuesta) {

			// console.log("respuesta", respuesta);

		}

	});

	if (estadoBanner == 0) {

		$(this).removeClass('btn-success');
		$(this).addClass('btn-danger');
		$(this).html('Desactivado');
		$(this).attr('estadoBanner', 1);

	} else {

		$(this).addClass('btn-success');
		$(this).removeClass('btn-danger');
		$(this).html('Activado');
		$(this).attr('estadoBanner', 0);

	}

})

/*=============================================
REVISAR SI LA CATEGORÍA YA EXISTE
=============================================*/

$(".validarBanner").change(function () {

	$(".alert").remove();

	var Banner = $(this).val();
	// console.log("Banner", Banner);

	var datos = new FormData();
	datos.append("validarBanner", Banner);

	$.ajax({
		url: "ajax/banner.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function (respuesta) {

			// console.log("respuesta", respuesta);

			if (respuesta) {

				$(".validarBanner").parent().after('<div class="alert alert-warning">Esta marca ya existe en la base de datos</div>')
				$(".validarBanner").val("");
			}

		}

	})
});


/*=============================================
RUTA CATEGORÍA
=============================================*/

function limpiarUrl(texto) {

	var texto = texto.toLowerCase();
	texto = texto.replace(/[á]/, 'a');
	texto = texto.replace(/[é]/, 'e');
	texto = texto.replace(/[í]/, 'i');
	texto = texto.replace(/[ó]/, 'o');
	texto = texto.replace(/[ú]/, 'u');
	texto = texto.replace(/[ñ]/, 'n');
	texto = texto.replace(/ /g, '-');
	return texto;

}


$(".tituloBanner").change(function () {

	$(".rutaBanner").val(

		limpiarUrl($(".tituloBanner").val())

	);

})

/*=============================================
SUBIENDO LA FOTO DE PORTADA
=============================================*/

$(".fotoPortada").change(function () {

	var imagen = this.files[0];

	/*=============================================
		VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
		=============================================*/
	if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png") {

		$(".fotoPortada").val("");

		swal({
			title: "Error al subir la imagen",
			text: "¡La imagen debe estar en formato JPG o PNG!",
			type: "error",
			confirmButtonText: "¡Cerrar!"
		});

		return;

	} else if (imagen["size"] > 2000000) {

		$(".fotoPortada").val("");

		swal({
			title: "Error al subir la imagen",
			text: "¡La imagen no debe pesar más de 2MB!",
			type: "error",
			confirmButtonText: "¡Cerrar!"
		});

		return;

	} else {

		var datosImagen = new FileReader;
		datosImagen.readAsDataURL(imagen);

		$(datosImagen).on("load", function (event) {

			var rutaImagen = event.target.result;

			$(".previsualizarPortada").attr("src", rutaImagen);

		})
	}

})


/*=============================================
EDITAR CATEGORÍA
=============================================*/

$(".tablaBanners tbody").on("click", ".btnEditarBanner", function () {

	var idBanner = $(this).attr("idBanner");

	var datos = new FormData();
	datos.append("idBanner", idBanner);

	$.ajax({

		url: "ajax/banner.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function (respuesta) {

			$("#modalEditarBanner .editarIdBanner").val(respuesta["id"]);

			$("#modalEditarBanner .tituloBanner").val(respuesta["banner"]);
			$("#modalEditarBanner .rutaBanner").val(respuesta["ruta"]);

			$("#modalEditarBanner .tituloBanner").change(function () {

				$("#modalEditarBanner .rutaBanner").val(limpiarUrl($("#modalEditarBanner .tituloBanner").val()));

			})

			$("#modalEditarBanner .previsualizarPortada").attr("src", respuesta["imagen"]);
			$("#modalEditarBanner .antiguaFotoPortada").val(respuesta["imagen"]);

		}

	})

})

/*=============================================
ELIMINAR Banner
=============================================*/
$(".tablaBanners tbody").on("click", ".btnEliminarBanner", function () {

	const idBanner = $(this).attr("idBanner");
	const imgPortada = $(this).attr("imgPortada");

	swal({
		title: '¿Está seguro de borrar la categoría?',
		text: "¡Si no lo está puede cancelar la accíón!",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: 'Cancelar',
		confirmButtonText: 'Si, borrar categoría!'
	}).then(function (result) {

		if (result.value) {
			window.location = "index.php?ruta=banner&idBanner=" + idBanner + "&imgPortada=" + imgPortada;

		}

	})

})

