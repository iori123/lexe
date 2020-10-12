<?php

class ControladorCategorias
{

	/*=============================================
	MOSTRAR CATEGORIAS
	=============================================*/

	static public function ctrMostrarCategorias($item, $valor)
	{

		$tabla = "categorias";

		$respuesta = ModeloCategorias::mdlMostrarCategorias($tabla, $item, $valor);

		return $respuesta;
	}

	/*=============================================
	CREAR CATEGORIAS
	=============================================*/

	static public function ctrCrearCategoria()
	{

		if (isset($_POST["tituloCategoria"])) {

			if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["tituloCategoria"])) {

				/*=============================================
				VALIDAR IMAGEN PORTADA
				=============================================*/

				$rutaPortada = "vistas/img/cabeceras/default/default.jpg";

				if (isset($_FILES["fotoPortada"]["tmp_name"]) && !empty($_FILES["fotoPortada"]["tmp_name"])) {

					/*=============================================
					DEFINIMOS LAS MEDIDAS
					=============================================*/

					list($ancho, $alto) = getimagesize($_FILES["fotoPortada"]["tmp_name"]);

					$nuevoAncho = 518;
					$nuevoAlto = 155;

					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if ($_FILES["fotoPortada"]["type"] == "image/jpeg") {

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$rutaPortada = "vistas/img/cabeceras/" . $_POST["rutaCategoria"] . ".jpg";

						$origen = imagecreatefromjpeg($_FILES["fotoPortada"]["tmp_name"]);

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $rutaPortada);
					}

					if ($_FILES["fotoPortada"]["type"] == "image/png") {

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$rutaPortada = "vistas/img/cabeceras/" . $_POST["rutaCategoria"] . ".png";

						$origen = imagecreatefrompng($_FILES["fotoPortada"]["tmp_name"]);

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagealphablending($destino, FALSE);

						imagesavealpha($destino, TRUE);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $rutaPortada);
					}
				}

				$datos = array(
					"categoria" => $_POST["tituloCategoria"],
					"ruta" => $_POST["rutaCategoria"],
					"estado" => 1,
					"titulo" => $_POST["tituloCategoria"],
					"imagen" => $rutaPortada
				);


				$respuesta = ModeloCategorias::mdlIngresarCategoria("categorias", $datos);

				if ($respuesta == "ok") {

					echo '<script>

					swal({
						  type: "success",
						  title: "La categoría ha sido guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "categorias";

							}
						})

					</script>';
				}
			} else {

				echo '<script>

					swal({
						  type: "error",
						  title: "¡La categoría no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  })

			  	</script>';

				return;
			}
		}
	}

	/*=============================================
	EDITAR CATEGORIAS
	=============================================*/

	static public function ctrEditarCategoria()
	{

		if (isset($_POST["editarTituloCategoria"])) {

			if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarTituloCategoria"])) {

				/*=============================================
				VALIDAR IMAGEN PORTADA
				=============================================*/

				$rutaPortada = $_POST["antiguaFotoPortada"];

				if (isset($_FILES["fotoPortada"]["tmp_name"]) && !empty($_FILES["fotoPortada"]["tmp_name"])) {

					/*=============================================
					BORRAMOS ANTIGUA FOTO PORTADA
					=============================================*/

					unlink($_POST["antiguaFotoPortada"]);

					/*=============================================
					DEFINIMOS LAS MEDIDAS
					=============================================*/

					list($ancho, $alto) = getimagesize($_FILES["fotoPortada"]["tmp_name"]);

					$nuevoAncho = 518;
					$nuevoAlto = 155;


					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if ($_FILES["fotoPortada"]["type"] == "image/jpeg") {

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$rutaPortada = "vistas/img/cabeceras/" . $_POST["rutaCategoria"] . ".jpg";

						$origen = imagecreatefromjpeg($_FILES["fotoPortada"]["tmp_name"]);

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $rutaPortada);
					}

					if ($_FILES["fotoPortada"]["type"] == "image/png") {

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$rutaPortada = "vistas/img/cabeceras/" . $_POST["rutaCategoria"] . ".png";

						$origen = imagecreatefrompng($_FILES["fotoPortada"]["tmp_name"]);

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagealphablending($destino, FALSE);

						imagesavealpha($destino, TRUE);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $rutaPortada);
					}
				}




				$datos = array(
					"id" => $_POST["editarIdCategoria"],
					"categoria" =>$_POST["editarTituloCategoria"],
					"ruta" => $_POST["rutaCategoria"],
					"estado" => 1,
					"titulo" => $_POST["editarTituloCategoria"],
					"imagen" => $rutaPortada,
				);


				$respuesta = ModeloCategorias::mdlEditarCategoria("categorias", $datos);

				if ($respuesta == "ok") {

					echo '<script>

					swal({
						  type: "success",
						  title: "La categoría ha sido editada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "categorias";

							}
						})

					</script>';
				}
			} else {

				echo '<script>

					swal({
						  type: "error",
						  title: "¡La categoría no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  })

			  	</script>';

				return;
			}
		}
	}

	/*=============================================
	ELIMINAR CATEGORIA
	=============================================*/

	static public function ctrEliminarCategoria()
	{

		if (isset($_GET["idCategoria"])) {

			// eliminamos la imagen de portada

			if ($_GET["imgPortada"] != "" && $_GET["imgPortada"] != "vistas/img/cabeceras/default/default.jpg") {

				unlink($_GET["imgPortada"]);
			}



			/*=============================================
			QUITAR LAS CATEGORIAS DE LAS SUBCATEGORIAS
			=============================================*/

			$traerSubCategorias = ModeloSubCategorias::mdlMostrarSubCategorias("subcategorias",  "id_categoria", $_GET["idCategoria"]);

			if ($traerSubCategorias) {

				foreach ($traerSubCategorias as $key => $value) {

					$item1 = "id_categoria";
					$valor1 = 0;
					$item2 = "id";
					$valor2 = $value["id"];

					ModeloSubCategorias::mdlActualizarSubCategorias("subcategorias", $item1, $valor1, $item2, $valor2);
				}
			}

			/*=============================================
			QUITAR LAS CATEGORIAS DE LOS PRODUCTOS
			=============================================*/

			$traerProductos = ModeloArticulos::mdlMostrarArticulos("articulos", "id_categoria", $_GET["idCategoria"]);

			if ($traerProductos) {

				foreach ($traerProductos as $key => $value) {

					$item1 = "id_categoria";
					$valor1 = 0;
					$item2 = "id";
					$valor2 = $value["id"];

					ModeloArticulos::mdlActualizarArticulos("articulos", $item1, $valor1, $item2, $valor2);
				}
			}

			$respuesta = ModeloCategorias::mdlEliminarCategoria("categorias", $_GET["idCategoria"]);

			if ($respuesta == "ok") {

				echo '<script>

				swal({
					  type: "success",
					  title: "La categoría ha sido borrada correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "categorias";

								}
							})

				</script>';
			}
		}
	}
}
