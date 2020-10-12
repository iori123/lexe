/*=============================================
CARGAR LA TABLA DINÁMICA DE ArticuloS
=============================================*/

// $.ajax({

// 	url: "ajax/tablaArticulos.ajax.php",
// 	success: function (respuesta) {

// 		console.log(respuesta)
// 	}

// })

$('.tablaArticulos').DataTable({

	"ajax": "ajax/tablaArticulos.ajax.php",
	"deferRender": true,
	"retrieve": true,
	"processing": true,
	"language": {

		"sProcessing": "Procesando..",
		"sLengthMenu": "Mostrar _MENU_ registros",
		"sZeroRecords": "No se encontraron resultados",
		"sEmptyTable": "Agregue articulos dandole al boton agregar Articulo",
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
ACTIVAR Articulo
=============================================*/
$('.tablaArticulos tbody').on("click", ".btnActivar", function () {

	let idArticulo = $(this).attr("idArticulo");
	let estadoArticulo = $(this).attr("estadoArticulo");

	let datos = new FormData();
	datos.append("activarId", idArticulo);
	datos.append("activarArticulo", estadoArticulo);

	$.ajax({

		url: "ajax/articulos.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		success: function (respuesta) {

			// console.log("respuesta", respuesta);

		}

	})

	if (estadoArticulo == 0) {

		$(this).removeClass('btn-success');
		$(this).addClass('btn-danger');
		$(this).html('Desactivado');
		$(this).attr('estadoArticulo', 1);

	} else {

		$(this).addClass('btn-success');
		$(this).removeClass('btn-danger');
		$(this).html('Activado');
		$(this).attr('estadoArticulo', 0);

	}

})

/*=============================================
REVISAR SI EL TITULO DEL Articulo YA EXISTE
=============================================*/

$(".validarArticulo").change(function () {

	$(".alert").remove();

	var Articulo = $(this).val();

	var datos = new FormData();
	datos.append("validarArticulo", Articulo);

	$.ajax({
		url: "ajax/Articulos.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function (respuesta) {

			if (respuesta.length != 0) {

				$(".validarArticulo").parent().after('<div class="alert alert-warning">Este título de Articulo ya existe en la base de datos</div>');

				$(".validarArticulo").val("");

			}

		}

	})

})

/*=============================================
RUTA Articulo
=============================================*/

function limpiarUrl(texto) {
	var texto = texto.toLowerCase();
	texto = texto.replace(/[á]/, 'a');
	texto = texto.replace(/[é]/, 'e');
	texto = texto.replace(/[í]/, 'i');
	texto = texto.replace(/[ó]/, 'o');
	texto = texto.replace(/[ú]/, 'u');
	texto = texto.replace(/[ñ]/, 'n');
	texto = texto.replace(/ /g, "-")
	return texto;
}

$(".tituloArticulo").change(function () {

	$(".rutaArticulo").val(limpiarUrl($(".tituloArticulo").val()));

})




/*=============================================
SELECCIONAR SUBCATEGORÍA
=============================================*/

$(".seleccionarCategoria").change(function () {

	var categoria = $(this).val();

	$(".seleccionarSubCategoria").html("");

	$("#modalEditarArticulo .seleccionarSubCategoria").html("");

	var datos = new FormData();
	datos.append("idCategoria", categoria);

	$.ajax({
		url: "ajax/subCategorias.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function (respuesta) {

			console.log("respuesta", respuesta);

			$(".entradaSubcategoria").show();

			respuesta.forEach(funcionForEach);

			function funcionForEach(item, index) {

				$(".seleccionarSubCategoria").append(

					'<option value="' + item["id"] + '">' + item["subcategoria"] + '</option>'

				)

			}

		}

	})


})


/*=============================================
SUBIENDO LA FOTO PRINCIPAL
=============================================*/

var imagenFotoPrincipal = null;

$(".fotoPrincipal").change(function () {

	imagenFotoPrincipal = this.files[0];

	/*=============================================
		VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
		=============================================*/

	if (imagenFotoPrincipal["type"] != "image/jpeg" && imagenFotoPrincipal["type"] != "image/png") {

		$(".fotoPrincipal").val("");

		swal({
			title: "Error al subir la imagen",
			text: "¡La imagen debe estar en formato JPG o PNG!",
			type: "error",
			confirmButtonText: "¡Cerrar!"
		});

	} else if (imagenFotoPrincipal["size"] > 2000000) {

		$(".fotoPrincipal").val("");

		swal({
			title: "Error al subir la imagen",
			text: "¡La imagen no debe pesar más de 2MB!",
			type: "error",
			confirmButtonText: "¡Cerrar!"
		});

	} else {

		var datosImagen = new FileReader;
		datosImagen.readAsDataURL(imagenFotoPrincipal);

		$(datosImagen).on("load", function (event) {

			var rutaImagen = event.target.result;

			$(".previsualizarPrincipal").attr("src", rutaImagen);

		})

	}

})




