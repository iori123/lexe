<?php

class ControladorBanner
{

	/*=============================================
	MOSTRAR BannerS
	=============================================*/

	static public function ctrMostrarBanners($item, $valor)
	{

		$tabla = "banner";

		$respuesta = ModeloBanner::mdlMostrarBanners($tabla, $item, $valor);

        return $respuesta;
	}

	/*=============================================
	CREAR BannerS
	=============================================*/

	static public function ctrCrearBanner()
	{

		if (isset($_POST["tituloBanner"])) {

			if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["tituloBanner"])) {

				/*=============================================
				VALIDAR IMAGEN PORTADA
				=============================================*/

				$rutaPortada = "vistas/img/banner/default/default.jpg";

				if (isset($_FILES["fotoPortada"]["tmp_name"]) && !empty($_FILES["fotoPortada"]["tmp_name"])) {

					/*=============================================
					DEFINIMOS LAS MEDIDAS
					=============================================*/

					list($ancho, $alto) = getimagesize($_FILES["fotoPortada"]["tmp_name"]);

					$nuevoAncho = $ancho;
					$nuevoAlto = $alto;

					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if ($_FILES["fotoPortada"]["type"] == "image/jpeg") {

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$rutaPortada = "vistas/img/banner/" . $_POST["rutaBanner"] . ".jpg";

						$origen = imagecreatefromjpeg($_FILES["fotoPortada"]["tmp_name"]);

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $rutaPortada);
					}

					if ($_FILES["fotoPortada"]["type"] == "image/png") {

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$rutaPortada = "vistas/img/banner/" . $_POST["rutaBanner"] . ".png";

						$origen = imagecreatefrompng($_FILES["fotoPortada"]["tmp_name"]);

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagealphablending($destino, FALSE);

						imagesavealpha($destino, TRUE);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $rutaPortada);
					}
				}

				$datos = array(
					"banner" => strtoupper($_POST["tituloBanner"]),
					"ruta" => $_POST["rutaBanner"],
					"estado" => 1,
					"imagen" => $rutaPortada
				);


				$respuesta = ModeloBanner::mdlIngresarBanner("banner", $datos);

				if ($respuesta == "ok") {

					echo '<script>

					swal({
						  type: "success",
						  title: "La categoría ha sido guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "banner";

							}
						})

					</script>';
				}
			} else {

				echo '<script>

					swal({
						  type: "error",
						  title: "¡La marca no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  })

			  	</script>';

				return;
			}
		}
	}

	/*=============================================
	EDITAR BannerS
	=============================================*/

	static public function ctrEditarBanner()
	{

		if (isset($_POST["editarTituloBanner"])) {

			if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarTituloBanner"])) {

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

					$nuevoAncho = $ancho;
					$nuevoAlto = $alto;


					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if ($_FILES["fotoPortada"]["type"] == "image/jpeg") {

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$rutaPortada = "vistas/img/banner/" . $_POST["rutaBanner"] . ".jpg";

						$origen = imagecreatefromjpeg($_FILES["fotoPortada"]["tmp_name"]);

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $rutaPortada);
					}

					if ($_FILES["fotoPortada"]["type"] == "image/png") {

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$rutaPortada = "vistas/img/banner/" . $_POST["rutaBanner"] . ".png";

						$origen = imagecreatefrompng($_FILES["fotoPortada"]["tmp_name"]);

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagealphablending($destino, FALSE);

						imagesavealpha($destino, TRUE);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $rutaPortada);
					}
				}




				$datos = array(
					"id" => $_POST["editarIdBanner"],
					"banner" => strtoupper($_POST["editarTituloBanner"]),
					"ruta" => $_POST["rutaBanner"],
					"estado" => 1,
					"imagen" => $rutaPortada,
				);


				$respuesta = ModeloBanner::mdlEditarBanner("banner", $datos);

				if ($respuesta == "ok") {

					echo '<script>

					swal({
						  type: "success",
						  title: "La Marca ha sido editada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "banner";

							}
						})

					</script>';
				}
			} else {

				echo '<script>

					swal({
						  type: "error",
						  title: "¡La marca no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  })

			  	</script>';

				return;
			}
		}
	}

	/*=============================================
	ELIMINAR Banner
	=============================================*/

	static public function ctrEliminarBanner()
	{

		if (isset($_GET["idBanner"])) {

			// eliminamos la imagen de portada

			if ($_GET["imgPortada"] != "" && $_GET["imgPortada"] != "vistas/img/banner/default/default.jpg") {

				unlink($_GET["imgPortada"]);
			}


			$respuesta = ModeloBanner::mdlEliminarBanner("banner", $_GET["idBanner"]);

			if ($respuesta == "ok") {

				echo '<script>

				swal({
					  type: "success",
					  title: "La marca ha sido borrada correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "banner";

								}
							})

				</script>';
			}
		}
	}
}
