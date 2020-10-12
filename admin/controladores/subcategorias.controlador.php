<?php

class ControladorSubCategorias
{

	static public function ctrMostrarSubCategorias($item, $valor)
	{
		$table = "subcategorias";
		$respuesta = ModeloSubCategorias::mdlMostrarSubCategorias($table, $item, $valor);
		return $respuesta;
	}

	static public function ctrCrearSubCategoria()
	{

		if (isset($_POST["tituloSubCategoria"])) {

			if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["tituloSubCategoria"])) {
				

				$rutaPortada = "vistas/img/cabeceras/default/default.jpg";

				if (isset($_FILES["fotoPortada"]["tmp_name"]) && !empty($_FILES["fotoPortada"]["tmp_name"])) {

					/*=============================================
					DEFINIMOS LAS MEDIDAS
					=============================================*/

					list($ancho, $alto) = getimagesize($_FILES["fotoPortada"]["tmp_name"]);

					$nuevoAncho = 250;
                    $nuevoAlto = 250;

					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if ($_FILES["fotoPortada"]["type"] == "image/jpeg") {

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$rutaPortada = "vistas/img/cabeceras/" . $_POST["rutaSubCategoria"] . ".jpg";

						$origen = imagecreatefromjpeg($_FILES["fotoPortada"]["tmp_name"]);

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $rutaPortada);
					}

					if ($_FILES["fotoPortada"]["type"] == "image/png") {

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$rutaPortada = "vistas/img/cabeceras/" . $_POST["rutaSubCategoria"] . ".png";

						$origen = imagecreatefrompng($_FILES["fotoPortada"]["tmp_name"]);

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagealphablending($destino, FALSE);

						imagesavealpha($destino, TRUE);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $rutaPortada);
					}
				}

				$datos = array(
					"subcategoria" => $_POST["tituloSubCategoria"],
					"idCategoria" => $_POST["seleccionarCategoria"],
					"ruta" => $_POST["rutaSubCategoria"],
					"estado" => 1,
					"titulo" => $_POST["tituloSubCategoria"],
					"imagen" => $rutaPortada,
				);

				$respuesta = ModeloSubCategorias::mdlIngresarSubCategoria("subcategorias", $datos);

				if ($respuesta == "ok") {

					echo '<script>

					swal({
						  type: "success",
						  title: "La subcategoría ha sido guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "subcategorias";

									}
								})

					</script>';
				}
			} else {

				echo '<script>

					swal({
						  type: "error",
						  title: "¡La subcategoría no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "subcategorias";

							}
						})

			  	</script>';
			}
		}
	}


	static public function ctreditarSubCategoria()
	{

		if (isset($_POST["editarTituloSubCategoria"])) {

			if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarTituloSubCategoria"])) {

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

					 $nuevoAncho = 250;
                    $nuevoAlto = 250;

					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if ($_FILES["fotoPortada"]["type"] == "image/jpeg") {

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/
                        $aleatorio = mt_rand(100, 999);

						$rutaPortada = "vistas/img/cabeceras/" . $_POST["rutaSubCategoria"] .".jpg";

						$origen = imagecreatefromjpeg($_FILES["fotoPortada"]["tmp_name"]);

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $rutaPortada);
					}

					if ($_FILES["fotoPortada"]["type"] == "image/png") {

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/
                        $aleatorio = mt_rand(100, 999);

						$rutaPortada = "vistas/img/cabeceras/". $_POST["rutaSubCategoria"] .".png";

						$origen = imagecreatefrompng($_FILES["fotoPortada"]["tmp_name"]);

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagealphablending($destino, FALSE);

						imagesavealpha($destino, TRUE);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $rutaPortada);
					}
				}

				$datos = array(
					"id" => $_POST["editarIdSubCategoria"],
					"subcategoria" => $_POST["editarTituloSubCategoria"],
					"idCategoria" => $_POST["seleccionarCategoria"],
					"ruta" => $_POST["rutaSubCategoria"],
					"estado" => 1,
					"titulo" => $_POST["editarTituloSubCategoria"],
					"imagen" => $rutaPortada,
				);

				$respuesta = ModeloSubCategorias::mdleditarSubCategoria("subcategorias", $datos);
				
				if ($respuesta == "ok") {

					echo '<script>

					swal({
						  type: "success",
						  title: "La subcategoría ha sido editada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "subcategorias";

									}
								})

					</script>';
				}
			} else {

				echo '<script>

					swal({
						  type: "error",
						  title: "¡La subcategoría no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "subcategorias";

							}
						})

			  	</script>';
			}
		}
	}


	static public function ctrEliminarSubCategoria()
	{

		if (isset($_GET["idSubCategoria"])) {
			// eliminamos la imagen de portada

			if ($_GET["imgPortada"] != "" && $_GET["imgPortada"] != "vistas/img/cabeceras/default/default.jpg") {

				unlink($_GET["imgPortada"]);
			}



			$datos = $_GET["idSubCategoria"];

			//QUITAR LAS SUBATEGORIAS DE LOS PRODUCTOS

			$traerProductos = ModeloArticulos::mdlMostrarArticulos("articulos", "id_subcategoria", $_GET["idSubCategoria"]);

			foreach ($traerProductos as $key => $value) {

				$item1 = "id_subcategoria";
				$valor1 = 0;
				$item2 = "id";
				$valor2 = $value["id"];
				//actualizo los productos
				ModeloArticulos::mdlActualizarArticulos("articulos", $item1, $valor1, $item2, $valor2);
			}


			$respuesta = ModeloSubCategorias::mdlEliminarSubCategoria("subcategorias", $datos);

			if ($respuesta == "ok") {

				echo '<script>

				swal({
					  type: "success",
					  title: "La subcategoría ha sido borrada correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "subcategorias";

								}
							})

				</script>';
			}
		}
	}
}