/*=============================================
CAMBIAR EL PRECIO
=============================================*/

$(".precio").change(function () {

	$(".precioOferta").val(0);
	$(".descuentoOferta").val(0);

})

/*=============================================
GUARDAR EL Articulo
=============================================*/

var multimediaFisica = null;
var multimediaVirtual = null;

$(".guardarArticulo").click(function () {

	/*=============================================
	PREGUNTAMOS SI LOS CAMPOS OBLIGATORIOS ESTÁN LLENOS
	=============================================*/

	if ($(".tituloArticulo").val() != "") {
		agregarMiArticulo()

	} else {

		swal({
			title: "Llenar todos los campos obligatorios",
			type: "error",
			confirmButtonText: "¡Cerrar!"
		});

		return;
	}

})

function agregarMiArticulo() {

	/*=============================================
	ALMACENAMOS TODOS LOS CAMPOS DE Articulo
	=============================================*/

	let tituloArticulo = $(".tituloArticulo").val();
	let rutaArticulo = $(".rutaArticulo").val();
	let seleccionarCategoria = $(".seleccionarCategoria").val();
	let seleccionarSubCategoria = $(".seleccionarSubCategoria").val();
	let precio = $(".precio").val();



	var datosArticulo = new FormData();
	datosArticulo.append("tituloArticulo", tituloArticulo);
	datosArticulo.append("rutaArticulo", rutaArticulo);
	datosArticulo.append("seleccionarCategoria", seleccionarCategoria);
	datosArticulo.append("seleccionarSubCategoria", seleccionarSubCategoria);
	datosArticulo.append("precio", precio);


	datosArticulo.append("fotoPrincipal", imagenFotoPrincipal);

	$.ajax({
		url: "ajax/articulos.ajax.php",
		method: "POST",
		data: datosArticulo,
		cache: false,
		contentType: false,
		processData: false,
		success: function (respuesta) {


			if (respuesta == "ok") {

				swal({
					type: "success",
					title: "El Articulo ha sido guardado correctamente",
					showConfirmButton: true,
					confirmButtonText: "Cerrar"
				}).then(function (result) {
					if (result.value) {

						window.location = "productos";

					}
				})
			}

		}

	})

}

/*=============================================
EDITAR Articulo
=============================================*/

$('.tablaArticulos tbody').on("click", ".btnEditarArticulo", function () {


	let idArticulo = $(this).attr("idArticulo");

	let datos = new FormData();
	datos.append("idArticulo", idArticulo);

	$.ajax({

		url: "ajax/Articulos.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function (respuesta) {

			$("#modalEditarArticulo .idArticulo").val(respuesta[0]["id"]);
			$("#modalEditarArticulo .tituloArticulo").val(respuesta[0]["titulo"]);




			/*=============================================
			TRAEMOS LA CATEGORIA
			=============================================*/

			if (respuesta[0]["id_categoria"] != 0) {

				let datosCategoria = new FormData();
				datosCategoria.append("idCategoria", respuesta[0]["id_categoria"]);


				$.ajax({

					url: "ajax/categorias.ajax.php",
					method: "POST",
					data: datosCategoria,
					cache: false,
					contentType: false,
					processData: false,
					dataType: "json",
					success: function (respuesta) {

						$("#modalEditarArticulo .seleccionarCategoria").val(respuesta["id"]);
						$("#modalEditarArticulo .optionEditarCategoria").html(respuesta["categoria"]);


					}

				})

			} else {


				$("#modalEditarArticulo .optionEditarCategoria").html("SIN CATEGORÍA");

			}

			/*=============================================
			TRAEMOS LA SUBCATEGORIA
			=============================================*/

			if (respuesta[0]["id_subcategoria"] != 0) {

				let datosSubCategoria = new FormData();
				datosSubCategoria.append("idSubCategoria", respuesta[0]["id_subcategoria"]);

				$.ajax({

					url: "ajax/subcategorias.ajax.php",
					method: "POST",
					data: datosSubCategoria,
					cache: false,
					contentType: false,
					processData: false,
					dataType: "json",
					success: function (respuesta) {

						$("#modalEditarArticulo .optionEditarSubCategoria").val(respuesta[0]["id"]);
						$("#modalEditarArticulo .optionEditarSubCategoria").html(respuesta[0]["subcategoria"]);

						var datosCategoria = new FormData();
						datosCategoria.append("idCategoria", respuesta[0]["id_categoria"]);

						$.ajax({

							url: "ajax/subcategorias.ajax.php",
							method: "POST",
							data: datosCategoria,
							cache: false,
							contentType: false,
							processData: false,
							dataType: "json",
							success: function (respuesta) {

								respuesta.forEach(funcionForEach);

								function funcionForEach(item, index) {

									$("#modalEditarArticulo .seleccionarSubCategoria").append(

										'<option value="' + item["id"] + '">' + item["subcategoria"] + '</option>'

									)

								}

							}

						})

					}

				})

			} else {

				$("#modalEditarArticulo  .optionEditarSubCategoria").html("SIN CATEGORÍA");

			}


			$("#modalEditarArticulo .previsualizarPrincipal").attr("src", respuesta[0]["portada"]);
			$("#modalEditarArticulo .antiguaFotoPrincipal").val(respuesta[0]["portada"]);

			$("#modalEditarArticulo .precio").val(respuesta[0]["precio"]);



			$(".guardarCambiosArticulo").click(function () {

				/*=============================================
				PREGUNTAMOS SI LOS CAMPOS OBLIGATORIOS ESTÁN LLENOS
				=============================================*/

				if ($("#modalEditarArticulo .tituloArticulo").val() != ""
				) {
					editarMiArticulo()
				} else {

					swal({
						title: "Llenar todos los campos obligatorios",
						type: "error",
						confirmButtonText: "¡Cerrar!"
					});

					return;

				}

			})

		}

	})

})

function editarMiArticulo() {
	console.log('editando');
	let idArticulo = $("#modalEditarArticulo .idArticulo").val();
	let tituloArticulo = $("#modalEditarArticulo .tituloArticulo").val();
	let seleccionarCategoria = $("#modalEditarArticulo .seleccionarCategoria").val();
	let seleccionarSubCategoria = $("#modalEditarArticulo .seleccionarSubCategoria").val();
	let precio = $("#modalEditarArticulo .precio").val();
	let antiguaFotoPrincipal = $("#modalEditarArticulo .antiguaFotoPrincipal").val();

	let datosArticulo = new FormData();
	datosArticulo.append("id", idArticulo);
	datosArticulo.append("editarArticulo", tituloArticulo);
	datosArticulo.append("seleccionarCategoria", seleccionarCategoria);
	datosArticulo.append("seleccionarSubCategoria", seleccionarSubCategoria);
	datosArticulo.append("precio", precio);

	datosArticulo.append("fotoPrincipal", imagenFotoPrincipal);
	datosArticulo.append("antiguaFotoPrincipal", antiguaFotoPrincipal);
	console.log(imagenFotoPrincipal, antiguaFotoPrincipal)
	$.ajax({
		url: "ajax/articulos.ajax.php",
		method: "POST",
		data: datosArticulo,
		cache: false,
		contentType: false,
		processData: false,
		success: function (respuesta) {
			console.log(respuesta)
			if (respuesta == "ok") {

				swal({
					type: "success",
					title: "El Articulo ha sido cambiado correctamente",
					showConfirmButton: true,
					confirmButtonText: "Cerrar"
				}).then(function (result) {
					if (result.value) {
						window.location = "productos";
					}
				})
			}

		}

	})

}



$('.tablaArticulos tbody').on("click", ".btnEliminarArticulo", function () {
	const idArticulo = $(this).attr("idArticulo");
	const imgPrincipal = $(this).attr("imgportada");
	swal({
		title: '¿Está seguro de borrar el Articulo?',
		text: "¡Si no lo está puede cancelar la accíón!",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: 'Cancelar',
		confirmButtonText: 'Si, borrar Articulo!'
	}).then(function (result) {
		if (result.value) {
			window.location = "index.php?ruta=productos&idArticulo=" + idArticulo + "&imgportada=" + imgPrincipal;
		}

	})




})


